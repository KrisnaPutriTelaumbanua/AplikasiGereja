<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PelayanIbadah extends Model
{
    protected $table = 'pelayan_ibadah';
    protected $primaryKey = 'id_pelayan_ibadah';
    public $incrementing = true;
    protected $fillable = [
        'id_pelayan',
        'id_ibadah',
    ];

    // Relasi ke model Pelayan

    public function pelayan()
    {
        return $this->belongsTo(Pelayan::class, 'id_pelayan');
    }



    public function ibadah(): BelongsTo
    {
        return $this->belongsTo(Ibadah::class, 'id_ibadah', 'id_ibadah');
    }
}
