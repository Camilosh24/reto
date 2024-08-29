<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Categoria;

class CrudCategoria extends Component
{
    public $categorias, $nombre, $categoria_id;
    public $isModalOpen = false;
    public $modalTitle = 'Crear Categoría'; // Variable para el título del modal

    public function render()
    {
        $this->categorias = Categoria::all();
        return view('livewire.crud-categoria');
    }

    public function create()
    {
        $this->resetInputFields();
        $this->modalTitle = 'Crear Categoría'; // Establece el título para crear
        $this->openModal();
    }

    public function openModal()
    {
        $this->isModalOpen = true;
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
    }

    private function resetInputFields()
    {
        $this->nombre = '';
        $this->categoria_id = null;
    }

    public function store()
    {
        $this->validate([
            'nombre' => 'required',
        ]);

        Categoria::updateOrCreate(['id' => $this->categoria_id], [
            'nombre' => $this->nombre
        ]);

        session()->flash('message', $this->categoria_id ? 'Categoría actualizada exitosamente.' : 'Categoría creada exitosamente.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $categoria = Categoria::findOrFail($id);
        $this->categoria_id = $id;
        $this->nombre = $categoria->nombre;

        $this->modalTitle = 'Editar Categoría'; // Establece el título para editar
        $this->openModal();
    }

    public function delete($id)
    {
        Categoria::find($id)->delete();
        session()->flash('message', 'Categoría eliminada exitosamente.');
    }
}