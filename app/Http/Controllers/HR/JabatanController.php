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
        
    }
}
