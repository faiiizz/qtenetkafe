<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_pemesan',
        'kode_meja',

    ];

    public function pesanan_detail()
    {
        return $this->belongsTo(PesananDetail::class, 'menu_id', 'id');
    }
}
