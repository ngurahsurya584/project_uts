<div class="container">
    <div>
        <a href="{{ route('post.create') }}" class="btn btn-md btn-success mb-3">TAMBAH POST</a>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Code Member</th>
                    <th scope="col">NIK</th>
                    <th scope="col">Nama Member</th>
                    <th scope="col">Alamat Member</th>
                    <th scope="col">AKSI</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->code_member }}</td>
                        <td>{{ $post->nik }}</td>
                        <td>{{ $post->nama_member }}</td>
                        <td>{{ $post->alamat_member }}</td>
                        <td class="text-center">
                            <a href="{{ route('post.edit', $post->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                            <button wire:click="destroy({{ $post->id }})"
                                class="btn btn-sm btn-danger">DELETE</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $posts->links() }}
    </div>
</div>
