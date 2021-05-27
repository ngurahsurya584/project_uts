<?php

namespace App\Http\Livewire\Post;

use App\Models\Post;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;


class Create extends Component
{
    /**
     * define public variable
     */
    public $code_member;
    public $nik;
    public $nama_member;
    public $alamat_member;

    public function render()
     {
         return view('livewire.post.create');
     }
   

    /**
     * store function
     */
    protected $rules = [
        'code_member'   => 'required|min:10|max:10',
        'nik' => 'required|min:10|max:16',
        'nama_member' => 'required|max:50',
        'alamat_member' => 'required|max:100',
    ];
    
     
    
     public function store()
    {
        
        $this->validate();


        Post::create([
            'code_member'     => $this->code_member,
            'nik'   => $this->nik,
            'nama_member'   => $this->nama_member,
            'alamat_member'   => $this->alamat_member
        ]);

        //flash message
        session()->flash('message', 'Data Berhasil Disimpan.');

        //redirect
        return redirect()->route('post.index');
    }

    
}