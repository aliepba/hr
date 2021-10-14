<?php

namespace App\Http\Controllers\HR;

use App\Http\Controllers\Controller;
use App\Http\Requests\JabatanRequest;
use Illuminate\Http\Request;
use App\Model\Jabatan;

class JabatanController extends Controller
{
    public function index(){
        $data = Jabatan::paginate(5);
        return view('pages.hr.jabatan.index', [
            'data' => $data
        ]);
    }

    public function store(JabatanRequest $request){
        $data = $request->all();
        
        Jabatan::create($data);

        return redirect('/jabatan');
    }

    public function edit($id){
        $data = Jabatan::findOrFail($id);

        return view('pages.hr.jabatan.edit', [
            'data' => $data
        ]);
    }

    public function update(JabatanRequest $request, $id){
        $item = Jabatan::findOrFail($id);
        
        $data = $request->all();

        $item->update($data);

        print_r($data);

        // return redirect('/jabatan');
    }

    public function destroy($id){
        $data = Jabatan::findOrFail($id);
        $data->delete();

        return redirect('/jabatan');
    }

}
