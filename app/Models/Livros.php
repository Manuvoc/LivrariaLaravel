<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livros extends Model
{
    use HasFactory;
    protected $table = "livros";

    protected $fillable = [
        'nome', 'valor', 'generolivro_id', 'imagem'
    ];

    public function generolivro(){
        return $this->belongsTo(Generolivro::class,'generolivro_id','id');
    }

}
