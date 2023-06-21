<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Buku;

class BukuController extends Controller
{
    public function tambahBuku(Request $request){
        
        $kode_buku        = $request->kode_buku;
        $judul_buku       = $request->judul_buku;
        $judul_buku_asli  = $request->judul_buku_asli;
        $kategori         = $request->kategori;
        $penulis          = $request->penulis;
        $editor           = $request->editor;
        $penerjemah       = $request->penerjemah;
        $bahasa           = $request->bahasa;
        $penerbit         = $request->penerbit;
        $thn_terbit       = $request->thn_terbit;
        $jml_hlm          = $request->jml_hlm;
        $volume           = $request->volume;
        $sinopsis         = $request->sinopsis;
        $cover_depan      = $request->file('cover_depan');
        $cover_belakang   = $request->file('cover_belakang');
        $kelayakan        = $request->kelayakan;
        $jenis            = $request->jenis;
        $status_buku      = $request->status_buku;

        try{

            if (Buku::where('kode_buku', $kode_buku)->exists()) {
                return response()->json(
                    [
                        'error'=>true,
                        'message'=>'buku sudah ada'
                    ]
                );
            } else{
                $query = Buku::create([
                    'kode_buku'         => $kode_buku,
                    'judul_buku'        => $judul_buku,
                    'judul_buku_asli'   => $judul_buku_asli,
                    'kategori'          => $kategori,
                    'penulis'           => $penulis,
                    'editor'            => $editor,
                    'penerjemah'        => $penerjemah,
                    'bahasa'            => $bahasa,
                    'penerbit'          => $penerbit,
                    'thn_terbit'        => $thn_terbit,
                    'jml_hlm'           => $jml_hlm,
                    'volume'            => $volume,
                    'sinopsis'          => $sinopsis,
                    'cover_depan'       => $cover_depan->getClientOriginalName(),
                    'cover_belakang'    => $cover_belakang->getClientOriginalName(),
                    'kelayakan'         => $kelayakan,
                    'jenis'             => $jenis,
                    'status_buku'       => $status_buku,
                ]);

                $direktori = 'cover_images';
    
                $cover_depan->move($direktori, $cover_depan->getClientOriginalName());
                $cover_belakang->move($direktori, $cover_belakang->getClientOriginalName());

                return response()->json(
                    [
                        'error'=>false,
                        'message'=>'Data Telah Ditambahkan'
                    ]
                );

            }
        }
        catch(\Exception $e){
            return response()->json(
                [
                    'error'=>true,
                    'message'=>$e->getMessage()
                ]
            );
        }
    }

    public function updateBuku(Request $request){

        $kode_buku        = $request->kode_buku;
        $judul_buku       = $request->judul_buku;
        $judul_buku_asli  = $request->judul_buku_asli;
        $kategori         = $request->kategori;
        $penulis          = $request->penulis;
        $editor           = $request->editor;
        $penerjemah       = $request->penerjemah;
        $bahasa           = $request->bahasa;
        $penerbit         = $request->penerbit;
        $thn_terbit       = $request->thn_terbit;
        $jml_hlm          = $request->jml_hlm;
        $volume           = $request->volume;
        $sinopsis         = $request->sinopsis;
        $cover_depan      = $request->file('cover_depan');
        $cover_belakang   = $request->file('cover_belakang');
        $kelayakan        = $request->kelayakan;
        $jenis            = $request->jenis;
        $status_buku      = $request->status_buku;


        try{

            if(Buku::where('kode_buku', $kode_buku)->exists()){
                
                $a = Buku::select('cover_depan')->where('kode_buku', $kode_buku)->get();
                $b = Buku::select('cover_belakang')->where('kode_buku', $kode_buku)->get();

                if($a[0]->cover_depan != $cover_depan->getClientOriginalName()){
                    File::delete('cover_images/'.$a[0]->cover_depan);
                    Buku::where('cover_depan', $a[0]->cover_depan)
                        ->update(['cover_depan' => $cover_depan->getClientOriginalName()]);
                }
                else if($b[0]->cover_depan != $cover_belakang->getClientOriginalName()){
                    File::delete('cover_images/'.$b[0]->cover_depan);
                    Buku::where('cover_belakang', $b[0]->cover_belakang)
                        ->update(['cover_belakang' => $cover_belakang->getClientOriginalName()]);
                }
            
            }

            $buku = Buku::updateOrCreate(
                ['kode_buku' => $kode_buku],
                [
                    'judul_buku' => $judul_buku,
                    'judul_buku_asli' => $judul_buku_asli,
                    'kategori' => $kategori,
                    'penulis' => $penulis,
                    'editor' => $editor,
                    'penerjemah' => $penerjemah,
                    'bahasa' => $bahasa,
                    'penerbit' => $penerbit,
                    'thn_terbit' => $thn_terbit,
                    'jml_hlm' => $jml_hlm,
                    'volume' => $volume,
                    'sinopsis' => $sinopsis,
                    'cover_depan' => $cover_depan->getClientOriginalName(),
                    'cover_belakang' => $cover_belakang->getClientOriginalName(),
                    'kelayakan' => $kelayakan,
                    'jenis' => $jenis,
                    'status_buku' => $status_buku,
                ]
            );

            $direktori = 'cover_images';
        
            $cover_depan->move($direktori, $cover_depan->getClientOriginalName());
            $cover_belakang->move($direktori, $cover_belakang->getClientOriginalName());

            return response()->json(
                [
                    'error'=>false,
                    'message'=>'Data Telah Diupdate'
                ]
            );
        }
        catch(\Exception $e){
            return response()->json(
                [
                    'error'=>true,
                    'message'=>$e->getMessage()
                ]
            );
        }
    }

    public function coba(Request $request){

        $cover_depan      = $request->file('cover_depan');
        
        $a = $cover_depan->getClientOriginalName();
        
        return $a;
    
    }
}
