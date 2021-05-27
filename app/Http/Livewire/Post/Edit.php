<?php

namespace App\Http\Livewire\Post;

use App\Models\Post;
use Illuminate\Http\Request;
use Livewire\Component;

class Edit extends Component
{
    /**
    * define public variable
    */
    public $postId;
    public $code_member;
    public $nik;
    public $nama_member;
    public $alamat_member;

    /**
     * mount or construct function
     */
    public function mount($id)
    {
        $post = Post::find($id);
        
        if($post) {
            $this->postId   = $post->id;
            $this->code_member   = $post->code_member;
            $this->nik   = $post->nik;
            $this->nama_member   = $post->nama_member;
            $this->alamat_member   = $post->alamat_member;
        }
    }

    /**
     * update function
     */
    public function update()
    {
        $this->validate([
            'code_member'   => 'required|min:10|max:10',
            'nik' => 'required|min:10|max:16',
            'nama_member' => 'required|max:50',
            'alamat_member' => 'required|max:100',
        ]);

        if($this->postId) {

            $post = Post::find($this->postId);
            
            if($post) {
                $post->update([
                    'code_member'     => $this->code_member,
                    'nik'   => $this->nik,
                    'nama_member'   => $this->nama_member,
                    'alamat_member'   => $this->alamat_member
                ]);
            }
        }

        //flash message
        session()->flash('message', 'Data Berhasil Diupdate.');

        //redirect
        return redirect()->route('post.index');
    }

    public function render()
    {
        return view('livewire.post.edit');
    }
}