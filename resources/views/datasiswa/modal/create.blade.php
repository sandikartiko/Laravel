<form action="{{ url('datasiswa') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="modal fade text-left" id="ModalCreate" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="ModalCreate">Tambah Data Siswa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>                   
                </div>
                <div class="modal-body">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('Id Siswa') }}:</strong>
                            <input type="text" name="id" id="id" value="{{ $nextId }}" class="form-control" readonly></br>
                            @error('id')
        <div class="text-danger">{{ $message }}</div>
    @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('Nama Siswa') }}:</strong>
                            <input type="text" name="nama" id="nama"  class="form-control"></br>
                            
                            @error('nama')
        <div class="text-danger">{{ $message }}</div>
    @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('Alamat Siswa') }}:</strong>
                            <input type="text" name="alamat" id="alamat"  class="form-control"></br>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('Asal Sekolah') }}:</strong>
                            <input type="text" name="asal_sekolah" id="asal_sekolah"  class="form-control"></br>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('Jenis Kelamin') }}:</strong>
                            <input type="text" name="jenis_kelamin" id="jenis_kelamin"  class="form-control"></br>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>{{ __('Nomor Hp') }}:</strong>
                            <input type="text" name="no_hp" id="no_hp"  class="form-control"></br>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                    <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>