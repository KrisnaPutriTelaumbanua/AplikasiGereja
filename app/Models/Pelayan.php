<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelayan extends Model
{
    protected $table = 'pelayan';

    protected $primaryKey = 'id_pelayan';

    public $incrementing = true;

    protected $fillable = [
        'nama_pelayan',
        'id_departemen',
        'id_subdepartemen',
    ];

    /**
     * Relasi ke model Departemen
     *
     * Pelayan terkait dengan 1 Departemen
     */
    public function departemen()
    {
        return $this->belongsTo(Departemen::class, 'id_departemen', 'id_departemen');
    }

    /**
     * Relasi ke model Subdepartemen
     *
     * Pelayan terkait dengan 1 Subdepartemen
     */
    public function subdepartemen()
    {
        return $this->belongsTo(Subdepartemen::class, 'id_subdepartemen', 'id_subdepartemen');
    }
}
