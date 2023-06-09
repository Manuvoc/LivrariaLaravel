<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emprestimo extends Model
{
    use HasFactory;
    protected $table = "emprestimo";

    protected $fillable = [
        'livros_id', 'dataretirada','datadevolucao', 
    ];

    public function livro(){
        return $this->belongsTo(Livros::class,'livros_id','id');
    }

}
