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



}
