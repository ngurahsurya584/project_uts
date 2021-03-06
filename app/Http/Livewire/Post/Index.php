<?php

namespace App\Http\Livewire\Post;

use Illuminate\Http\Request;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Index extends Component
{
    
    use AuthorizesRequests;
    use WithPagination;

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.post.index', [
            'posts' => Post::latest()->paginate(5)
        ]);
    }

    public function destroy($postId)
    {
    $post = Post::find($postId);

    if($post) {
        $post->delete();
    }

    //flash message
    session()->flash('message', 'Data Berhasil Dihapus.');

    //redirect
    return redirect()->route('post.index');

    }
}