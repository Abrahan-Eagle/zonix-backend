<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NeighborhoodAssociation extends Model
{
    use HasFactory;

    protected $fillable = [
        'urbanization_name',
        'neighborhood_proof_photo',
        'approved',
        'profile_id',
    ];

    // Definir relaciones si es necesario
    public function profiles()
    {
        return $this->hasMany(Profile::class);
    }

}
