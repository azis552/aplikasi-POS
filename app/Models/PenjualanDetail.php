<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenjualanDetail extends Model
{
    use HasFactory;
    protected $fillable = ['id_penjualan','id_produk','diskon','jumlah_beli','harga_terjual','sesi'];
}
