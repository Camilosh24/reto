<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $filliable = ['nombre'];
    protected $guarded = ['id'];


    public function post()
    {
        return $this->belongsTo(post::class);
    }
}
