<?php

namespace App\Livewire;

use App\Models\Categoria;
use Livewire\Component;
use Livewire\Attributes\On; 
use App\Models\Post;

class CrudPosts extends Component
{
    public $categorias, $posts, $titulo, $body, $category, $fecha, $post_id;
    public $isModalOpen = false;
    public $modalTitle = 'Crear Post';  


    public function render()
    {
        $this->categorias = Categoria::all();
        $this->posts = Post::all(); 
        return view('livewire.crud-posts');
    }

    public function create()
    {
        $this->resetInputFields();
        $this->modalTitle = 'Crear Post';  
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
        $this->titulo = '';
        $this->body = '';
        $this->category = '';
        $this->fecha = '';
        $this->post_id = null; 
    }

    public function store()
    {
        $this->validate([
            'titulo' => 'required',
            'body' => 'required',
            'category' => 'required',
            'fecha' => 'required',
        ]);

        Post::updateOrCreate(
            ['id' => $this->post_id], 
            [
                'titulo' => $this->titulo,
                'body' => $this->body,
                'category' => $this->category,
                'fecha' => $this->fecha
            ]
        );

        session()->flash('message', $this->post_id ? 'Post actualizado exitosamente.' : 'Post creado exitosamente.');
        

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $this->post_id = $id;
        $this->titulo = $post->titulo;
        $this->body = $post->body;
        $this->category = $post->category;
        $this->fecha = $post->fecha; 

        $this->modalTitle = 'Editar Post';
        $this->openModal();
    }

    public function confirmDelete($id)
    {
        $this->post_id = $id;
        $this->dispatch('post-delete', id: $this->post_id); 
    }

    #[On('delete')] 
    public function delete($id)
    {
        
        $post = post::findOrFail($id);
        $post->delete();
        
        session()->flash('message', 'Post eliminado exitosamente.');
    }
}
