<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\Subjek;
use Illuminate\Http\Request;

class SubjekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hitung['open'] = Laporan::where('status','like','1')->count();
        $hitung['pending'] = Laporan::where('status','like','2')->count();
        $hitung['close'] = Laporan::where('status','like','3')->count();

        $subjek = Subjek::orderBy('id_subjek','ASC')->get();
        $c_subjek = Subjek::count();

        $a = 1;
        foreach ($subjek as $key) {
            $totalh[$a] = 0;
            for ($i=1; $i < 13; $i++) {
                $j = str_pad($i,2,"0",STR_PAD_LEFT);
                $laporan[$a][$i] = Laporan::where('created_at','like',date('Y-'.$j).'%')->where('subjek','like',$key->kode_subjek)->count();
                $j = (int) $j;
                $totalh[$a] = $totalh[$a] + $laporan[$a][$i];
            }
            $a++;
        }

        
        for ($i=1; $i < 13; $i++) {
            $totalv[$i] = 0;
            $a = 1;
            foreach($subjek as $key){
                $totalv[$i] = $totalv[$i] + $laporan[$a][$i];
                // echo $laporan[$a][$i]." ";
                $a++;
            }
            
        }

        $totalv[13] = 0;
        $a = 1;
        foreach($subjek as $key){
            
            $totalv[13] = $totalv[13] + $totalh[$a];
            // echo $totalh[$a]." ";
            $a++;
        }

        // echo "<br>";

        // $a = 1;
        // foreach ($subjek as $key) {
        //     for ($i=1; $i < 13; $i++) { 
        //         echo $laporan[$a][$i]." ";
                
        //     }
        //     echo $totalh[$a];
        //     $a++;
        //     echo "<br>";
        // }

        // // $totalv[$i] = 0;
        // for ($i=1; $i < 13; $i++) {
            
        //     echo $totalv[$i]." ";
        // } echo $totalv[13];
        
        // $subjek = Subjek::orderBy('id_subjek','ASC')->get();
        return view('dashboard.master-subjek')->with('subjek',$subjek)->with('hitung',$hitung)->with('laporan',$laporan)->with('totalh',$totalh)->with('totalv',$totalv);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.form-subjek');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // echo "tesssss";
        $this->validate($request, [
            'kode_subjek' => 'required|unique:subjek',
            'subjek' => 'required'
        ]);

        $tambah = new Subjek();
        $tambah->kode_subjek = strtoupper($request['kode_subjek']);
        $tambah->subjek = $request['subjek'];

        $tambah->save();
        return redirect()->to('subjek');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Subjek::find($id);
        return view('dashboard.detail-subjek')->with('data',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Subjek::find($id);
        return view('dashboard.edit-subjek')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = Subjek::where('id_subjek',$id)->first();

        if ($request['kode_subjek'] == $update->kode_subjek) {
            $this->validate($request, [
                'kode_subjek' => 'required',
                'subjek' => 'required'
            ]);
        } else {
            $this->validate($request, [
                'kode_subjek' => 'required|unique:subjek',
                'subjek' => 'required'
            ]);
        }

        $update->kode_subjek = strtoupper($request['kode_subjek']);
        $update->subjek = $request['subjek'];

        $update->save();
        return redirect()->to('subjek');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = Subjek::find($id);
        $hapus->delete();

        return redirect()->to('subjek');
    }
}
