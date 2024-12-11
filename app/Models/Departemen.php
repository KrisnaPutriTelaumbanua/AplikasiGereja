<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departemen extends Model
{
    protected $table = 'departemens';
    protected $primaryKey = 'id_departemen';
    public $incrementing = true;
    protected $fillable = [
        'nama_departemen',
    ];

    /**
     * Relasi ke subdepartemen (model Subdepartemen).
     * Setiap departemen bisa memiliki banyak subdepartemen.
     */
    public function subdepartemens()
    {
        return $this->hasMany(Subdepartemen::class, 'id_departemen');
    }
}
