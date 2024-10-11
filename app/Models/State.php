<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

        protected $table = 'states';

        protected $fillable = [ 'code', 'name', ];

        public function cities(){
            return $this->hasMany(City::class);
        }

        public function state()
        {
            return $this->belongsTo(State::class);
        }
}
