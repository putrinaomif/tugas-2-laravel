<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class PageController extends Controller
{
    public function index(){
        $page = Page::all();
        return view('backend.content.page.list', compact('page'));
    }

    public function tambah(){
        return view('backend.content.page.formTambah');
        
    }

    public function prosesTambah(Request $request){
        $this->validate($request, [
            'judul_page' => 'required',
            'isi_page' => 'required'
        ]);

        $page = new Page();
        $page->judul_page = $request->judul_page;
        $page->isi_page = $request->isi_page;
        $page->status_page = 1;

        try{
            $page->save();
            return redirect(route('page.index'))->with('pesan', ['success', 'Berhasil Tambah page']);
        }catch (\Exception $e){
            return redirect(route('page.index'))->with('pesan', ['danger', 'Gagal Tambah page']);
        }
    }
    public function ubah($id){
        $page = Page::findOrFail($id);
        return view('backend.content.page.formUbah', compact('page'));
        
    }
    public function ProsesUbah(Request $request){
        $this->validate($request, [
            'id_page' => 'required',
            'judul_page' => 'required',
            'isi_page' => 'required',
            'status_page' => 'required'
        ]);
        $page =  Page::findOrFail($request->id_page);
        $page->judul_page = $request->judul_page;
        $page->isi_page = $request->isi_page;
        $page->status_page = $request->status_page;

        try{
            $page->save();
            return redirect(route('page.index'))->with('pesan', ['success', 'Berhasil Mengubah page']);
        }catch (\Exception $e){
            return redirect(route('page.index'))->with('pesan', ['danger', 'Gagal Mengubah page']);
        }
        
    }
    public function hapus($id){
        $page =  Page::findOrFail($id);

        try{
            $page->delete();
            return redirect(route('page.index'))->with('pesan', ['success', 'Berhasil Menghapus page']);
        }catch (\Exception $e){
            return redirect(route('page.index'))->with('pesan', ['danger', 'Gagal Menghapus page']);
        }
        
    }
    // public function exportPdf(){
    //     $kategori = Kategori::all();
    //     $pdf = Pdf::loadView('backend.content.kategori.export', compact('kategori'));
    //     return $pdf->download('Data Kategori.pdf');
    // }
}
