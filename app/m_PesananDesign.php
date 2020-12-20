<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class m_PesananDesign extends Model
{
    protected $table = 'pesanandesigns';
    protected $primaryKey = 'IdPesanan';
    protected $fillable = ['IdPaket', 'IdPaketRumah','IdUSer',
    'PaymentToken', 'JenisRuangan','LuasRuangan', 'Hargatotal',
    'TinggiRuangan', 'LuasBangunan','JumlahLantai',
    'TinggiBangunan','JumlahKamar','Gambar','Keterangan','StatusPembayaran',
    'StatusPesanan','KetVerifikasi', 'WaktuTotal', 'created_at'];


    public const PAID = 'Sudah';
	  public const UNPAID = 'Belum';


}
