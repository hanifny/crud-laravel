<?php
    namespace App\Models;
    use Illuminate\Support\Facades\DB;

    class JawabanModel {
        public static function get_all($id) {
            $jawaban = DB::table('jawaban')->where('pertanyaan_id', $id)->pluck('isi');
            foreach ($jawaban as $key => $isi) {
                $jawabannya[] = $isi;
            }
            return $jawabannya;
        }
        public static function save($data, $id) {
            $jawaban_baru = DB::table('jawaban')->insert(
                ['pertanyaan_id' => $id, 'isi' => $data]
            );
        }
    }

?>