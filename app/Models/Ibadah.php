<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ibadah extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'ibadah'; // Ganti dengan nama tabel Anda

    // Menetapkan primary key
    protected $primaryKey = 'id_ibadah'; // Ganti dengan nama kolom primary key

    // Jika id_ibadah bukan auto-increment, tambahkan ini
    public $incrementing = false;

    // Kolom yang dapat diisi
    protected $fillable = [
        'tgl_ibadah',
        'waktu_ibadah',
        'id_kategori'
    ];


    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

    // Relasi dengan model Pelayan (jika ada)
    /*
    public function pelayan()
    {
        return $this->hasMany(Pelayan::class, 'id_ibadah'); // Ganti 'id_ibadah' jika berbeda
    }
    */
}
