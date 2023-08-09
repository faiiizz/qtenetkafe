<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesananDetail extends Model
{
    use HasFactory;
    protected $fillable = [

        'menu_id',
        'pesanan_id',
        'jumlah',
        'total',
        'keterangan'
    ];

    public function pesanan()
    {
        return $this->belongsTo(
            Pemesanan::class, 'pesanan_id', 'id'
        );
    }

    public function menu()
    {
        return $this->belongsTo(
            Menu::class, 'menu_id', 'id'
        );
    }

}
