@extends('template.nav')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-5">
                <div class="card my-5">
                    <div class="card-body text-center">
                        <img src="{{ asset('Vector.jpg') }}" width="50%" alt="" data-bs-toggle="modal" data-bs-target="#mymodal">
                        <p class="mt-4" style="width: 100%; height: 100%; color: black; font-size: 24px; font-family: Poppins; font-weight: 600; word-wrap: break-word">
                            Boerak smith
                            <span style="width: 100%; height: 100%; color: rgba(0, 0, 0, 0.50); font-size: 16px; font-family: Poppins; font-weight: 400; word-wrap: break-word">Burakcook@gmail.com</span>
                        </p>
                        <button style="border-radius: 15px;" class="btn btn-light border border-dark mb-3">
                            <span style="font-weight: 600">Buat Resep</span>
                        </button>
                    </div>
                </div>
            </div>
            {{-- awal modal --}}
            <div class="modal fade" data-bs-backdrop="static" id="mymodal" aria-hidden="true" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered profile-modal">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5">My Profile</h1>
                    </div>
                    <div class="modal-body">
                      <form action="#" method="POST" enctype="multipart/form-data">
                          @csrf
                          @method('put')
                          <div class="profile d-flex justify-content-center">
                              <img src="{{ asset('vector.jpg') }}" class="rounded-circle profile-image">
                              <label for="fileInputA" class="change-profile-button d-flex justify-content-center" id="chooseFileButtonA">
                                <i class="fa-sharp fa-solid fa-image text-primary"></i>
                              </label>
                              <input type="file" id="fileInputA" name="fileInputA" style="display:none" accept=".jpg,.png,.pdf">
                            </div>
                          </div>

                      <div class="modal-footer">
                        <button class="btn btn-danger" class="btn-close" data-bs-dismiss="modal" type="button">Batal</button>
                        <button class="btn btn-primary" type="submit" id="saveProfileButton">Simpan</button>
                      </div>
                    </form>
                    </div>
                    <script>
                      document.getElementById('chooseFileButtonA').addEventListener('click', function() {
                          document.getElementById('fileInputA').click();
                      });

                      document.getElementById('fileInputA').addEventListener('change', function() {
                          var selectedFile = this.files[0];
                          // Lakukan sesuatu dengan file yang dipilih, misalnya mengunggahnya ke server
                          console.log('Selected file:', selectedFile);
                      });

                      $(document).ready(function() {
                          $('.change-profile-button').on('click', function(e) {
                              e.preventDefault();
                          });
                      });

                      document.getElementById("fileInputA").addEventListener("change", function(event) {
                          var input = event.target;
                          if (input.files && input.files[0]) {
                              var reader = new FileReader();
                              reader.onload = function(e) {
                                  document.getElementById("profile-image").setAttribute("src", e.target.result);
                              };
                              reader.readAsDataURL(input.files[0]);
                          }
                      });
                  </script>
                  </div>
                </div>
                {{-- akhir modal --}}
            <div class="col-lg-8 mt-5">
                <div class="row mt-5">
                    <div class="col-lg-4">
                        <div class="card p-3"
                            style="width: 100%; height: 100%; border-radius: 30px; border: 0.50px black solid">
                            <div class="row my-3">
                                <div class="col-7">
                                    <span
                                        style="color: black; font-size: 28px; font-family: Poppins; font-weight: 400; word-wrap: break-word">
                                        392
                                    </span> <br>
                                    Suka
                                </div>
                                <div class="col-5 my-3">
                                    <i class="fa-solid fa-thumbs-up fa-2xl"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card p-3"
                            style="width: 100%; height: 100%; border-radius: 30px; border: 0.50px black solid">
                            <div class="row my-3">
                                <div class="col-7">
                                    <span
                                        style="color: black; font-size: 28px; font-family: Poppins; font-weight: 400; word-wrap: break-word">
                                        5
                                    </span> <br>
                                    Resep
                                </div>
                                <div class="col-5 my-3">
                                    <i class="fa-solid fa-book fa-flip-horizontal fa-2xl"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card p-3"
                            style="width: 100%; height: 100%; border-radius: 30px; border: 0.50px black solid">
                            <div class="row my-3">
                                <div class="col-7">
                                    <span
                                        style="color: black; font-size: 28px; font-family: Poppins; font-weight: 400; word-wrap: break-word">
                                        392
                                    </span> <br>
                                    Pengikut
                                </div>
                                <div class="col-5 my-3">
                                    <i class="fa-solid fa-user-plus fa-2xl"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-lg-6">
                        <h5
                            style="color: black; font-size: 24px; font-family: Poppins; font-weight: 600; word-wrap: break-word">
                            Nama pengguna</h5>
                        <input type="text" class="form-control" value="Victor sinclair" readonly>
                    </div>
                    <div class="col-lg-6">
                        <h5
                            style="color: black; font-size: 24px; font-family: Poppins; font-weight: 600; word-wrap: break-word">
                            E mail</h5>
                        <input type="text" class="form-control" value="victor98@gmail.com" readonly>
                    </div>
                </div>
                <div>
                    <p class="mt-2"
                        style="color: black; font-size: 24px; font-family: Poppins; font-weight: 600; word-wrap: break-word">
                        Deskripsi</p>
                    <div class="p-3" style="width: 100%; height: 100%; border-radius: 10px; border: 0.50px black solid">
                        Halo! Saya victor, jiwa petualang yang penuh rasa ingin tahu dan selalu dalam pencarian ilmu dan
                        penemuan diri. <br>
                        Minat: 🚀 Teknologi, ilmu pengetahuan, dan inovasi 📚 Membaca, menulis, dan puisi 🌳 Alam, mendaki,
                        berkemah, dan fotografi <br>
                        Filosofi: 🌱 Terimalah tantangan dan kegagalan untuk pertumbuhan pribadi 💪 Ketangguhan dan
                        adaptabilitas adalah kunci <br>
                        Saya sangat menyukai percakapan bermakna dan kolaborasi! Hubungi saya, dan mari kita berdampak
                        positif
                        bersama. 🤝
                    </div>
                    <button class="btn btn-light text-white my-3" style="border-radius: 14px;background-color: #F7941E;">
                        <span style="font-size: 18px; font-family: Poppins; font-weight: 600; word-wrap: break-word">Perbarui</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
