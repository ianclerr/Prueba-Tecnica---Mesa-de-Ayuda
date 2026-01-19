<?php

namespace App\Livewire\Tickets;

use App\Models\Ticket;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $status = '';
    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingStatus()
    {
        $this->resetPage();
    }

    public function updateStatus($id, $newStatus)
    {
        $ticket = Ticket::findOrFail($id);

        // revision de permiso
        if (\Illuminate\Support\Facades\Auth::id() !== $ticket->created_by && !\Illuminate\Support\Facades\Auth::user()->is_admin) {
             $this->dispatch('show-toast', ['type' => 'error', 'message' => 'No tienes permiso para editar este ticket.']);
             return;
        }

        // 2. validacion de cierre de ticket sin comentario
        if ($newStatus === 'cerrado' && $ticket->comments()->count() === 0) {
             $this->dispatch('show-toast', ['type' => 'error', 'message' => 'No se puede cerrar un ticket sin comentarios.']);
             return; 
        }

        $ticket->update(['estado' => $newStatus]);
        
        \Illuminate\Support\Facades\Log::info('Estado de ticket ' . $ticket->id . ' actualizado a ' . $newStatus . ' por ' . \Illuminate\Support\Facades\Auth::user()->email);

        $this->dispatch('show-toast', ['type' => 'success', 'message' => 'Estado actualizado correctamente.']);
    }

    public function render()
    {
        $tickets = Ticket::with('creator')
            ->search($this->search)
            ->filterByStatus($this->status)
            ->latest()
            ->paginate(10);

        return view('livewire.tickets.lista', compact('tickets'))
            ->layout('plantillas.principal');
    }
}
