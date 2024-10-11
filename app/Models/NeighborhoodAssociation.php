<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NeighborhoodAssociation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'location',
        'contact_info',
    ];

    // Definir relaciones si es necesario
    public function profiles()
    {
        return $this->hasMany(Profile::class);
    }

}
