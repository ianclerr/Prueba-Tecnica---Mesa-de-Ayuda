<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Ticket #{{ $ticket->id }}: {{ $ticket->titulo }}</h4>
                    <span class="badge badge-priority-{{ $ticket->prioridad }}">{{ ucfirst($ticket->prioridad) }}</span>
                </div>
                <h6 class="card-subtitle mb-2 text-muted">
                    Estado: <span class="badge bg-secondary">{{ $ticket->estado }}</span> 
                    | Creado por: {{ $ticket->creator->name }} 
                    | {{ $ticket->created_at->diffForHumans() }}
                </h6>
                <p class="card-text mt-3">{{ $ticket->descripcion }}</p>
                
                @if(auth()->id() == $ticket->created_by || auth()->user()->is_admin)
                    <a href="{{ route('tickets.edit', $ticket) }}" class="btn btn-outline-info btn-sm mt-3">Editar Ticket</a>
                @endif
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Comentarios</h4>
                
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif

                <ul class="list-unstyled mt-3">
                    @forelse($comments as $comment)
                        <li class="media mb-4 border-bottom pb-3">
                            <div class="media-body">
                                <div class="d-flex justify-content-between">
                                    <h5 class="mt-0 mb-1">{{ $comment->user->name }} <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small></h5>
                                    @if(auth()->id() === $comment->user_id || auth()->user()->is_admin)
                                        <button wire:click="deleteComment({{ $comment->id }})" 
                                                wire:confirm="¿Estás seguro de eliminar este comentario?"
                                                class="btn btn-sm btn-outline-danger border-0" 
                                                title="Eliminar comentario">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    @endif
                                </div>
                                {{ $comment->comentario }}
                            </div>
                        </li>
                    @empty
                        <li class="text-muted">No hay comentarios aún.</li>
                    @endforelse
                </ul>

                <hr>
                
                <form wire:submit.prevent="addComment">
                    <div class="form-group mb-3">
                        <label>Agregar Comentario</label>
                        <textarea wire:model="newComment" class="form-control" rows="3" placeholder="Escribe tu comentario..."></textarea>
                        @error('newComment') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar Comentario</button>
                </form>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <!-- Sidebar info or actions could go here -->
         <div class="card">
            <div class="card-body">
                <h4 class="card-title">Detalles Rápidos</h4>
                 <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Prioridad
                        <span class="badge badge-priority-{{ $ticket->prioridad }}">{{ ucfirst($ticket->prioridad) }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Ultima Actualización
                        <span>{{ $ticket->updated_at->format('d/m/Y H:i') }}</span>
                    </li>
                </ul>
                <div class="d-grid gap-2 mt-3">
                     <a href="{{ route('tickets.index') }}" class="btn btn-secondary">Volver al listado</a>
                </div>
            </div>
         </div>
    </div>
</div>
