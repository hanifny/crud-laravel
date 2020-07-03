<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JawabanModel;
use App\Models\PertanyaanModel;

class JawabanController extends Controller
{
    public static function index(Request $request) {
        $id = $request->path();
        $id = explode("/", $id);
        $id = $id[1];
        $jawaban = JawabanModel::get_all($id);
        $pertanyaan = PertanyaanModel::get($id);
        return view('jawaban.index', ['isi' => $jawaban, 'id' => $id, 'pertanyaan' => $pertanyaan]);
    }
    public static function store(Request $request) {
        $data = $request->all();
        $id = $request->path();
        $id = explode("/", $id);
        $id = $id[1];
        unset($data['_token']);
        // dd($data);
        $jawaban = JawabanModel::save($data["isi"], $id);
        return redirect('/jawaban/'.$id);
    }
}
