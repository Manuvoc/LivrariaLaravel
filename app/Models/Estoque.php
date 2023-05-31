<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estoque extends Model
{
    use HasFactory;
    protected $table = "estoque";

    protected $fillable = [
        'livros_id', 'quantidade','fornecedor', 'imagem'
    ];

    public function livro(){
        return $this->belongsTo(Livros::class,'livros_id','id');
    }

}
