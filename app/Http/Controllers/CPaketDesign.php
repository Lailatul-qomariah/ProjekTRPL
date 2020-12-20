<?php

namespace App\Http\Controllers;

use App\paketdesign;
use Illuminate\Http\Request;
use App\User;

class CPaketDesign extends Controller
{

    public function index(Request $request)
    {
      if($request->has('cari')){
        $paketdesigns = paketdesign::where('Kategori','LIKE','%'.$request->cari.'%')->get();
      }else{
        $paketdesigns = paketdesign::all();
      }
        return view('Designer.paketdesign', ['paketdesigns' => $paketdesigns]);
    }
    public function createPesananInterior(paketdesign $paketdesign)
    {
        // $userid = Auth(user()->id);
        return view('User.v_fpdesigninterior', compact('paketdesign'));
        // dd($userid);
    }

    public function create()
    {
        return view('Designer.createpaket');
    }


    public function store(Request $request)
    {

        $this->validate($request,[
              'NamaPaket' => 'required|max:50',
              'Kategori' => 'required|max:10',
              'JenisRuang' => 'required|max:20',
              'Luas' => 'required|numeric|between:1,9999999999',
              'TinggiRuang' => 'required|numeric|between:1,9999999999',
              'RangeHarga' => 'required|numeric|between:1,9999999999',
              'WaktuPembuatan' => 'required|numeric|between:1,9999999999',
              'Keterangan' => 'required',
              'Gambar' => 'required|mimes:jpg,jpeg,png,webp'
        ]);
        // cara 1
        $gambar = $request->Gambar;
        $namagambar = $gambar->getClientOriginalName();

        $paketdesign = new paketdesign;
        $paketdesign -> NamaPaket = $request -> NamaPaket;
        $paketdesign -> Kategori = $request -> Kategori;
        $paketdesign -> JenisRuang = $request -> JenisRuang;
        $paketdesign -> Luas = $request -> Luas;
        $paketdesign -> TinggiRuang = $request -> TinggiRuang;
        $paketdesign -> RangeHarga = $request -> RangeHarga;
        $paketdesign -> Keterangan = $request -> Keterangan;
        $paketdesign -> Gambar = $namagambar;
        $paketdesign -> WaktuPembuatan = $request -> WaktuPembuatan;
        $paketdesign -> DesignerI = auth()->user()->id;


        $gambar->move(public_path().'/assets/images',$namagambar);
        $paketdesign->save();
        // dd($paketdesign);

        //cara2
        // paketdesign::create([
        //   'NamaPaket' => $request->NamaPaket,
        //   'JenisRuang' => $request->JenisRuang,
        //   'Luas' => $request->Luas,
        //   'TinggiRuang' => $request->TinggiRuang,
        //   'RangeHarga' => $request->RangeHarga,
        //   'Keterangan' => $request->Keterangan,
        //   'Gambar' => $request->Gambar,
        // ]);

        //cara3
        // paketdesign::create($request->all());

        return redirect('/paketdesign')->with('status', 'Data Berhasil Ditambahkan!!');

    }


    public function show(paketdesign $paketdesign, User $User)
    {
      $User = User::all()
      ->where('id','=', $paketdesign->DesignerI)->first();
        return view('Designer.detailpaket', ['paketdesign' => $paketdesign , 'User' => $User]);
        dd( $paketdesign);

    }


    public function edit(paketdesign $paketdesign)
    {
        return view('Designer.editpaket',compact('paketdesign'));
    }

    public function update(Request $request, paketdesign $paketdesign)
    {
      $this->validate($request,[
          'NamaPaket' => 'required|max:50',
          'Kategori' => 'required|max:10',
          'JenisRuang' => 'required|max:20',
          'Luas' => 'required|numeric|between:1,9999999999',
          'TinggiRuang' => 'required|numeric|between:1,9999999999',
          'RangeHarga' => 'required|numeric|between:1,9999999999',
          'WaktuPembuatan' => 'required|numeric|between:1,9999999999',
          'Keterangan' => 'required',
          'Gambar' => 'mimes:jpg,jpeg,png,webp'
      ]);
      $updatepaket = paketdesign::find($paketdesign->IdPaket);
      $updatepaket->update($request->all());
      if($request->hasFile('Gambar'))
            {
            $request->file('Gambar')->move('assets/images/',$request->file('Gambar')->getClientOriginalName());
            $updatepaket->Gambar=$request->file('Gambar')->getClientOriginalName();
            $updatepaket->save();
            }

        // paketdesign::where('IdPaket', $paketdesign->IdPaket)
        //             ->update([
        //               'NamaPaket' => $request->NamaPaket,
        //               'JenisRuang' => $request->JenisRuang,
        //               'Luas' => $request->JenisRuang,
        //               'TinggiRuang' => $request->TinggiRuang,
        //               'RangeHarga' => $request->RangeHarga,
        //               'Keterangan' => $request->Keterangan,
        //               'Gambar' => $request->$namagambar,
        //             ]);

        return redirect('/paketdesign')->with('status', 'Data Berhasil DIubah!!');

    }

    public function destroy(paketdesign $paketdesign)
    {
        //hapus data
        // paketdesign::destroy($paketdesign->IdPaket);
        // return redirect('/paketdesign')->with('status', 'Data Berhasil DIHAPUS!!');
        // return $paketdesign;

    }
}
