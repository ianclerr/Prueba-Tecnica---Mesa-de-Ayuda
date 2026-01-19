<?php

namespace App\Livewire;

use App\Models\Ticket;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $stats = [
            'open' => Ticket::where('estado', 'abierto')->count(),
            'in_progress' => Ticket::where('estado', 'en_proceso')->count(),
            'closed' => Ticket::where('estado', 'cerrado')->count(),
            'high_priority_active' => Ticket::where('prioridad', 'alta')
                                        ->whereIn('estado', ['abierto', 'en_proceso'])
                                        ->count(),
        ];

        $recentTickets = Ticket::with('creator')
            ->latest()
            ->take(10)
            ->get();

        return view('livewire.dashboard', compact('stats', 'recentTickets'))
            ->layout('plantillas.principal');
    }
}
