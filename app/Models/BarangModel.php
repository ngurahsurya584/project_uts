<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BarangModel extends Model
{
    public function allData()
    {
        return DB::table('barang')->get();
    }

    public function addData($data)
    {
        DB::table('barang')->insert($data);
    }

    public function detailData($id_barang)
    {
        return DB::table('barang')->where('id_barang', $id_barang)->first();
    }

    public function editData($id_barang, $data)
    {
        DB::table('barang')->where('id_barang', $id_barang)->update($data);
    }

    public function deleteDataFoto($id_barang)
    {
        return DB::table('barang')->where('id_barang', $id_barang)->value('foto_barang');
    }

    public function deleteData($id_barang)
    {
        DB::table('barang')->where('id_barang', $id_barang)->delete();
    }

    public function searchData()
    {
        
    }
}