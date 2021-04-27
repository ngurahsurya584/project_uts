<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangModel;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{

    public function __construct()
    {
        $this->BarangModel = new BarangModel();
        $this->middleware('auth');
    }

    public function tolak()
    {
        return view('user.v_landing');
    }


    public function welcome()
    {

        return view('user.v_index');
    }

    public function admin()
    {

        return view('admin.v_index');
    }

    public function login()
    {

        return view('user.v_login');
    }

    public function register()
    {

        return view('user.v_register');
    }

    public function produk()
    {
        $data = [
            'barang' => $this->BarangModel->allData(),
        ];

        return view('user.v_produk', $data);
    }

    public function list()
    {
        $data = [
            'barang' => $this->BarangModel->allData(),
        ];
        return view('admin.v_list_barang', $data);
    }

    public function input()
    {

        return view('admin.v_input_barang');
    }

    public function insert()
    {
        Request()->validate([
            'nama_barang' => 'required|unique:barang|max:50',
            'harga_barang' => 'required',
            'deskripsi_barang' => 'required',
            'foto_barang' => 'required|mimes:jpg, jpeg',

        ], [
            'nama_barang.required' => 'mohon jangan kosong dan masukkan sesuai aturan',
            'nama_barang.unique' => 'ada nama yang sama',
            'nama_barang.max' => 'kelebihan',
            'harga_barang.required' => 'mohon diisi',
            'deskripsi_barang.required' => 'mohon diisi',
            'foto_barang.required' => 'mohon diisi',
            'foto_barang.mimes' => 'mohon masukkan file sesuai ekstensi yang diizinkan',

        ]);

        $file = Request()->foto_barang;
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('template_user/assets/img/portofolio'), $fileName);

        $data = [
            'nama_barang' => Request()->nama_barang,
            'harga_barang' => Request()->harga_barang,
            'deskripsi_barang' => Request()->deskripsi_barang,
            'foto_barang' => $fileName,
        ];

        $this->BarangModel->addData($data);

        return redirect()->route('list')->with('pesan', 'Data barang berhasil dimuat');
    }

    public function edit($id_barang)
    {
        if (!$this->BarangModel->detailData($id_barang)) {
            abort(404);
        }
        $data = [
            'barang' => $this->BarangModel->detailData($id_barang),
        ];
        return view('admin.v_edit_barang', $data);
    }

    public function update($id_barang)
    {
        Request()->validate([
            'nama_barang' => 'required|max:50',
            'harga_barang' => 'required',
            'deskripsi_barang' => 'required',
            'foto_barang' => 'mimes:jpg, jpeg',

        ], [
            'nama_barang.required' => 'mohon jangan kosong dan masukkan sesuai aturan',
            'nama_barang.unique' => 'ada nama yang sama',
            'nama_barang.max' => 'kelebihan',
            'harga_barang.required' => 'mohon diisi',
            'deskripsi_barang.required' => 'mohon diisi',
            'foto_barang.required' => 'mohon diisi',
            'foto_barang.mimes' => 'mohon masukkan file sesuai ekstensi yang diizinkan',

        ]);
        if (Request()->foto_barang <> "") {
            //hapus foto sebelum update
            $namaLama =  $this->BarangModel->deleteDataFoto($id_barang);
            $file_path = public_path('template_user\assets\img\portofolio\\' . $namaLama);
            unlink($file_path);
            //akhir code

            //upload foto
            $file = Request()->foto_barang;
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('template_user/assets/img/portofolio'), $fileName);
            //akhir code


            $data = [
                'nama_barang' => Request()->nama_barang,
                'harga_barang' => Request()->harga_barang,
                'deskripsi_barang' => Request()->deskripsi_barang,
                'foto_barang' => $fileName,
            ];
        } else {
            $data = [
                'nama_barang' => Request()->nama_barang,
                'harga_barang' => Request()->harga_barang,
                'deskripsi_barang' => Request()->deskripsi_barang,
            ];
        }


        $this->BarangModel->editData($id_barang, $data);

        return redirect()->route('list')->with('pesan', 'Data barang berhasil dirubah');
    }

    public function delete($id_barang)
    {
        if (!$this->BarangModel->detailData($id_barang)) {
            abort(404);
        }
        $namaLama =  $this->BarangModel->deleteDataFoto($id_barang);
        $file_path = public_path('template_user\assets\img\portofolio\\' . $namaLama);
        unlink($file_path);
        $this->BarangModel->deleteData($id_barang);
        return redirect()->route('list')->with('pesan', 'Data barang berhasil dihapus');
    }
    public function search(Request $request)
    {
        $cari = $request->search;
        // dd($cari);
        $barang = DB::table('barang')->where('nama_barang', 'like', '%' . $cari . '%')->paginate(5);
        return view('admin.v_list_barang', ['barang' => $barang]);
    }
}