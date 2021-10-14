<?php

namespace App\Http\Controllers\HR;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpahRequest;
use Illuminate\Http\Request;
use App\Model\Upah;

class UpahController extends Controller
{
    public function index(){
        $data = Upah::paginate(5);
        return view('pages.hr.upah.index',[
            'data' => $data
        ]);
    }

    public function store(UpahRequest $request){
        $data = $request->all();

        Upah::create($data);

        return redirect('/upah');
    }

    public function edit($id){
        $data = Upah::findOrFail($id);

        return view('pages.hr.upah.edit', [
            'data' => $data
        ]);
    }

    public function update(UpahRequest $request, $id){
        $item = Upah::findOrFail($id);

        $data = $request->all();

        $item->update($data);

        return redirect('/upah');
    }

    public function destroy($id){
        $data = Upah::findOrFail($id);

        $data->delete();

        return redirect('/upah');
    }
}
