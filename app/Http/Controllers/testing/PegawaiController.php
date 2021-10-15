<?php

namespace App\Http\Controllers\HR;

use App\Http\Controllers\Controller;
use App\Http\Requests\PegawaiRequest;
use Illuminate\Http\Request;
use App\Model\Jabatan;
use App\Model\Pegawai;
use Illuminate\Support\Facades\DB;

class PegawaiController extends Controller
{
    public function index(){
        $data = DB::table('pegawai')
                    ->join('jabatan', 'pegawai.jabatan_id', '=', 'jabatan.id')
                    ->select('pegawai.*', 'jabatan.nama_jabatan')
                    ->get();
    
        return view('pages.hr.pegawai.index', [
            'data' => $data
        ]);
    }

    public function create(){
        $data = Jabatan::all();
        return view('pages.hr.pegawai.create', [
            'data' => $data
        ]);
    }

    public function store(PegawaiRequest $request){
        $data = $request->all();
        $data['no_pegawai'] = 'GS005'.rand(1, 1000);
        
        if($request->hasFile('photo')){
            $data['photo'] = $request->file('photo')->store(
                'file/photo', 'public'
            );
        }else{
            $data['photo'] = 'file/nofile.pdf';
        }

        Pegawai::create($data);

        return redirect('/pegawai');
    }

    public function edit($id){
        // $data = Pegawai::findOrFail($id);
        $data = DB::table('pegawai')
                    ->join('jabatan', 'pegawai.jabatan_id', '=', 'jabatan.id')
                    ->select('pegawai.*', 'jabatan.nama_jabatan')
                    ->where('pegawai.id', '=', $id)
                    ->first();

        $jabatan = Jabatan::all();

        return view('pages.hr.pegawai.edit', [
            'data' => $data,
            'jabatan' => $jabatan
        ]);
    }

    public function update(PegawaiRequest $request, $id){
        $item = Pegawai::findOrFail($id);

        $data = $request->all();

        if($request->hasFile('photo')){
            $data['photo'] = $request->file('photo')->store(
                'file/photo', 'public'
            );
        }else{
            $data['photo'] = $item->photo;
        }
        
        print($data);

        $item->update($data);

        return redirect('/pegawai');
    }

    public function destroy($id){
        $data = Pegawai::findOrFail($id);

        $data->delete();

        return redirect('/pegawai');
    }
}
