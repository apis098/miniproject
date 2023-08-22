<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register - HummaCook</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: row-reverse;
        }
        .eye1 {
          position: absolute;
          right: 80px;
          top: 386.5px;
        }
        .eye2 {
          position: absolute;
          right: 80px;
          top: 441px;
        }
        .humma-cook {
            color: #ffffff;
            text-align: left;
            font: 500 30px'Dancing Script', sans-serif;
            position: absolute;
            left: 30px;
            top: 20px;
                }

        .register-container {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
            position: relative;
            background-color: #ffffff;
        }
        .bg-image {
            background: #f7941e;
            flex: 1;
            height: 100vh;
            position: relative;
            border-radius: 0 15px 15px 0;
            overflow: hidden;
        }


        .circle {
          background: #ffffff;
        border-radius: 50%;
        width: 55%;
        padding-bottom: 55%;
        position: absolute;
        top: 27%;
        left: 23%;

    }
    .circle2 {
    border-radius: 50%;
    border-style: solid;
    border-color: #ffffff;
    border-width: 2px;
    width: 65%;
    padding-bottom: 65%;
    position: absolute;
    top: 22%;
    left: 18%;
    }
    .image-42 {
        width:  100%;
        height: 88%;
        position: absolute;
        top: 6%;
        left: 13%;
    }
      .icon-clutery {
        position: absolute;
        top: 22.8%;
        left: 65%;
        overflow: visible;
    }
    .icon-cooking-pot {
  width: 90%;
  height: 60%;
  position: static;
}
.group {
  width: 90%;
  height: 60%;
  position: static;
}
.vector5 {
  position: absolute;
  left: 50px;
  top: 20px;
  overflow: visible;
}
.group2 {
  width: 30%;
  height: 30%;
  position: static;
}
.vector6 {
  position: absolute;
  left: 19%;
  top: 18%;
  overflow: visible;
}
.vector7 {
  position: absolute;
  left: 19%;
  top: 18%;
  overflow: visible;
}
.group3 {
  position: absolute;
  left: 18.1%;
  top: 8.8%;
  overflow: visible;
}
.vector10 {
  position: absolute;
  left: 18%;
  top: 76%;
  overflow: visible;
}
.icon-location-food {
  position: absolute;
  left: 65%;
  top: 79.9%;
  overflow: visible;
}
        .content-container {
            padding: 20px;
            width: 45%
        }
        .username{
            width: 100%;
            height: 100%;
            border-radius: 15px;
            border: 0.50px black solid
        }
           .button-buat{
             width: 100%;
             height: 100%;
             background: #F7941E;
             box-shadow: 0px 0.5px 0.5px rgba(0, 0, 0, 0.25);
            border-radius: 15px
           }


        .alert {
            margin-top: 10px;
        }
        .input-file{
            width: 100%;
            height: 100%;
             box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
             border-radius: 15px;
             border: 0.50px black solid
        }

    </style>
</head>

