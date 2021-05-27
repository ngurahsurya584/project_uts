<div>
    <div class="card">
        <div class="card-body">
            <form wire:submit.prevent="update">
                <input type="hidden" wire:model="postId">
                <div class="form-group">
                    <label>Code Member</label>
                    <input type="text" wire:model="code_member"
                        class="form-control @error('code_member') is-invalid @enderror"
                        placeholder="Masukkan Kode Member">
                    @error('code_member')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>NIK</label>
                    <input type="text" wire:model="nik" class="form-control @error('nik') is-invalid @enderror"
                        placeholder="Masukkan NIK">
                    @error('nik')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Nama Member</label>
                    <input type="text" wire:model="nama_member"
                        class="form-control @error('nama_member') is-invalid @enderror"
                        placeholder="Masukkan Nama Member">
                    @error('nama_member')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Alamat Member</label>
                    <input type="text" wire:model="alamat_member"
                        class="form-control @error('alamat_member') is-invalid @enderror"
                        placeholder="Masukkan Alamat Member">
                    @error('alamat_member')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">UPDATE</button>
            </form>
        </div>
    </div>
</div>
