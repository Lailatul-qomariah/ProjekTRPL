<?php

namespace App\Http\Controllers;

use App\m_payment;
use App\m_PesananDesign;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class C_payment extends Controller
{


    public function notification(Request $request)
  	{
      // dd($request);
  		$payload = $request->getContent();
  		$notification = json_decode($payload);
      // dd($payload);

  		$validSignatureKey = hash("sha512", $notification->order_id . $notification->status_code . $notification->gross_amount . env('MIDTRANS_SERVER_KEY'));

  		if ($notification->signature_key != $validSignatureKey) {
  			return response(['message' => 'Invalid signature'], 403);
  		}

  		$this->initPaymentGateway();
  		$statusCode = null;
      //
  		$paymentNotification = new \Midtrans\Notification();

  		$transaction = $paymentNotification->transaction_status;
  		$type = $paymentNotification->payment_type;
  		$orderId = $paymentNotification->order_id;
  		$fraud = $paymentNotification->fraud_status;

  		$vaNumber = null;
  		$vendorName = null;
  		if (!empty($paymentNotification->va_numbers[0])) {
  			$vaNumber = $paymentNotification->va_numbers[0]->va_number;
  			$vendorName = $paymentNotification->va_numbers[0]->bank;
  		}

  		$paymentStatus = null;
  		if ($transaction == 'capture') {
  			// For credit card transaction, we need to check whether transaction is challenge by FDS or not
  			if ($type == 'credit_card') {
  				if ($fraud == 'challenge') {
  					//  set payment status in merchant's database to 'Challenge by FDS'
  					//  merchant should decide whether this transaction is authorized or not in MAP
  					$paymentStatus = m_payment::CHALLENGE;
  				} else {
  					//  set payment status in merchant's database to 'Success'
  					$paymentStatus = m_payment::SUCCESS;
  				}
  			}
  		} else if ($transaction == 'settlement') {
  			//  set payment status in merchant's database to 'Settlement'
  			$paymentStatus = m_payment::SETTLEMENT;
  		} else if ($transaction == 'pending') {
  			//  set payment status in merchant's database to 'Pending'
  			$paymentStatus = m_payment::PENDING;
  		} else if ($transaction == 'deny') {
  			//  set payment status in merchant's database to 'Denied'
  			$paymentStatus = m_payment::DENY;
  		} else if ($transaction == 'expire') {
  			//  set payment status in merchant's database to 'expire'
  			$paymentStatus = m_payment::EXPIRE;
  		} else if ($transaction == 'cancel') {
  			//  set payment status in merchant's database to 'Denied'
  			$paymentStatus = m_payment::CANCEL;
  		}

  		$paymentParams = [
  			'IdPesanan' => $notification->order_id,
  			'TanggalPesan' => $notification->transaction_time,
  			'Amount' => $notification->gross_amount,
  			'Method' => 'midtrans',
  			'Status' => $paymentStatus,
  			'Token' => $notification->transaction_id,
  			'Payloads' => $payload,
  			'PaymentType' => $notification->payment_type,
  			'VaNumber' => $notification->masked_card,
  			'VendorName' => $notification->bank,
  			'StatusCode' => $notification->status_code,
  			'BillKey' => $notification->signature_key,
  		];

  		$payment = m_payment::create($paymentParams);
      $pesanan = m_PesananDesign::where('IdPesanan', $notification->order_id)->firstOrFail();
      // dd($pesanan);
  		if ($paymentStatus && $payment) {
  			\DB::transaction(
  				function () use ($pesanan, $payment) {
  					if (in_array($payment->Status, [m_payment::SUCCESS, m_payment::SETTLEMENT])) {
  						$pesanan->StatusPembayaran = m_PesananDesign::PAID;
              $pesanan->StatusPesanan = 'Proses';
              $pesanan->deadline =  Carbon::now()->addDays($pesanan->WaktuTotal)->format('Y-m-d H:i:s');
  						$pesanan->save();
  					}
  				}
  			);
  		}
  		$message = 'Payment status is : '. $paymentStatus;

  		$response = [
  			'code' => 200,
  			'message' => $message,
  		];

  		return response($response, 200);
  	}


  	public function completed(Request $request)
  	{
  		$code = $request->query('order_id');
  		$pesanan = m_PesananDesign::where('IdPesanan', $code)->firstOrFail();

  		if ($pesanan->StatusPembayaran='Belum') {
  			return redirect('payments/failed?order_id='. $code);
  		}

  		\Session::flash('success', "Thank you for completing the payment process!");

  		return redirect('/dashboard');


  	}


  	public function unfinish(Request $request)
  	{
  		$code = $request->query('order_id');
  		$pesanan = m_PesananDesign::where('IdPesanan', $code)->firstOrFail();

  		\Session::flash('error', "Sorry, we couldn't process your payment.");

  		return redirect('/dashboard');
  	}


  	public function failed(Request $request)
  	{
  		$code = $request->query('order_id');
  		$pesanan = m_PesananDesign::where('IdPesanan', $code)->firstOrFail();

  		\Session::flash('error', "Sorry, we couldn't process your payment.");

  		return redirect('/dashboard');
  	}
}
