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
    'StatusPesanan','KetVerifikasi'];


    public const PAID = 'Sudah';
	  public const UNPAID = 'Belum';

    public static function integerToRoman($integer)
      {
        $integer = intval($integer);
        $result = '';

        // Create a lookup array that contains all of the Roman numerals.
        $lookup = ['M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1];

        foreach ($lookup as $roman => $value) {
          $matches = intval($integer/$value);
          $result .= str_repeat($roman, $matches);
          $integer = $integer % $value;
        }

        return $result;
      }



  public static function generateCode()
	 {
		$dateCode = self::CODE . '/' . date('Ymd') . '/' .\m_PesananDesign::integerToRoman(date('m')). '/' .\m_PesananDesign::integerToRoman(date('d')). '/';

		$lastOrder = self::select([\DB::raw('MAX(orders.code) AS last_code')])
			->where('code', 'like', $dateCode . '%')
			->first();

		$lastOrderCode = !empty($lastOrder) ? $lastOrder['last_code'] : null;

		$orderCode = $dateCode . '00001';
		if ($lastOrderCode) {
			$lastOrderNumber = str_replace($dateCode, '', $lastOrderCode);
			$nextOrderNumber = sprintf('%05d', (int)$lastOrderNumber + 1);

			$orderCode = $dateCode . $nextOrderNumber;
		}

		if (self::_isOrderCodeExists($orderCode)) {
			return generateOrderCode();
		}

		return $orderCode;
	}
}
