<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    protected $guarded = [];

    protected $fillable = [
        'code_member',
        'nik',
        'nama_member',
        'alamat_member'
    ];

}