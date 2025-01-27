<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    protected $table = 'presensi';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = [
        'id_pelayan',
        'tgl',
        'status',
    ];

    /**
     * Relasi ke model Pelayan.
     * Setiap presensi berhubungan dengan satu pelayan.
     */
    public function pelayan()
    {
        return $this->belongsTo(Pelayan::class, 'id_pelayan');
    }
}
