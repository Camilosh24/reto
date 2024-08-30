<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12 mb-4">
            <button wire:click="create()" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Crear</button>
        </div>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categorias as $categoria)
                <tr>
                    <td>{{ $categoria->id }}</td>
                    <td>{{ $categoria->nombre }}</td>
                    <td>
                        <button wire:click="edit({{ $categoria->id }})" class="btn btn-primary btn-sm"><i class="fa-solid fa-pen-to-square"></i> Editar</button>
                        <button wire:click="confirmDelete({{ $categoria->id }})" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Eliminar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal -->
    <div class="modal fade @if($isModalOpen) show d-block @endif" tabindex="-1" role="dialog" @if($isModalOpen) style="display: block;" @else style="display: none;" @endif>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-dark text-white color-white">
                    <h5 class="modal-title">{{ $modalTitle }}</h5>
                    <button type="button" class="btn-close" wire:click="closeModal()"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" wire:model="nombre">
                            @error('nombre') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal()">Cerrar</button>
                    <button type="button" class="btn btn-primary" wire:click="store()">Guardar</button>
                </div>
            </div>
        </div>
    </div>


    @script
        @push('js')
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                document.addEventListener('livewire:init', () => {
                    Livewire.on('category-delete', (categoria_id) => {
                        Swal.fire({
                            title: "¿Deseas Eliminar La categoria?",
                            text: "Recuerda que no quedara registro de ella",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Si, Eliminar",
                            cancelButtonText: "Cancelar"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                Livewire.dispatch('delete', categoria_id);
                                Swal.fire({
                                    title: "Deleted!",
                                    text: "Your file has been deleted.",
                                    icon: "success"
                                });
                            }
                        });
                    });
                });
            </script>
        @endpush
    @endscript
</div>
