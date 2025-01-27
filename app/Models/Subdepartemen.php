<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subdepartemen extends Model
{
    protected $table = 'subdepartemens';
    protected $primaryKey = 'id_subdepartemen';
    public $incrementing = true;

    // Kolom yang dapat diisi secara mass-assignment
    protected $fillable = [
        'nama_subdepartemen',
    ];
}
