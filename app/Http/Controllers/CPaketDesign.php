<?php

namespace App\Http\Controllers;

use App\paketdesign;
use Illuminate\Http\Request;

class CPaketDesign extends Controller
{
    public function paketdesignUser(Request $request)
    {
      if($request->has('cari')){
        $paketdesigns = paketdesign::where('Kategori','LIKE','%'.$request->cari.'%')->get();
      }else{
        $paketdesigns = paketdesign::all();
      }
      return view('User.paketdesignUser',['paketdesigns' => $paketdesigns]);
    }

    public function lihat(paketdesign $paketdesign)
    {

      return view('User.detailpaketUser', compact('paketdesign'));

    }

    public function index()
    {
        $paketdesigns = paketdesign::all();
        return view('Designer.paketdesign', ['paketdesigns' => $paketdesigns]);
    }


    public function create()
    {
        return view('Designer.createpaket');
    }


    public function store(Request $request)
    {

        $this->validate($request,[
              'NamaPaket' => 'required',
              'Kategori' => 'required',
              'JenisRuang' => 'required',
              'Keterangan' => 'required',
              'Luas' => 'required|numeric',
              'RangeHarga' => 'required',
              'TinggiRuang' => 'required|numeric',
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

        $gambar->move(public_path().'/assets/images',$namagambar);
        $paketdesign->save();
        // dd($request);

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


    public function show(paketdesign $paketdesign)
    {

        return view('Designer.detailpaket', ['paketdesign' => $paketdesign]);
        // dd( $paketdesign);

    }


    public function edit(paketdesign $paketdesign)
    {
        return view('Designer.editpaket',compact('paketdesign'));
    }

    public function update(Request $request, paketdesign $paketdesign)
    {
      $this->validate($request,[
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
