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
                <th>Titulo</th>
                <th>Body</th>
                <th>categoria</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->titulo }}</td>
                    <td>{{ $post->body }}</td>
                    <td>{{ $post->category }}</td>
                    <td>{{ $post->fecha}}</td>
                    <td>
                        <button wire:click="edit({{ $post->id }})" class="btn btn-primary btn-sm"><i class="fa-solid fa-pen-to-square"></i> Editar</button>
                        <button wire:click="delete({{ $post->id }})" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Eliminar</button>
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
                        @csrf
                        <div class="form-group mt-3">
                            <label for="Titulo">Titulo</label>
                            <input type="text" class="form-control" id="titulo" wire:model="titulo">
                            @error('nombre') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="body">body</label>
                            <textarea type="text" class="form-control" id="body" wire:model="body"></textarea>
                            @error('nombre') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="category">Categoria</label>
                            <select name="category" id="category" class="form-select" wire:model="category">
                                <option value="">Seleccionar Categoria</option>
                                @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                                @endforeach
                            </select>
                            @error('category') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="fecha">Fecha</label>
                            <input type="date" class="form-control" id="fecha" wire:model="fecha">
                            @error('fecha') <span class="text-danger">{{ $message }}</span> @enderror
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
</div>


