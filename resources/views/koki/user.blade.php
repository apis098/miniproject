@extends('layouts.nav_koki')
@section('konten')
@push('style')
      @powerGridStyles
@endpush
<style>
.table-rounded thead th:first-child {
    border-top-left-radius: 10px;
}

.table-rounded thead th:last-child {
    border-top-right-radius: 10px;
}

.table-rounded tbody tr:last-child td:first-child {
    border-bottom-left-radius: 10px;
}

.table-rounded tbody tr:last-child td:last-child {
    border-bottom-right-radius: 10px;
}

.btn-group-vertical {
    display: flex;
    flex-direction: column;
}

.zoom-effects:hover {
    transform: scale(0.97);
}

.intro-1 {
    font-size: 20px
}

.close {
    color: #fff
}

.close:hover {
    color: #fff
}

.intro-2 {
    font-size: 13px
}

.ah {
    background-color: #fff;
}

.table-custom {
    text-align: center;
}

.table-custom {
    text-align: center;
    border-collapse: separate;
    border-spacing: 0px 15px;
}

.table-custom td {
    padding-top: 30px;
    padding-bottom: 30px;
    width: 175px;
    border-top: 1px solid black;
    border-bottom: 1px solid black;
    border-left: none;
    border-right: none;
    top: 10px;
    overflow: hidden;
    font-weight: bolder;
}

.table-custom th {
    padding: 10px;
    width: 256px;
    background-color: #F7941E;
    margin-bottom: 50px;
    color: #fff;
}

.table-custom thead {
    margin-bottom: 50px;
}

.table-custom td:first-child {
    border-top-left-radius: 15px;
    border-bottom-left-radius: 15px;
}

.table-custom td:last-child {
    border-top-right-radius: 15px;
    border-bottom-right-radius: 15px;
}

.table-custom th:first-child {
    border-top-left-radius: 15px;
    border-bottom-left-radius: 15px;
}

.table-custom th:last-child {
    border-top-right-radius: 15px;
    border-bottom-right-radius: 15px;
}

tr {
    padding: 30px;
}

.yuhu {
    background: none;
    color: inherit;
    border: none;
    padding: 0;
    font: inherit;
    cursor: pointer;
    outline: inherit;
}

.btn-edit {
    background: #F7941E;
    box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
    border-radius: 10px;
    color: white;
    font-size: 18px;
    font-family: 'poppins';
    font-weight: 500;
    word-wrap: break-word;
    border: none;
    letter-spacing: 0.20px;
}

.btn-hapus {
    width: 100%;
    height: 100%;
    background-color: white;
    font-size: 17px;
    font-family: 'Poppins';
    font-weight: 500;
    letter-spacing: 0.20px;
    word-wrap: break-word;
    color: black;
    border-radius: 10px;
    margin-left: 10px;
    border: 0.50px black solid
}

.garis {
    border-bottom: #F7941E 2px solid;
}

.fa-circle {}



.search {
    background-color: #fff;
    padding: 0px 15px;
    border-radius: 5px;
    max-width: 970px;
    border-radius: 15px;
    border: 0.50px black solid;
}

.search-1 {
    position: relative;
    width: 100%
}

.search-1 input {
    height: 45px;
    border: none;
    width: 100%;
    padding-left: 25px;
    padding-right: 10px;
    border-right: 2px solid #eee
}

.search-1 input:focus {
    border-color: none;
    box-shadow: none;
    outline: none
}

.search-1 i {
    position: absolute;
    top: 12px;
    left: 5px;
    font-size: 24px;
    color: #eee
}

::placeholder {
    color: #eee;
    opacity: 1
}

.search-2 {
    position: relative;
    width: 100%;
}

.search-2 input {
    height: 35px;
    border: none;
    border-radius: 15px;
    width: 100%;



}

.search-2 input:focus {
    border-color: none;
    box-shadow: none;
    outline: none
}

/* button{
                    background-color: #F7941E;
                    border: none;
                    height: 45px;
                    width: 90px;
                    color: #ffffff;
                    position: absolute;
                    right: 1px;
                    top: 0px;
                    border-radius: 15px
                } */
.search-2 i {
    position: absolute;
    top: 12px;
    left: -10px;
    font-size: 24px;
    color: #eee
}

.cari {
    position: absolute;
    top: -2px;
    border: none;
    height: 38px;
    background-color: #F7941E;
    color: #fff;
    margin-left: -6%;
    width: 90px;
    box-shadow: 0px 4px 4px rgba(74, 50, 50, 0.25);
    border-radius: 15px;
}

.cari2 {
    position: absolute;
    top: -2px;
    border: none;
    height: 38px;
    background-color: #F7941E;
    color: #fff;
    width: 90px;
    box-shadow: 0px 4px 4px rgba(74, 50, 50, 0.25);
    border-radius: 15px;
    margin-left: -66px;
}


@media (max-width:800px) {
    .search-1 input {
        border-right: none;
        border-bottom: 1px solid #eee
    }

    .search-2 i {
        left: 4px
    }

    .search-2 input {
        padding-left: 34px
    }

    .search-2 button {
        height: 37px;
        top: 5px
    }
}
</style>

    <div class="my-4 mx-5">
   <p class="text-center" style="color: black; font-size: 34px; font-family: Poppins;">User Terdaftar</p>

   <div class="d-flex justify-content-center">
       <div class="col-12" style="overflow-x: hidden">

   <form action="">
    <div class="container mt-1" style="margin-top: -35px;">
        <div class="search">
            <div class="row">
                <div class="col-12">
                    <div>
                        <div class="search-2"> <i class='bx bxs-map'></i>
                            <form action="" method="GET">
                                <input type="text" id="search-user" name="resep" autofocus
                                    placeholder="Cari Laporan Resep">
                                <button type="submit"
                                    class="zoom-effects cari2">Cari</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<script>
    $(document).ready(function() {
        $("#search-user").on("input", function(){
            let value = $(this).val().toLowerCase();
            $("#search-results").filter(function(){
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        });
    });
</script>
<table id="table-resep" class="table-custom">
    <thead>
        <tr>
            <th scope="col">Gambar</th>
            <th scope="col">User</th>
            <th scope="col">Waktu</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody id="search-results">
        @foreach ($students as $student)
            <div>
                <tr class="mt-5">
                    <td style="border-left:1px solid black;" class="mt">
                        <a href="">
                            @if ($student->foto === null)
                            <img src="{{ asset('images/default.jpg') }}"
                            class="border rounded-circle me-2" alt="images/default.jpg" style="height: 60px" />
                            @else
                            <img src="{{ asset('storage/'.$student->foto) }}"
                            class="border rounded-circle me-2" alt="{{ $student->foto }}" style="height: 60px" />
                            @endif
                        </a>
                    </td>
                    <td>{{ $student->name }}</td>
                    @foreach ($student->user_transaksi_kursus as $item)
                    <td>{{ $item->created_at }}</td>
                    @endforeach
                    <td style="border-right:1px solid black;">
                        <button type="button" data-toggle="modal"
                            data-target="#"
                            class="btn btn-light rounded-3 text-light"
                            style="background-color: #F7941E;"><b
                                class="ms-2 me-2">Detail</b></button>
                    </td>
                </tr>
            </div>
        @endforeach
    </tbody>
</table>

    </div>
   </div>
    </div>
@endsection
