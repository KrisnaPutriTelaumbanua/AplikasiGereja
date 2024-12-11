<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'categories';

    // Menetapkan primary key
    protected $primaryKey = 'id_kategori'; // Ganti dengan nama kolom primary key

    // Jika id_kategori bukan auto-increment, tambahkan ini
    public $incrementing = false;

    // Kolom yang dapat diisi
    protected $fillable = [
        'nama_kategori',
        'deskripsi'
    ];

    // Relasi dengan model Product (jika ada)
    // Uncomment jika Anda menggunakan relasi
    /*
    public function ibadah()
    {
        return $this->hasMany(Product::class, 'id_kategori'); // Ganti 'id_kategori' dengan nama kolom yang sesuai jika berbeda
    }
    */
}
