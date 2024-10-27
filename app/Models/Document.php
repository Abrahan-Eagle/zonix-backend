<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Carbon\Carbon;

class Document extends Model
{
    use HasFactory;

    /**
     * Los atributos que se pueden asignar masivamente.
     */
    protected $fillable = [
        'profile_id',
        'type',
        'number',
        'front_image',
        'back_image',
        'issued_at',
        'expires_at',
        'approved',
        'status',
    ];

    /**
     * Los atributos que deben ser convertidos a tipos nativos.
     */
    protected $casts = [
        'issued_at' => 'datetime',
        'expires_at' => 'datetime',
        'approved' => 'boolean',
        'status' => 'boolean',
    ];

    /**
     * Relación con el modelo Profile.
     */
    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    /**
     * Mutator para la ruta de la imagen frontal.
     */
    protected function frontImage(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ? url("storage/{$value}") : null,
        );
    }

    /**
     * Mutator para la ruta de la imagen trasera.
     */
    protected function backImage(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ? url("storage/{$value}") : null,
        );
    }

    // /**
    //  * Accessor para el estado de vencimiento.
    //  */
    // protected function isExpired(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn () => $this->expires_at && Carbon::now()->greaterThan($this->expires_at),
    //     );
    // }

    /**
     * Scope para filtrar documentos aprobados.
     */
    public function scopeApproved($query)
    {
        return $query->where('approved', true);
    }

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    // /**
    //  * Scope para filtrar documentos vencidos.
    //  */
    // public function scopeExpired($query)
    // {
    //     return $query->whereDate('expires_at', '<', Carbon::now());
    // }
}
