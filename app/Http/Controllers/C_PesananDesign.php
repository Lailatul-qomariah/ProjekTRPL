<?php

namespace App\Http\Controllers;

use App\m_PesananDesign;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Carbon;

class C_PesananDesign extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexProsesDesign()
    {
        $m_PesananDesign = m_PesananDesign::
                        leftjoin('datapaketdesigns','datapaketdesigns.idPaketRumah','=','pesanandesigns.IdPaketRumah')
                         -> leftjoin('paketdesigns','paketdesigns.IdPaket','=','pesanandesigns.IdPaket')
                         -> leftjoin('users','users.id','=','pesanandesigns.IdUSer')
                         -> select('pesanandesigns.*','paketdesigns.NamaPaket', 'datapaketdesigns.NamaPaketRumah',)
                         -> where('users.id','=', auth()->user()->id)
                         -> where('pesanandesigns.StatusPembayaran','=', 'Sudah')
                         -> where('pesanandesigns.StatusPesanan','=', 'Proses')
                        -> get();
                        // dd($m_PesananDesign);
      return view('User.v_ProsesDesign', compact('m_PesananDesign'));

    }

    public function indexBelumBayar()
    {
        $m_PesananDesign = m_PesananDesign::
                        leftjoin('datapaketdesigns','datapaketdesigns.idPaketRumah','=','pesanandesigns.IdPaketRumah')
                         -> leftjoin('paketdesigns','paketdesigns.IdPaket','=','pesanandesigns.IdPaket')
                         -> leftjoin('users','users.id','=','pesanandesigns.IdUSer')
                         -> select('pesanandesigns.*','paketdesigns.NamaPaket', 'datapaketdesigns.NamaPaketRumah',)
                         -> where('users.id','=', auth()->user()->id)
                         -> where('pesanandesigns.StatusPembayaran','=', 'Belum')
                         -> where('pesanandesigns.StatusPesanan','=', 'Belum')
                        -> get();
      return view('User.pesanan', compact('m_PesananDesign'));
    }

    public function indexSelesaiDesign()
    {
        $m_PesananDesign = m_PesananDesign::
                        leftjoin('datapaketdesigns','datapaketdesigns.idPaketRumah','=','pesanandesigns.IdPaketRumah')
                         -> leftjoin('paketdesigns','paketdesigns.IdPaket','=','pesanandesigns.IdPaket')
                         -> leftjoin('users','users.id','=','pesanandesigns.IdUSer')
                         -> select('pesanandesigns.*','paketdesigns.NamaPaket','datapaketdesigns.NamaPaketRumah',)
                         -> where('users.id','=', auth()->user()->id)
                         -> where('pesanandesigns.StatusPembayaran','=', 'Sudah')
                         -> where('pesanandesigns.StatusPesanan','=', 'Selesai')
                        -> get();

      return view('User.v_selesai', compact('m_PesananDesign'));

    }

    public function indexDibatalkan()
    {
        $m_PesananDesign = m_PesananDesign::
                        leftjoin('datapaketdesigns','datapaketdesigns.idPaketRumah','=','pesanandesigns.IdPaketRumah')
                         -> leftjoin('paketdesigns','paketdesigns.IdPaket','=','pesanandesigns.IdPaket')
                         -> leftjoin('users','users.id','=','pesanandesigns.IdUSer')
                         -> select('pesanandesigns.*','paketdesigns.NamaPaket','datapaketdesigns.NamaPaketRumah',)
                         -> where('users.id','=', auth()->user()->id)
                         -> where('pesanandesigns.StatusPembayaran','=', 'Sudah')
                         -> where('pesanandesigns.StatusPesanan','=', 'Batal')
                        -> get();

      return view('User.v_Dibatalkan', compact('m_PesananDesign'));

    }

    public function BatalkanPesanan(Request $request, m_PesananDesign $m_PesananDesign)
    {

      $m_PesananDesign = m_PesananDesign::find($m_PesananDesign->IdPesanan);
      $m_PesananDesign->StatusPesanan = 'Batal';
      $m_PesananDesign->save();
      return redirect('/pesananDibatalkan');
      // dd($m_PesananDesign);
    }


    public function storeInterior(Request $request)//storerumah
    {
      $this->validate($request,[
            'JenisRuangan' => 'required|max:50',
            'LuasRuangan' => 'required|numeric|between:1,9999999999',
            'TinggiRuangan' => 'required|numeric|between:1,9999999999',
            'Keterangan' => 'required',
            'Gambar' => 'required|mimes:jpg,jpeg,png,webp',
      ]);

      $m_PesananDesign = m_PesananDesign::create($request->all());

      if ($request->Hargatotal){
        $hasil = $request->Hargatotal + 20000;
        $m_PesananDesign->Hargatotal = $hasil;
      }
      if($request->hasFile('Gambar'))
        {
        $request->file('Gambar')->move('assets/images/',$request->file('Gambar')->getClientOriginalName());
        $m_PesananDesign->Gambar=$request->file('Gambar')->getClientOriginalName();
        $m_PesananDesign->save();
        }
        // dd($m_PesananDesign);
        $this->generatePaymentToken($m_PesananDesign);
      return redirect('/paketdesign')->with('status', 'Pesanan Berhasil Ditambahkan!!');

    }


    public function store(Request $request)//storerumah
    {

      $this->validate($request,[
            'LuasBangunan' => 'required|numeric|between:1,9999999999',
            'JumlahLantai' => 'required|numeric|between:1,9999999999',
            'TinggiBangunan' => 'required|numeric|between:1,9999999999',
            'JumlahKamar' => 'required|numeric|between:1,9999999999',
            'Keterangan' => 'required',
            'Gambar' => 'required|mimes:jpg,jpeg,png,webp'
      ]);

      $m_PesananDesign = m_PesananDesign::create($request->all());
      if ($request->Hargatotal){
        $hasil = $request->Hargatotal + 20000;
        $m_PesananDesign->Hargatotal = $hasil;
      }
      if($request->hasFile('Gambar'))
        {
        $request->file('Gambar')->move('assets/images/',$request->file('Gambar')->getClientOriginalName());
        $m_PesananDesign->Gambar=$request->file('Gambar')->getClientOriginalName();
        $m_PesananDesign->save();
        }

        $this->generatePaymentToken($m_PesananDesign);
      return redirect('/designrumah')->with('status', 'Pesanan Berhasil Ditambahkan!!');

    }

    private function generatePaymentToken($m_PesananDesign)
    {
      $this->initPaymentGateway();

      $customersDetails = [

        'first_name'=>auth()->user()->name,
        'last_name' => auth()->user()->last_name,
        'email'=>auth()->user()->email,
        'phone' =>auth()->user()->phone,

      ];
      $params = [
        'enable_payments' => \App\m_payment::PAYMENT_CHANNELS,
        'transaction_details' => [
          'order_id' => $m_PesananDesign->IdPesanan,
          'gross_amount' => $m_PesananDesign->Hargatotal,
        ],
        'customer_details' => $customersDetails,
        'expiry' => [
          'start_time' => date('Y-m-d H:i:s T'),
          'unit' => \App\m_payment::EXPIRY_UNIT,
          'duration' => \App\m_payment::EXPIRY_DURATION,
        ],
      ];
      // dd($params);
      $snap = \Midtrans\Snap::createTransaction($params);
      // dd($payment_url);
      if($snap->token){
        $m_PesananDesign->PaymentToken = $snap->token;
        $m_PesananDesign->PaymentUrl = $snap->redirect_url;
        $m_PesananDesign->save();

      }
    }

    public function destroy(m_PesananDesign $m_PesananDesign)
    {

      m_PesananDesign::destroy($m_PesananDesign->IdPesanan);
      return redirect('/pesananBayar')->with('status', 'Data Berhasil DIHAPUS!!');

    }

    public function RiwayatPemesanan()
    {

      $m_PesananDesign = m_PesananDesign::
                      leftjoin('datapaketdesigns','datapaketdesigns.idPaketRumah','=','pesanandesigns.IdPaketRumah')
                       -> leftjoin('paketdesigns','paketdesigns.IdPaket','=','pesanandesigns.IdPaket')
                       -> leftjoin('users','users.id','=','pesanandesigns.IdUSer')
                       -> select('pesanandesigns.*',
                       'paketdesigns.NamaPaket','datapaketdesigns.NamaPaketRumah')
                       -> Where('pesanandesigns.StatusPesanan','=', 'Selesai')
                       -> orWhere('pesanandesigns.StatusPesanan','=', 'Batal')
                      -> get();

        return view('Designer.v_RiwayatPemesanan', compact('m_PesananDesign'));
        // dd($waktu);
    }
}
