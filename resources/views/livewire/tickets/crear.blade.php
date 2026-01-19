<div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Crear Nuevo Ticket</h4>
                <form wire:submit.prevent="save">
                    <div class="form-group mb-3">
                        <label>Título</label>
                        <input type="text" wire:model="titulo" class="form-control @error('titulo') is-invalid @enderror">
                        @error('titulo') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label>Descripción</label>
                        <textarea wire:model="descripcion" rows="5" class="form-control @error('descripcion') is-invalid @enderror"></textarea>
                        @error('descripcion') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label>Prioridad</label>
                        <select wire:model="prioridad" class="form-control">
                            <option value="baja">Baja</option>
                            <option value="media">Media</option>
                            <option value="alta">Alta</option>
                        </select>
                    </div>

                    <div class="form-group text-end">
                        <a href="{{ route('tickets.index') }}" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Guardar Ticket</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
