<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class m_payment extends Model
{
    protected $table = 'payments';
    protected $primaryKey = 'IdPay';
    protected $fillable = [
      'IdPesanan',
      'TanggalPesan',
      'Amount',
      'Method',
      'Status',
      'Token',
      'Payloads',
      'PaymentType',
      'VaNumber',
      'VendorName',
      'StatusCode',
      'BillKey'
    ];

    public const PAYMENT_CHANNELS = ['credit_card', 'cimb_clicks', 'bca_klikbca',
    'bca_klikpay', 'bri_epay', 'telkomsel_cash', 'echannel',
    'permata_va', 'other_va', 'bca_va', 'bni_va', 'bri_va', 'indomaret',
    'danamon_online', 'akulaku'
    ];

    public const EXPIRY_DURATION =7;
    public const EXPIRY_UNIT = 'days';

    public const CHALLENGE = 'challenge';
    public const SUCCESS ='success';
    public const SETTLEMENT = 'settlement';
    public const PENDING = 'pending';
    public const DENY = 'deny';
    public const EXPIRE = 'expire';
    public const CANCEL = 'cancel';

    public const PAYMENTCODE = 'PAY';

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
      $dataCode = self::PAYMENTCODE.'/'. date('Ymd') . '/'.m_payment::integerToRoman(date('m')). '/'
      .m_payment::integerToRoman(date('d')).'/';

      $lastOrder = self::selct([\DB::raw('MAX(payments.number) AS last_code')])
      ->where('number', 'like', $dataCode . '%')
      ->first();

      $lastOrderCode = !empty($lastOrder) ? $lastOrder ['last_code'] : null;

      $orderCode = $dataCode.'00001';
      if ($lastOrder) {
        $lastOrderNumber = str_replace($dataCode, '', $lastOrderCode);
        $nextOrderNumber = sprintf ('%05d', (int)$lastOrderNumber + 1);

        $orderCode = $dataCode . $nextOrderNumber;
      }
      if (self::_isOrderCodeExists($orderCode)){
        return generateCode();
      }
      return $orderCode;
    }


    private static function _isOrderCodeExists($orderCode)
    {
      return self::where('number', '=', $orderCode)->exists();
    }

}
