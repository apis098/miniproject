@extends('template.nav')
@section('content')
    <form id="formUpload" action="{{ route('upload.video') }}" method="post" class="container border border-black rounded my-5" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 text-center">
            <h1>Upload Video Baru Anda</h1>
        </div>
        <div class="mb-3">
            <label for="judul_video" class="form-label">Judul Video</label>
            <input type="text" name="judul_video" class="form-control" id="judul_video">
        </div>
        <div class="mb-3">
            <label for="deskripsi_video" class="form-label">Deskripsi Video</label>
            <textarea name="deskripsi_video" id="deskripsi_video" cols="30" rows="10" class="form-control">

            </textarea>
        </div>
        <div class="mb-3">
            <label for="upload_video" class="form-label">Upload Video</label>
            <input type="file" name="upload_video" id="upload_video" class="form-control">
        </div>
        <div class="mb-3 text-center">
            <button type="submit" id="buttonUpload" class="btn btn-primary">Upload</button>
        </div>
    </form>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
    crossorigin="anonymous"></script>
    <script>
        $("document").ready(function () {
            $("#formUpload").submit(function (e) {
                e.preventDefault();
                var dataUpload = new FormData($(this)[0]);
                $.ajax({
                    url: "{{ route('upload.video') }}",
                    method: "POST",
                    processData: false,
                    contentType: false,
                    data: dataUpload,
                    success: function success(response) {
                        iziToast.show({
                            backgroundColor: '#a1dfb0',
                            title: '<i class="fa-solid fa-check"></i>',
                            titleColor: 'dark',
                            messageColor: 'dark',
                            message: response.message,
                            position: 'topCenter',
                            progressBarColor: 'dark',
                        });
                        setTimeout(() => {
                            window.location.href = "/koki/index";
                        }, 2000);
                    },
                    error: function error(xhr) {
                        iziToast.show({
                            backgroundColor: '#f2a5a8',
                            title: '<i class="fa-solid fa-exclamation"></i>',
                            titleColor: 'dark',
                            messageColor: 'dark',
                            message: xhr.responseText,
                            position: 'topCenter',
                            progressBarColor: 'dark',
                        });
                    }
                });
            });
        });
    </script>
@endsection
