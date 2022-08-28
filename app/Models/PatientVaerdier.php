<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientVaerdier extends Model
{
    use HasFactory;

    public $timestamps = true;

    public $fillable = [
        'slettet',
        'ydernummer',
        'dato',
        'standard_vaerdi',
        'praksis_vaerdi'
    ];

    protected $table = 'patient_vaerdier';
}
