<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leitura extends Model
{
    use HasFactory;
    protected $table = "leitura";

    protected $fillable = [
        'data_leitura', 'hora_leitura', 'valor_sensor','sensor_id', 'mac_id'
    ];


}
