<?php
    namespace App\Models;
    use Illuminate\Support\Facades\DB;

    class PertanyaanModel {
        public static function get_all() {
            $pertanyaan = DB::table('pertanyaan')->get();
            return $pertanyaan;
        }
        public static function get($id) {
            $pertanyaan = DB::table('pertanyaan')->where('id', $id)->value('isi');
            return $pertanyaan;
        }
        public static function save($data) {
            $pertanyaan_baru = DB::table('pertanyaan')->insert($data);
            return $pertanyaan_baru;
        }
    }
?>