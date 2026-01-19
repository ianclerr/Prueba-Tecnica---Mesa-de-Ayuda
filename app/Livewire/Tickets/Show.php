<?php

namespace App\Livewire\Tickets;

use App\Models\Ticket;
use App\Models\TicketComment;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Show extends Component
{
    public Ticket $ticket;
    public $newComment;

    protected $rules = [
        'newComment' => 'required|string',
    ];

    public function mount(Ticket $ticket)
    {
        $this->ticket = $ticket;
    }

    public function addComment()
    {
        $this->validate();

        TicketComment::create([
            'ticket_id' => $this->ticket->id,
            'user_id' => Auth::id(),
            'comentario' => $this->newComment,
        ]);

        \Illuminate\Support\Facades\Log::info('Comentario agregado al ticket ' . $this->ticket->id . ' por ' . Auth::user()->email);

        // Auto-update status if ticket is open
        if ($this->ticket->estado === 'abierto') {
            $this->ticket->update(['estado' => 'en_proceso']);
        }

        $this->newComment = '';
        $this->ticket->refresh(); // Refresh relationships
        
        session()->flash('message', 'Comentario agregado.');
    }

    public function deleteComment($commentId)
    {
        $comment = TicketComment::findOrFail($commentId);

        // Permission: Owner or Admin
        if (Auth::id() !== $comment->user_id && !Auth::user()->is_admin) {
            $this->dispatch('show-toast', ['type' => 'error', 'message' => 'No tienes permiso para eliminar este comentario.']);
            return;
        }

        $comment->delete();
        \Illuminate\Support\Facades\Log::info('Comentario eliminado ' . $commentId . ' por ' . Auth::user()->email);
        
        $this->ticket->refresh(); // Refresh relationships
        $this->dispatch('show-toast', ['type' => 'success', 'message' => 'Comentario eliminado.']);
    }

    public function render()
    {
        // Eager load comments with user
        $comments = $this->ticket->comments()->with('user')->latest()->get();
        
        return view('livewire.tickets.ver', compact('comments'))
            ->layout('plantillas.principal');
    }
}
