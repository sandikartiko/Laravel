<form action="{{ url('datanilai') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="modal fade text-left" id="ModalCreate" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="ModalCreate">Tambah Data Alternatif</h1>
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
                     <label for="siswa_id">Nama Siswa:</label>
        <select name="siswa_id" id="siswa_id" class="form-control" required>
            @foreach($ss as $siswaItem)
                <option value="{{ $siswaItem->id }}">{{ $siswaItem->nama }}</option>
            @endforeach
        </select>
                            @error('nama')
                             <div class="text-danger">{{ $message }}</div>
                             @enderror
                        </div>
                    </div><br>
                    <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        @foreach($kriteria as $index => $item)
            <label for="kriteria{{ $index + 1 }}_id">Kriteria  {{ $index + 1 }} : {{ $item->nama }}</label><br>
            <input type="hidden" name="kriteria{{ $index + 1 }}_id" id="kriteria{{ $index + 1 }}_id" value="{{ $item->id }}">
            <input type="text" name="nilai_kriteria{{ $index + 1 }}" id="nilai_kriteria{{ $index + 1 }}" class="form-control" required><br>
        @endforeach
    </div>
</div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                    <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
                <script>
        $(document).ready(function() {
            $.ajax({
                url: '/get-new-siswa-for-alternatif',
                type: 'GET',
                success: function(response) {
                    var selectOptions = response.map(function(siswa) {
                        return '<option value="' + siswa.id + '">' + siswa.nama + '</option>';
                    });

                    $('#siswa_id').append(selectOptions);
                }
            });
        });
    </script>
            </div>
        </div>

    </div>
</form>