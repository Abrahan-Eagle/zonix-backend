<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $table = 'profiles';

    // Ajuste en la clave foránea: 'user_id'
    protected $fillable = [
        'user_id',
        'firstName',
        'middleName',
        'lastName',
        'secondLastName',
        'photo_users',
        'date_of_birth',
        'maritalStatus',
        'sex',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function gasTickets()
    {
        return $this->hasMany(GasTicket::class);
    }

    public function gasCylinders()
    {
        return $this->hasMany(GasCylinder::class, 'profiles_id');
    }




    public function phones()
    {
        return $this->hasMany(Phone::class);
    }

    public function emails()
    {
        return $this->hasMany(Email::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }


}
