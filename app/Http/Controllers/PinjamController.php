<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pinjam;

class PinjamController extends Controller
{
    public function inputDataPinjam(Request $request){
        
        $id_pinjam      = $request->id_pinjam;
        $nim            = $request->nim;
        $kode_buku      = $request->kode_buku;
        $tgl_pinjam     = $request->tgl_pinjam;
        $tgl_kembali    = $request->tgl_kembali;

        try {

            $query = Pinjam::create([
                'id_pinjam'     => $id_pinjam,
                'nim'           => $nim,
                'kode_buku'     => $kode_buku,
                'tgl_pinjam'    => $tgl_pinjam,
                'tgl_kembali'   => $tgl_kembali,
                'status_pinjam' => '0',
            ]);

            return response()->json(
                [
                    'error'       => false,
                    'message'     => "sukses"
                ]
            );
        
        }
        catch(\Exception $e){
            return response()->json(
                [
                    'error'       => true,
                    'message'     => "gagal",
                    'err_message' => $e->getMessage()
                ]
            );
        }
    
    }
}
