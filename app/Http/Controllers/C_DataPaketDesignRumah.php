<?php

namespace App\Http\Controllers;

use App\m_DataPaketDesign;
use Illuminate\Http\Request;

class C_DataPaketDesignRumah extends Controller
{

    public function index()
    {
      $m_DataPaketDesign = m_DataPaketDesign::all();
      return view ('Designer.v_DataPaketDesignRumah', compact('m_DataPaketDesign'));
    }

    public function create()
    {
        return view('Designer.v_formTambahPaketDesign');
    }
    public function createPesananRumah(m_DataPaketDesign $m_DataPaketDesign)
    {
        return view ('User.v_fpdesignrumah',compact('m_DataPaketDesign'));
    }

    public function store(Request $request)
    {

      $this->validate($request,[
            'NamaPaketRumah' => 'required',
            'KetegoriRumah' => 'required',
            'LuasBangun' => 'required|numeric',
            'JumlahLantai' => 'required|numeric',
            'TinggiBangun' => 'required|numeric',
            'JumlahKamar' => 'required|numeric',
            'RangeHarga' => 'required',
            'Keterangan' => 'required',
            'WaktuPembuatan' => 'required',
            'GamabarRumah' => 'required|mimes:jpg,jpeg,png,webp'
      ]);

        $designrumah = m_DataPaketDesign::create($request->all());
        if($request->hasFile('GamabarRumah'))
          {
          $request->file('GamabarRumah')->move('assets/images/',$request->file('GamabarRumah')->getClientOriginalName());
          $designrumah->GamabarRumah=$request->file('GamabarRumah')->getClientOriginalName();
          $designrumah->save();
          }
        return redirect('/designrumah')->with('status', 'Data Berhasil Ditambahkan!!');

    }


    public function show(m_DataPaketDesign $m_DataPaketDesign)
    {
      return view('Designer.v_detailPaketDesignRumah', ['m_DataPaketDesign' => $m_DataPaketDesign]);
      // dd($m_dataPaketDesign);
    }


    public function edit(m_DataPaketDesign $m_DataPaketDesign)
    {
        return view('Designer.v_formEditPaketDesign', compact('m_DataPaketDesign'));
    }


    public function update(Request $request, m_DataPaketDesign $m_DataPaketDesign)
    {
      $this->validate($request,[
            'GamabarRumah' => 'mimes:jpg,jpeg,png,webp'
      ]);
      $updatedesign = m_DataPaketDesign::find($m_DataPaketDesign->idPaketRumah);
      $updatedesign->update($request->all());
      if($request->hasFile('GamabarRumah'))
            {
            $request->file('GamabarRumah')->move('assets/images/',$request->file('GamabarRumah')->getClientOriginalName());
            $updatedesign->GamabarRumah=$request->file('GamabarRumah')->getClientOriginalName();
            $updatedesign->save();
            }
      return redirect('/designrumah')->with('status', 'Data Berhasil Dirubah!!');

    }


    public function destroy(m_DataPaketDesign $m_DataPaketDesign)
    {
        //
    }

    public function designrumahUser()
    {
      $m_DataPaketDesign = m_DataPaketDesign::all();
      return view ('User.v_DataPaketDesignRumahU', compact('m_DataPaketDesign'));
    }

    public function showUser(m_DataPaketDesign $m_DataPaketDesign)
    {
      return view('User.v_DetailPaketRumahU', ['m_DataPaketDesign' => $m_DataPaketDesign]);
    }
}
