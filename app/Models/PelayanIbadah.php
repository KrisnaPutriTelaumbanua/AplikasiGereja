<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PelayanIbadah extends Model
{
    protected $table = 'pelayan_ibadah'; // Nama tabel
    protected $primaryKey = 'id_pelayan_ibadah'; // Primary key
    public $incrementing = true; // Primary key auto-increment
    protected $fillable = [
        'id_pelayan',
        'id_ibadah',
    ];

    // Relasi ke model Pelayan
    public function pelayan(): BelongsTo
    {
        return $this->belongsTo(Pelayan::class, 'id_pelayan', 'id_pelayan');
    }

    // Relasi ke model Ibadah
    public function ibadah(): BelongsTo
    {
        return $this->belongsTo(Ibadah::class, 'id_ibadah', 'id_ibadah');
    }
}
