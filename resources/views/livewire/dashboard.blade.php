<div>
    <div class="row">
        <!-- Column -->
        <div class="col-md-6 col-lg-3">
            <div class="card card-body">
                <div class="row">
                    <div class="col pe-0">
                        <h1 class="font-weight-light text-success">{{ $stats['open'] }}</h1>
                        <h6 class="text-muted">Tickets Abiertos</h6>
                    </div>
                    <div class="col text-end align-self-center"> 
                        <span class="badge bg-success p-2 rounded-circle"><i class="bi bi-envelope-open"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-md-6 col-lg-3">
            <div class="card card-body">
                <div class="row">
                    <div class="col pe-0">
                        <h1 class="font-weight-light text-warning">{{ $stats['in_progress'] }}</h1>
                        <h6 class="text-muted">En Proceso</h6>
                    </div>
                    <div class="col text-end align-self-center"> 
                         <span class="badge bg-warning p-2 rounded-circle"><i class="bi bi-hourglass-split"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-md-6 col-lg-3">
            <div class="card card-body">
                <div class="row">
                    <div class="col pe-0">
                        <h1 class="font-weight-light text-secondary">{{ $stats['closed'] }}</h1>
                        <h6 class="text-muted"> Tickets Cerrados</h6>
                    </div>
                    <div class="col text-end align-self-center"> 
                         <span class="badge bg-secondary p-2 rounded-circle"><i class="bi bi-check-circle"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <div class="col-md-6 col-lg-3">
            <div class="card card-body">
                <div class="row">
                    <div class="col pe-0">
                        <h1 class="font-weight-light text-danger">{{ $stats['high_priority_active'] }}</h1>
                        <h6 class="text-muted">Alta Prioridad</h6>
                    </div>
                    <div class="col text-end align-self-center"> 
                         <span class="badge bg-danger p-2 rounded-circle"><i class="bi bi-exclamation-triangle"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Últimos 10 Tickets</h4>
                    <div class="table-responsive mt-3">
                        <table class="table stylish-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Título</th>
                                    <th>Asignado / Creador</th>
                                    <th>Prioridad</th>
                                    <th>Estado</th>
                                    <th>Fecha</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentTickets as $ticket)
                                <tr>
                                    <td>{{ $ticket->id }}</td>
                                    <td>
                                        <h6><a href="{{ route('tickets.show', $ticket) }}" class="link">{{ $ticket->titulo }}</a></h6>
                                        <small class="text-muted">{{ Str::limit($ticket->descripcion, 30) }}</small>
                                    </td>
                                    <td>{{ $ticket->creator->name }}</td>
                                    <td><span class="badge badge-priority-{{ $ticket->prioridad }}">{{ ucfirst($ticket->prioridad) }}</span></td>
                                    <td><span class="badge {{ $ticket->estado == 'abierto' ? 'bg-success' : ($ticket->estado == 'en_proceso' ? 'bg-warning' : 'bg-secondary') }}">{{ ucfirst(str_replace('_', ' ', $ticket->estado)) }}</span></td>
                                    <td>{{ $ticket->created_at->format('M d, Y') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
