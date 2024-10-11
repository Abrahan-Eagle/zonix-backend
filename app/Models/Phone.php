<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }


    public function operatorCode()
    {
        return $this->belongsTo(OperatorCode::class, 'operator_code_id');
    }

}