<body>
    <div class="register-container">
        <div class="bg-image">
            <div class="humma-cook">HummaCook</div>
            <div class="circle"></div>
            <div class="circle2"></div>
            <img src="{{ asset('images/image 42.png') }}" class="image-42" alt="" srcset="">
            <svg
            class="icon-clutery"
            width="11"
            height="12"
            viewBox="0 0 12 16"
            fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <path
              d="M7.03955 55.1165H17.7073M17.7073 55.1165H28.375M17.7073 55.1165V37.337"
              stroke="white"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
            <path
              d="M46.1543 55.1165V26.6693C46.1543 26.6693 55.0441 23.1134 55.0441 16.0016C55.0441 9.75256 55.0441 0 55.0441 0"
              stroke="white"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
            <path
              d="M46.1543 14.2236V0"
              stroke="white"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
            <path
              d="M1.70607 23.1134C5.26169 30.6807 17.7076 37.337 17.7076 37.337C17.7076 37.337 30.1537 30.6807 33.7092 23.1134C37.5478 14.9439 33.7092 0 33.7092 0H1.70607C1.70607 0 -2.13259 14.9439 1.70607 23.1134Z"
              stroke="white"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
            />

            <div class="icon-cooking-pot">
                <div class="group">
                  <svg
                    class="vector5"
                    width="80"
                    height="80"
                    viewBox="0 0 161 161"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      fill-rule="evenodd"
                      clip-rule="evenodd"
                      d="M0 0H161V161H0V0Z"
                      fill="white"
                      fill-opacity="0.01"
                    />
                  </svg>

                  <div class="group2">
                    <svg
                      class="vector6"
                      width="88"
                      height="85"
                      viewBox="0 0 85 103"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M0.875 102.167H84.2917V33.489C84.2917 15.4768 65.6182 0.874985 42.5833 0.874985C19.5485 0.874985 0.875 15.4768 0.875 33.489V102.167Z"
                        stroke="white"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                      />
                    </svg>

                    <svg
                      class="vector7"
                      width="88"
                      height="85"
                      viewBox="0 0 85 103"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        d="M84.2917 36.7551C84.2917 36.0293 84.2917 34.9406 84.2917 33.489C84.2917 15.4768 65.6182 0.874985 42.5833 0.874985C19.5485 0.874985 0.875 15.4768 0.875 33.489V36.7453L84.2917 36.7551Z"
                        fill="#F7941E"
                        stroke="white"
                        stroke-width="2"
                        stroke-linejoin="round"
                      />
                    </svg>

                    <svg
                      class="group3"
                      width="100"
                      height="130"
                      viewBox="0 0 120 54"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        d="M0 53.625H119.167"
                        stroke="white"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                      />
                      <path
                        d="M50.646 -1.52588e-05H68.521"
                        stroke="white"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                      />
                    </svg>
                  </div>
                </div>
            </div>
            <svg
            class="vector10"
            width="80"
            height="80"
            viewBox="0 0 107 130"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M59.8738 71.2845L64.1227 67.02L81.7783 84.6614C81.779 84.6621 81.7797 84.6628 81.7804 84.6634C82.5232 85.4117 83.5029 85.7826 84.4737 85.7826C85.4522 85.7826 86.4352 85.4073 87.1803 84.6557C88.6666 83.1564 88.6584 80.737 87.1691 79.2461L87.1684 79.2454L63.5524 55.6504L62.844 54.9426L62.1372 55.652L53.259 64.5627L52.562 65.2623L53.2528 65.968L58.4507 71.2782L59.1591 72.0018L59.8738 71.2845ZM29.6738 21.9249L28.9785 21.2227L28.2681 21.9096C23.1038 26.9028 23.0233 35.1748 28.0937 40.2675C28.0948 40.2687 28.096 40.2699 28.0971 40.271L41.4517 53.9202L42.16 54.6442L42.8748 53.9267L51.4461 45.3241L52.1472 44.6204L51.4483 43.9146L29.6738 21.9249ZM26.1749 83.9438C26.1598 83.9328 26.1447 83.9226 26.1298 83.9129L64.2828 48.3495C64.3961 48.3953 64.524 48.4408 64.6631 48.477L64.6661 48.4778C69.1186 49.6233 74.7435 49.3 79.1355 44.9408C82.1273 41.9734 84.2895 38.0287 85.156 34.2181C86.0158 30.4364 85.6375 26.5612 83.196 23.9964L83.1861 23.9861L83.176 23.976C80.707 21.526 76.7817 21.1651 72.9545 22.0461C69.089 22.9359 65.0501 25.1405 62.0549 28.2368C57.8595 32.4051 57.6862 38.2491 58.8572 42.6941L58.8585 42.6988C58.8807 42.7813 58.9066 42.8592 58.9335 42.9312L22.7443 79.2527C21.2545 80.7479 21.2545 83.1652 22.7443 84.6604C23.4878 85.4065 24.4665 85.7826 25.4435 85.7826C25.4985 85.7826 25.567 85.7815 25.6353 85.7755C25.6686 85.7725 25.7235 85.7666 25.7871 85.7529L25.7886 85.7525C25.8287 85.7439 25.9876 85.7097 26.1531 85.5977C26.2455 85.5352 26.3973 85.4099 26.4994 85.1943C26.6135 84.9535 26.6198 84.6963 26.5542 84.4765C26.4965 84.2831 26.395 84.1538 26.3359 84.0883C26.2728 84.0183 26.2122 83.9709 26.1749 83.9438ZM106 1V103.565H16.8947C10.1765 103.565 4.63158 108.116 4.63158 114.222C4.63158 120.36 10.3406 125.348 16.8947 125.348H106V129H16.8947C8.06407 129 1 122.308 1 114.222V16.9565C1 8.15384 8.13301 1 16.8947 1H106Z"
              stroke="white"
              stroke-width="2"
            />
          </svg>

          <svg
            class="icon-location-food"
            width="47"
            height="60"
            viewBox="0 0 78 97"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M58.9043 62.7296V61.7296H57.9043H49.2535V14.4761C49.2535 10.902 50.6733 7.4743 53.2006 4.94705C55.7278 2.4198 59.1555 1 62.7296 1H76.2057V53.0789V86.8564C76.2057 89.1507 75.2943 91.351 73.6719 92.9733C72.0496 94.5957 69.8493 95.5071 67.555 95.5071C65.2607 95.5071 63.0603 94.5957 61.438 92.9733C59.8157 91.351 58.9043 89.1507 58.9043 86.8564V62.7296ZM10.6507 48.2535V47.2535H9.65071C7.3564 47.2535 5.15606 46.3421 3.53373 44.7198C1.91141 43.0975 1 40.8971 1 38.6028V4.82535C1 3.81081 1.40303 2.83781 2.12042 2.12042C2.83781 1.40303 3.81081 1 4.82535 1C5.8399 1 6.8129 1.40303 7.53029 2.12042C8.24768 2.83781 8.65071 3.81081 8.65071 4.82535V24.1268V25.1268H9.65071H14.4761H15.4761V24.1268V4.82535C15.4761 3.81081 15.8791 2.83781 16.5965 2.12042C17.3139 1.40303 18.2869 1 19.3014 1C20.316 1 21.289 1.40303 22.0063 2.12042L22.7055 1.42126L22.0063 2.12042C22.7237 2.83781 23.1268 3.81081 23.1268 4.82535V24.1268V25.1268H24.1268H28.9521H29.9521V24.1268V4.82535C29.9521 3.81081 30.3552 2.83781 31.0725 2.12042C31.7899 1.40303 32.7629 1 33.7775 1C34.792 1 35.765 1.40303 36.4824 2.12042C37.1998 2.83781 37.6028 3.81081 37.6028 4.82535V38.6028C37.6028 40.8971 36.6914 43.0975 35.0691 44.7198C33.4468 46.3421 31.2464 47.2535 28.9521 47.2535H27.9521V48.2535V86.8564C27.9521 89.1507 27.0407 91.351 25.4184 92.9733C23.7961 94.5957 21.5957 95.5071 19.3014 95.5071C17.0071 95.5071 14.8068 94.5957 13.1844 92.9733C11.5621 91.351 10.6507 89.1507 10.6507 86.8564V48.2535Z"
              stroke="white"
              stroke-width="2"
            />
          </svg>
        </div>
        <div class="content-container mx-5">
            <div style="color: black; font-size: 30px; font-family: Poppins; font-weight: 600; letter-spacing: 0.80px; word-wrap: break-word">Buat akun</div>
            <div style="width: 100%; color: black; font-size: 17px; font-family: Poppins; font-weight: 500; letter-spacing: 0.34px; word-wrap: break-word">Selamat datang di Hummacook </div>
            <div class="">
                @if (session()->has('error'))
                <script>
                    alert("{{ session('error') }}");
                </script>
                @endif
                @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
                @endif
                            <form action="{{ route('actionregister') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="">
                                    <div class="row">
                                        <div class="card my-3 col-3">
                                            <div class="card-body text-center">
                                                <svg
                                                width="50" height="100" viewBox="0 0 102 137" fill="none" id="svg-placeholder"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M56.6484 122.704H16.9945C15.4921 122.704 14.0512 121.986 12.9889 120.708C11.9265 119.429 11.3297 117.695 11.3297 115.887V20.4507C11.3297 18.6428 11.9265 16.9089 12.9889 15.6304C14.0512 14.352 15.4921 13.6338 16.9945 13.6338H45.3187V34.0845C45.3187 39.5084 47.1092 44.7101 50.2963 48.5454C53.4834 52.3806 57.806 54.5353 62.3133 54.5353H79.3078V68.1691C79.3078 69.977 79.9046 71.7109 80.967 72.9893C82.0293 74.2678 83.4702 74.986 84.9726 74.986C86.475 74.986 87.9159 74.2678 88.9783 72.9893C90.0406 71.7109 90.6375 69.977 90.6375 68.1691V47.7183C90.6375 47.7183 90.6375 47.7183 90.6375 47.3093C90.5785 46.6831 90.4645 46.0661 90.2976 45.4688V44.8552C90.0252 44.1543 89.6619 43.51 89.2213 42.9465L55.2322 2.04507C54.7639 1.51483 54.2285 1.07762 53.6461 0.749859C53.477 0.720957 53.3053 0.720957 53.1362 0.749859C52.5608 0.352715 51.9252 0.0977831 51.2668 0H16.9945C12.4873 0 8.16467 2.15462 4.97758 5.98988C1.79049 9.82513 0 15.0269 0 20.4507V115.887C0 121.311 1.79049 126.513 4.97758 130.348C8.16467 134.184 12.4873 136.338 16.9945 136.338H56.6484C58.1508 136.338 59.5917 135.62 60.6541 134.342C61.7164 133.063 62.3133 131.329 62.3133 129.521C62.3133 127.713 61.7164 125.979 60.6541 124.701C59.5917 123.423 58.1508 122.704 56.6484 122.704ZM56.6484 23.2457L71.3204 40.9014H62.3133C60.8108 40.9014 59.37 40.1832 58.3076 38.9048C57.2452 37.6264 56.6484 35.8925 56.6484 34.0845V23.2457ZM28.3242 40.9014C26.8218 40.9014 25.3809 41.6196 24.3186 42.8981C23.2562 44.1765 22.6594 45.9104 22.6594 47.7183C22.6594 49.5263 23.2562 51.2602 24.3186 52.5386C25.3809 53.817 26.8218 54.5353 28.3242 54.5353H33.9891C35.4915 54.5353 36.9323 53.817 37.9947 52.5386C39.0571 51.2602 39.6539 49.5263 39.6539 47.7183C39.6539 45.9104 39.0571 44.1765 37.9947 42.8981C36.9323 41.6196 35.4915 40.9014 33.9891 40.9014H28.3242ZM62.3133 68.1691H28.3242C26.8218 68.1691 25.3809 68.8873 24.3186 70.1657C23.2562 71.4441 22.6594 73.178 22.6594 74.986C22.6594 76.7939 23.2562 78.5278 24.3186 79.8063C25.3809 81.0847 26.8218 81.8029 28.3242 81.8029H62.3133C63.8157 81.8029 65.2565 81.0847 66.3189 79.8063C67.3813 78.5278 67.9781 76.7939 67.9781 74.986C67.9781 73.178 67.3813 71.4441 66.3189 70.1657C65.2565 68.8873 63.8157 68.1691 62.3133 68.1691ZM100.324 104.231L88.9947 90.5967C88.4559 89.9761 87.8206 89.4896 87.1253 89.1651C85.7461 88.4833 84.1992 88.4833 82.82 89.1651C82.1246 89.4896 81.4893 89.9761 80.9506 90.5967L69.6209 104.231C68.5542 105.514 67.9549 107.255 67.9549 109.071C67.9549 110.886 68.5542 112.627 69.6209 113.911C70.6876 115.194 72.1344 115.915 73.6429 115.915C75.1515 115.915 76.5983 115.194 77.665 113.911L79.3078 111.865V129.521C79.3078 131.329 79.9046 133.063 80.967 134.342C82.0293 135.62 83.4702 136.338 84.9726 136.338C86.475 136.338 87.9159 135.62 88.9783 134.342C90.0406 133.063 90.6375 131.329 90.6375 129.521V111.865L92.2803 113.911C92.8069 114.549 93.4334 115.057 94.1237 115.403C94.8141 115.749 95.5545 115.927 96.3023 115.927C97.0501 115.927 97.7906 115.749 98.4809 115.403C99.1712 115.057 99.7977 114.549 100.324 113.911C100.855 113.277 101.277 112.523 101.564 111.692C101.852 110.861 102 109.97 102 109.071C102 108.171 101.852 107.28 101.564 106.449C101.277 105.618 100.855 104.864 100.324 104.231ZM50.9836 109.071C52.486 109.071 53.9269 108.352 54.9892 107.074C56.0516 105.795 56.6484 104.062 56.6484 102.254C56.6484 100.446 56.0516 98.7117 54.9892 97.4333C53.9269 96.1549 52.486 95.4367 50.9836 95.4367H28.3242C26.8218 95.4367 25.3809 96.1549 24.3186 97.4333C23.2562 98.7117 22.6594 100.446 22.6594 102.254C22.6594 104.062 23.2562 105.795 24.3186 107.074C25.3809 108.352 26.8218 109.071 28.3242 109.071H50.9836Z"
                                                    fill="black" />
                                            </svg>
                                                <img src="" style="display: none;" width="100" height="100" alt="" class="" id="profile-image">

                                            </div>
                                        </div>
                                        <div class="col-lg-7 my-auto mx-1">
                                                    {{-- <input name="profile_picture" id="profile_picture" class="input-file my-auto mx-1"
                                                         type="file" class="formFile"> --}}
                                                         <div class="row ms-3"
                                                         style="box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 15px; border: 0.50px rgb(142, 136, 136) solid">
                                                         <button type="button" id="inputanfile" onclick="inputfilee()" class="col-4"
                                                             style="background: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 15px; border: 0px;">
                                                             <div
                                                                 style="color: #EAEAEA; font-size: 14px; font-family: Poppins; font-weight: 600; word-wrap: break-word">
                                                                 Pilih File</div>
                                                             <input name="profile_picture" class="form-control my-auto mx-1"
                                                                 style="display: none;" type="file" id="inputan">
                                                         </button>
                                                         <div class="col-8" id="fileinfo"
                                                             style="color: black; font-size: 14px; font-family: Poppins; font-weight: 600; word-wrap: break-word">
                                                             Tidak ada file terpilih</div>
                                                     </div>               
                                        </div>
                                    </div>
                                </div>
                                @error('profile_picture')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <!-- Username input -->
                                <div class="form-outline mb-3">
                                    <input type="text" id="name" name="name" class=" username form-control rounded-4"
                                        placeholder="Nama Pengguna..." required="" />
                                </div>

                                <!-- Email input -->
                                <div class="form-outline mb-3 ">
                                    <input type="email" id="email" @error('email') is-invalid @enderror
                                        name="email" class=" username form-control rounded-4" placeholder="Email..."
                                        required="" />
                                    @error('email')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <!-- Password input -->
                                <div class="form-outline mb-3">
                                    <input type="password" name="password" id="pass2" class=" username form-control rounded-4"
                                        placeholder="Kata Kunci..." required="">
                                        <div class="input-group-append eye1">

                                          <!-- kita pasang onclick untuk merubah icon buka/tutup mata setiap diklik  -->
                                          <span id="mybutton2" onclick="change('pass2','mybutton2')">

                                              <!-- icon mata bawaan bootstrap  -->
                                              <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor"
                                                  xmlns="http://www.w3.org/2000/svg">
                                                  <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                  <path fill-rule="evenodd"
                                                      d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                              </svg>
                                          </span>
                                      </div>

                                </div>
                                <div class="form-outline mb-3">
                                    <input type="password" name="copassword" id="pass" class=" username form-control rounded-4"
                                        placeholder="Konfirmasi Kata Sandi..." required="">
                                        <div class="input-group-append eye2">

                                          <!-- kita pasang onclick untuk merubah icon buka/tutup mata setiap diklik  -->
                                          <span id="mybutton" onclick="change('pass','mybutton')">

                                              <!-- icon mata bawaan bootstrap  -->
                                              <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor"
                                                  xmlns="http://www.w3.org/2000/svg">
                                                  <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                  <path fill-rule="evenodd"
                                                      d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                              </svg>
                                          </span>
                                      </div>
                                </div>
                                <br>
                                <!-- Submit button -->
                                <p>Sudah punya akun? <a href="{{ route('login') }}">Login</a>
                                    sekarang!</p>
                                    <!-- Login buttons -->
                                <button type="submit" class="button-buat rounded-4"> <b style="color:white">Buat</b></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
     <!-- Include jQuery -->
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

     <!-- Include Bootstrap JS (make sure the path is correct) -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
     <script>
        function inputfilee() {
            // Simulasikan klik pada input file saat tombol "Pilih File" diklik
            document.getElementById('inputan').click();
        }
        
        document.getElementById('inputan').addEventListener('change', function (event) {
            const fileInput = event.target;
            const file = fileInput.files[0];
        
            const fileinfo = document.getElementById('fileinfo');
            const profileImage = document.getElementById('profile-image');
            const svgPlaceholder = document.getElementById('svg-placeholder');
        
            if (file) {
                fileinfo.textContent = file.name;
                // Menggunakan objek FileReader untuk membaca file gambar dan menampilkan pratinjau
                const reader = new FileReader();
                reader.onload = function (e) {
                    profileImage.src = e.target.result;
                    svgPlaceholder.style.display = 'none'; // Hide the SVG placeholder
                    profileImage.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else {
                fileinfo.textContent = 'Tidak ada file terpilih';
                profileImage.src = ''; // Clear the profile image source
                svgPlaceholder.style.display = 'block'; // Show the SVG placeholder
                profileImage.style.display = 'none'; // Hide the profile image
            }
        });
        

          // membuat fungsi change
          function change(inputId, buttonId) {

            var input = document.getElementById(inputId);
            var x = input.type;
            var button = document.getElementById(buttonId);


              if (input.type === 'password') {
                input.type = 'text';
                button.innerHTML = `<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-slash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.79 12.912l-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z"/>
                                    <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708l-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829z"/>
                                    <path fill-rule="evenodd" d="M13.646 14.354l-12-12 .708-.708 12 12-.708.708z"/>
                                    </svg>`;
              }
              else {
                input.type = 'password';
                button.innerHTML = `<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                    <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                    </svg>`;
              }
          }

    </script>

</body>
</html>



{{-- <form action="{{ route('actionregister') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <!-- Username input -->
                                <div class="form-outline mb-1">
                                    <input type="text" id="name" name="name" class="form-control mb-1"
                                        placeholder="Username..." required="" />
                                    <label class="form-label" for="name"><b>Username</b></label>
                                </div>

                                <!-- Email input -->
                                <div class="form-outline mb-1">
                                    <input type="email" id="email" @error('email') is-invalid @enderror
                                        name="email" class="form-control mb-1" placeholder="Email..."
                                        required="" />
                                    @error('email')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <label class="form-label" for="email"><b>Email</b></label>
                                </div>

                                <!-- Password input -->
                                <div class="form-outline mb-1">
                                    <input type="password" name="password" class="form-control mb-1"
                                        placeholder="Password..." required="">
                                    <label class="form-label" for="password"><b>Password</b></label>
                                </div>
                                <div class="form-outline mb-1">
                                    <input type="password" name="copassword" id="copassword" class="form-control mb-1"
                                        placeholder="Confirm Password..." required="">
                                    <label class="form-label" for="copassword"><b>Confirm Password</b></label>
                                </div>
                                <div class="form-outline mb-1">
                                    <input type="file" name="profile_picture" id="profile_picture"
                                        class="form-control mb-1" placeholder="Foto profil">
                                    <label class="form-label" for="profile_picture"><b>Foto profil</b></label>
                                </div>
                                @error('profile_picture')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <!-- Submit button -->
                                <button type="submit" class="btn btn-outline-dark  mb-4 rounded-5"><b>Submit </b><i
                                        class="fa-solid fa-right-to-bracket"></i></button>
                                <!-- Register buttons -->
                                <p class="text-center">Sudah punya akun? <a href="{{ route('login') }}">Login</a>
                                    sekarang!</p>
                            </form> --}}
