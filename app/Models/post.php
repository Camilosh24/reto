<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;

    protected $filliable = [
        'titulo',
        'body',
        'category',
    ];

    protected $guarded = ['id'];
    

    public function categoria()
    {
        return $this->hasOne(categoria::class);
    }
}
