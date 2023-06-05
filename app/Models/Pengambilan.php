<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Inventory;
use Illuminate\Database\Eloquent\Model;

class Pengambilan extends Model
{
    use HasFactory;
    protected $fillable = [

        'inventory_id',
        'jumlah',
        'tanggal',
        'keterangan'
    ];

    public function inventory()
    {
        return $this->belongsTo(
            Inventory::class, 'inventory_id', 'id'
        );
    }
}
