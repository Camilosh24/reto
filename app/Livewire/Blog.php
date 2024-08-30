<?php
namespace App\Livewire;

use App\Models\Post;
use App\Models\Categoria; 
use Livewire\Component;

class Blog extends Component
{
    public $blog;

    public function render()
    {   
        $this->blog = Post::select('posts.*', 'categorias.*')
            ->join('categorias', 'posts.category', '=', 'categorias.id')
            ->orderBy('posts.fecha', 'desc')
            ->get(); 

        return view('livewire.blog', ['blog' => $this->blog]);
    }
}
