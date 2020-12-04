<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class paketdesign extends Model
{
    //
    protected $table = 'paketdesigns';
    protected $primaryKey = 'IdPaket';
    protected $fillable = ['NamaPaket','Kategori','JenisRuang',
    'Luas','TinggiRuang','RangeHarga','Keterangan', 'Gambar', 'WaktuPembuatan'];
}
