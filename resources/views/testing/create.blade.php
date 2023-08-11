@extends('layouts.navbar')

@section('konten')
<div class="mt-3 ml-3">
  <h2 class="text-dark"><b>{{ $title }}</b></h2>
  <hr />
</div>

<div class="row">
    <div class="col-md-6">
        <form method="POST" action="{{ route('Testing.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
                <label for="name" class="mb-2">Text1</label>
                <input type="text" class="form-control" name="text1[]" aria-describedby="emailHelp" placeholder="Masukkan nama hari...">
            </div>
            <div class="form-group mb-3">
                <label for="description" class="mb-2">Text2</label>
                <input type="text" class="form-control" name="text2[]" placeholder="Masukkan Deskripsi...">
            </div>
            <div class="form-group mb-3">
              <label for="description" class="mb-2">Text3</label>
              <input type="text" class="form-control" name="text3[]" placeholder="Masukkan Deskripsi...">
          </div>
            <div class="form-group mb-3" id="special-dates-container">
                <label class="mb-2">File</label>
                <input type="file" class="form-control" name="photos[]">
                <button type="button" id="remove-input" class="btn btn-danger mt-2">Hapus</button>
            </div>

            <button type="button" id="add-input" class="btn btn-primary">Tambah Input</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>

    </div>
    <div class="col-md-5">
      <table class="table table-striped mt-4">
        <thead>
          <tr>
            <th scope="col">no</th>
            <th scope="col">Judul</th>
            <th scope="col">Deskripsi</th>
            <th scope="col">Foto</th>
          </tr>
        </thead>
        @foreach($data as $row)
        <tbody>
          <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$row->judul}}</td>
            <td>{{$row->deskripsi}}</td>
            <td>testing</td>
          </tr>
        </tbody>
        @endforeach
      </table>
  </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const addInputButton = document.getElementById('add-input');
        const specialDatesContainer = document.getElementById('special-dates-container');

        addInputButton.addEventListener('click', function () {
            const newInput = document.createElement('div');
            newInput.classList.add('form-group', 'mb-3');
            newInput.innerHTML = `
                <label class="mb-2 mt-3">Text1</label>
                <input type="text" class="form-control" name="text1[]" placeholder="Masukkan nama hari...">
                <label class="mb-2">Text2</label>
                <input type="text" class="form-control" name="text2[]" placeholder="Masukkan Deskripsi...">
                <label class="mb-2">Text3</label>
                <input type="text" class="form-control" name="text3[]" placeholder="Masukkan Deskripsi...">
                <label class="mb-2">file</label>
                <input type="file" class="form-control mb-3" name="photos[]">
                <button type="button" class="btn btn-danger remove-input">Hapus</button>
            `;
            specialDatesContainer.appendChild(newInput);
        });

        specialDatesContainer.addEventListener('click', function (event) {
            if (event.target.classList.contains('remove-input')) {
                event.target.parentNode.remove();
            }
        });
    });
</script>
@endsection
