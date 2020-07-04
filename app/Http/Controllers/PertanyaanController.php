<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PertanyaanModel;
use App\Models\JawabanModel;

class PertanyaanController extends Controller {
    // Menampilkan semua pertanyaan
    public function index() {
        $pertanyaan = PertanyaanModel::get_all();
        return view('pertanyaan.index', compact('pertanyaan'));
    }
    // Menampilkan pertanyaan tertentu
    public static function get_by_id(Request $request) {
        $id = $request->path();
        $id = explode("/", $id);
        $id = $id[1];
        $jawaban = JawabanModel::get_all($id);
        $pertanyaan = PertanyaanModel::get($id);
        return view('pertanyaan.index_by_id', ['isi' => $jawaban, 'id' => $id, 'pertanyaan' => $pertanyaan]);
    }
    // Buat pertanyaan
    public function create() {
        return view('pertanyaan.form');
    }
    public function store(Request $request) {
        $data = $request->all();
        unset($data['_token']);
        // return dd($data);
        $pertanyaan = PertanyaanModel::save($data);
        return redirect('/pertanyaan'); 
    }
    // Edit Pertanyaan
    public function edit(Request $request) {
        $id = $request->path();
        $id = explode("/", $id);
        $id = $id[1];
        $pertanyaan = PertanyaanModel::get($id);
        return view('pertanyaan.form_update', compact('pertanyaan'));
    }
    public function update(Request $request) {
        $data = $request->all();
        $id = $request->path();
        $id = explode("/", $id);
        $id = $id[1];
        unset($data['_token']);
        // dd($data);
        $pertanyaan = PertanyaanModel::update($id, $data);
        return redirect('/pertanyaan'); 
    }
    public function delete(Request $request) {
        $id = $request->path();
        $id = explode("/", $id);
        $id = $id[1];
        // dd($id);
        $pertanyaan_removed = PertanyaanModel::delete($id);
        return redirect('/pertanyaan');
    }
}
