<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class m_DataPaketDesign extends Model
{
  protected $table = 'datapaketdesigns';
  protected $primaryKey = 'idPaketRumah';
  protected $fillable = ['NamaPaketRumah','KetegoriRumah','LuasBangun','JumlahLantai','TinggiBangun',
  'JumlahKamar','Keterangan','RangeHarga','WaktuPembuatan','GamabarRumah', 'DesignerR'];

  public function m_DataPaketDesign(){
    return $this->belongsTo('App\m_DataPaketDesign');
  }
}
