<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\m_PesananDesign;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

      $m_PesananDesign = m_PesananDesign::
                      leftjoin('datapaketdesigns','datapaketdesigns.idPaketRumah','=','pesanandesigns.IdPaketRumah')
                       -> leftjoin('paketdesigns','paketdesigns.IdPaket','=','pesanandesigns.IdPaket')
                       -> leftjoin('users','users.id','=','pesanandesigns.IdUSer')
                       -> select('pesanandesigns.*',
                       'users.name', 'users.email',
                       'paketdesigns.NamaPaket', 'paketdesigns.RangeHarga',
                       'datapaketdesigns.NamaPaketRumah','datapaketdesigns.RangeHarga',
                       'datapaketdesigns.WaktuPembuatan')
                       -> where('pesanandesigns.StatusPembayaran','=', 'Sudah')
                      -> get();

        // $waktu = m_PesananDesign->WaktuPembuatan;
        // $deadlen = Carbon::now()->addDays()->format('d-M-Y');

        return view('Designer.dashboard', compact('m_PesananDesign'));
        // dd($waktu);
    }


}
