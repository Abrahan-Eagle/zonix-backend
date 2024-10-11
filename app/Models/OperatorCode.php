<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OperatorCode extends Model
{
    use HasFactory;


    protected $table = 'operator_codes';

    // Ajuste en la clave foránea: 'user_id'
    protected $fillable = ['id', 'code', 'name'];
}
