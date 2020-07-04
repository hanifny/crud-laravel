<?php
    namespace App\Models;
    use Illuminate\Support\Facades\DB;

    class PertanyaanModel {
        public static function get_all() {
            $pertanyaan = DB::table('pertanyaan')->get();
            return $pertanyaan;
        }
        public static function get($id) {
            $pertanyaan = DB::table('pertanyaan')->where('id', $id)->get();
            return $pertanyaan;
        }
        public static function save($data) {
            $pertanyaan_baru = DB::table('pertanyaan')->insert($data);
        }
        public static function update($id, $data) {
            $pertanyaan_updated = DB::table('pertanyaan')->where('id', $id)->update(
                ['judul' => $data['judul'], 'isi' => $data['isi']]
            ); 
        }
        public static function delete($id) {
            DB::table('pertanyaan')->where('id', $id)->delete();
        }
    }
?>