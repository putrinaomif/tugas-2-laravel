<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use Barryvdh\DomPDF\Facade\Pdf;

class KategoriController extends Controller
{
    public function index(){
        $kategori = Kategori::all();
        return view('backend.content.kategori.list', compact('kategori'));
    }

    public function tambah(){
        return view('backend.content.kategori.formTambah');
        
    }

    public function prosesTambah(Request $request){
        $this->validate($request, [
            'nama_kategori' => 'required'
        ]);

        $kategori = new kategori();
        $kategori->nama_kategori = $request->nama_kategori;

        try{
            $kategori->save();
            return redirect(route('kategori.index'))->with('pesan', ['success', 'Berhasil']);
        }catch (\Exception $e){
            return redirect(route('kategori.index'))->with('pesan', ['danger', 'Gagal Tambah Kategori']);
        }
    }
    public function ubah($id){
        $kategori = Kategori::findOrFail($id);
        return view('backend.content.kategori.formUbah', compact('kategori'));
        
    }
    public function ProsesUbah(Request $request){
        $this->validate($request, [
            'id_kategori' => 'required',
            'nama_kategori' => 'required'
        ]);
        $kategori =  kategori::findOrFail($request->id_kategori);
        $kategori->nama_kategori = $request->nama_kategori;

        try{
            $kategori->save();
            return redirect(route('kategori.index'))->with('pesan', ['success', 'Berhasil Mengubah Kategori']);
        }catch (\Exception $e){
            return redirect(route('kategori.index'))->with('pesan', ['danger', 'Gagal Mengubah Kategori']);
        }
        
    }
    public function hapus($id){
        $kategori =  kategori::findOrFail($id);

        try{
            $kategori->delete();
            return redirect(route('kategori.index'))->with('pesan', ['success', 'Berhasil Menghapus Kategori']);
        }catch (\Exception $e){
            return redirect(route('kategori.index'))->with('pesan', ['danger', 'Gagal Menghapus Kategori']);
        }
        
    }
    public function exportPdf(){
        $kategori = Kategori::all();
        $pdf = Pdf::loadView('backend.content.kategori.export', compact('kategori'));
        return $pdf->download('Data Kategori.pdf');
    }
}
