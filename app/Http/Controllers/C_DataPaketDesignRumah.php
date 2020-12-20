<?php

namespace App\Http\Controllers;

use App\m_DataPaketDesign;
use App\User;
use Illuminate\Http\Request;

class C_DataPaketDesignRumah extends Controller
{

    public function index()
    {
      $m_DataPaketDesign = m_DataPaketDesign::all();
      // dd($m_DataPaketDesign);
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
            'NamaPaketRumah' => 'required|max:50',
            'KetegoriRumah' => 'required|max:10',
            'LuasBangun' => 'required|numeric|between:1,9999999999',
            'JumlahLantai' => 'required|numeric|between:1,9999999999',
            'TinggiBangun' => 'required|numeric|between:1,9999999999',
            'JumlahKamar' => 'required|numeric|between:1,9999999999',
            'RangeHarga' => 'required|numeric|between:1,9999999999',
            'Keterangan' => 'required',
            'WaktuPembuatan' => 'required|numeric|between:1,9999999999',
            'GamabarRumah' => 'required|mimes:jpg,jpeg,png,webp',
      ]);

        $designrumah = m_DataPaketDesign::create($request->all());
        if($request->hasFile('GamabarRumah'))
          {
          $request->file('GamabarRumah')->move('assets/images/',$request->file('GamabarRumah')->getClientOriginalName());
          $designrumah->GamabarRumah=$request->file('GamabarRumah')->getClientOriginalName();
          $designrumah->save();
          }
          // dd($designrumah);
        return redirect('/designrumah')->with('status', 'Data Berhasil Ditambahkan!!');

    }

    public function show(m_DataPaketDesign $m_DataPaketDesign, User $User)
    {

      $User = User::all()
      ->where('id','=', $m_DataPaketDesign->DesignerR)->first();
      return view('Designer.v_detailPaketDesignRumah', ['m_DataPaketDesign' => $m_DataPaketDesign , 'User' => $User]);
    }

    public function profilDesigner(User $User)
    {
      return view('User.detailprofil', compact('User'));
    }

    // public function profilUser(User $User)
    // {
    //   return view('User.detailprofil', compact('User'));
    // }


    public function edit(m_DataPaketDesign $m_DataPaketDesign)
    {
        return view('Designer.v_formEditPaketDesign', compact('m_DataPaketDesign'));
        // dd($m_DataPaketDesign);
    }


    public function update(Request $request, m_DataPaketDesign $m_DataPaketDesign)
    {
      $this->validate($request,[
          'NamaPaketRumah' => 'required|max:50',
          'KetegoriRumah' => 'required|max:10',
          'LuasBangun' => 'required|numeric|between:1,9999999999',
          'JumlahLantai' => 'required|numeric|between:1,9999999999',
          'TinggiBangun' => 'required|numeric|between:1,9999999999',
          'JumlahKamar' => 'required|numeric|between:1,9999999999',
          'RangeHarga' => 'required|numeric|between:1,9999999999',
          'Keterangan' => 'required',
          'WaktuPembuatan' => 'required|numeric|between:1,9999999999',
          'GamabarRumah' => 'mimes:jpg,jpeg,png,webp',
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
