<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Listado de Tickets</h4>
                <div class="d-flex justify-content-between mb-3">
                    <input type="text" wire:model.live.debounce.300ms="search" class="form-control w-25" placeholder="Buscar ticket...">
                    <select wire:model.live="status" class="form-control w-25">
                        <option value="">Todos los estados</option>
                        <option value="abierto">Abierto</option>
                        <option value="en_proceso">En Proceso</option>
                        <option value="cerrado">Cerrado</option>
                    </select>
                    <a href="{{ route('tickets.create') }}" class="btn btn-primary">Crear Ticket</a>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered stylish-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Título</th>
                                <th>Estado</th>
                                <th>Prioridad</th>
                                <th>Creado por</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tickets as $ticket)
                                <tr>
                                    <td>{{ $ticket->id }}</td>
                                    <td>
                                        <a href="{{ route('tickets.show', $ticket) }}">{{ $ticket->titulo }}</a>
                                        <br>
                                        <small>{{ Str::limit($ticket->descripcion, 50) }}</small>
                                    </td>
                                    <td>
                                        <span class="badge {{ $ticket->estado == 'abierto' ? 'bg-success' : ($ticket->estado == 'en_proceso' ? 'bg-warning' : 'bg-secondary') }}">
                                            {{ ucfirst(str_replace('_', ' ', $ticket->estado)) }}
                                        </span>
                                        <div class="btn-group sm-2">
                                            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                                <span class="visually-hidden">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#" wire:click.prevent="updateStatus({{ $ticket->id }}, 'abierto')">Abierto</a></li>
                                                <li><a class="dropdown-item" href="#" wire:click.prevent="updateStatus({{ $ticket->id }}, 'en_proceso')">En Proceso</a></li>
                                                <li><a class="dropdown-item" href="#" wire:click.prevent="updateStatus({{ $ticket->id }}, 'cerrado')">Cerrado</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge badge-priority-{{ $ticket->prioridad }}">
                                            {{ ucfirst($ticket->prioridad) }}
                                        </span>
                                    </td>
                                    <td>{{ $ticket->creator->name }}</td>
                                    <td>
                                        @if(Auth::id() === $ticket->created_by || Auth::user()->is_admin)
                                            <a href="{{ route('tickets.edit', $ticket) }}" class="btn btn-sm btn-info text-white" title="Editar Ticket">
                                                <i class="bi bi-pencil"></i> Editar
                                            </a>
                                        @else
                                            <a href="{{ route('tickets.show', $ticket) }}" class="btn btn-sm btn-secondary" title="Solo ver detalles">
                                                <i class="bi bi-eye"></i> Ver
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <div class="mt-3">
                    {{ $tickets->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
