<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subdepartemen extends Model
{
    protected $table = 'pelayan_ibadah';
    protected $primaryKey = 'id_pelayan_ibadah';
    public $incrementing = true;
    protected $fillable = [
        'id_pelayan',
        'id_ibadah',
        'id_departemen',
        'id_subdepartemen',
    ];


    public function pelayan(): BelongsTo
    {
        return $this->belongsTo(Pelayan::class, 'id_pelayan', 'id_pelayan');
    }


    public function ibadah(): BelongsTo
    {
        return $this->belongsTo(Ibadah::class, 'id_ibadah', 'id_ibadah');
    }


    public function departemen(): BelongsTo
    {
        return $this->belongsTo(Departemen::class, 'id_departemen', 'id_departemen');
    }


    public function subdepartemen(): BelongsTo
    {
        return $this->belongsTo(Subdepartemen::class, 'id_subdepartemen', 'id_subdepartemen');
    }
}
