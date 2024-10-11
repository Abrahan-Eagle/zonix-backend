<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GasTicket extends Model
{
    use HasFactory;

    protected $fillable = [
        'queue_position',
        'qr_code',
        'reserved_date',
        'appointment_date',
        'expiry_date',
        'date',
        'status',
        'asistio',
        'profile_id',
        'gas_cylinders_id',
    ];

    // Relación con el perfil
    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    public function gasCylinder()
    {
        return $this->belongsTo(GasCylinder::class);
    }

}
