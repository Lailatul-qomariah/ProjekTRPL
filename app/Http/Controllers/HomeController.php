<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\m_PesananDesign;
use App\m_DataPaketDesign;
use App\paketdesign;
use App\User;
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
                       -> select('pesanandesigns.*','users.*','paketdesigns.DesignerI','datapaketdesigns.DesignerR',
                       'paketdesigns.NamaPaket','datapaketdesigns.NamaPaketRumah')
                       -> where('pesanandesigns.StatusPembayaran','=', 'Sudah')
                       -> where('pesanandesigns.StatusPesanan','=', 'Proses')
                       -> Where('paketdesigns.DesignerI','=',auth()->user()->id)
                       ->orWhere('datapaketdesigns.DesignerR','=',auth()->user()->id)
                      -> get();


    $designrumah = m_DataPaketDesign::all();
    $designInterior = paketdesign::all();

        return view('Designer.dashboard', compact('m_PesananDesign', 'designrumah', 'designInterior'));
        // dd($m_PesananDesign);
    }

    public function profilUser( m_PesananDesign $m_PesananDesign)
    {
      $User = User::all()
      ->where('id','=', $m_PesananDesign->IdUSer)->first();
      return view('User.detailprofil', compact('User','m_PesananDesign'));

    }

    public function verifikasi(Request $request, m_PesananDesign $m_PesananDesign)
    {
      $this->validate($request,[
            'KetVerifikasi' => 'required',
      ]);
      $m_PesananDesign = m_PesananDesign::find($m_PesananDesign->IdPesanan);
      $m_PesananDesign->KetVerifikasi = $request->input('KetVerifikasi');
      $m_PesananDesign->StatusPesanan = 'Selesai';
      $m_PesananDesign->save();
      // dd($request);
      return redirect('/dashboard')->with('status', 'Pesanan Telah Diselesaikan');;
    }

    public function profil()
    {
      $User = User::all()->where('id','=',auth()->user()->id);
      return view('Designer.v_profil', compact('User'));
      // dd($User);
    }
    public function edit(User $User)
    {

        return view('Designer.v_editprofil', compact('User'));
        // dd($User);
    }
    public function updateProfil(Request $request, User $User)
    {
      $this->validate($request,[
            'name' => 'required|max:50',
            'last_name' => 'required|max:20',
            'biodata' => 'required',
            'phone' => 'required|numeric|between:0,9999999999999999999',
            'foto' => 'mimes:jpg,jpeg,png,webp'

      ]);

      $User = User::find($User->id);
      $User->update($request->all());
      if($request->hasFile('foto'))
            {
            $request->file('foto')->move('assets/images/',$request->file('foto')->getClientOriginalName());
            $User->foto=$request->file('foto')->getClientOriginalName();
            $User->save();
            }
      return redirect('/profilsaya');
      // dd($User);
    }

}
