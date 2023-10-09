@extends('layouts.nav_koki')
@section('konten')

    <div class=" d-flex justify-content-start">
        <div class="my-5 ml-5">
            <ul class="nav mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a id="click1" class="nav-link mr-5 active" id="pills-home-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                        aria-selected="true">
                        <h5 class="text-dark ms-2" style="font-weight: 600; word-wrap: break-word;">Favorit resep</h5>
                        <div id="border1" class="ms-1" style="width: 100%; height: 100%; border: 1px #F7941E solid;">
                        </div>
                    </a>
                </li>

                <li class="nav-item" role="presentation">
                    <a id="c" class="nav-link mr-5" id="pills-profile-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                        aria-selected="false">
                        <h5 class="text-dark" style="font-weight: 600; word-wrap: break-word;">Favorit Feed</h5>
                        <div id="b" class="ms-" style="width: 100%; height: 100%; border: 1px #F7941E solid;"
                            hidden>
                        </div>
                    </a>
                </li>

                <li class="nav-item" role="presentation">
                    <a id="a-tab" class="nav-link mr-5" id="pills-footer-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                        aria-selected="false">
                        <h5 class="text-dark" style="font-weight: 600; word-wrap: break-word;">Favorit kursus</h5>
                        <div id="pp" style="width: 100%; height: 100%; display:none; border: 1px #F7941E solid;">
                        </div>
                    </a>
                </li>
            </ul>
            <div class="tab-content mb-5 mx-3" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
                    tabindex="0">
                    {{-- start tab 1 --}}
                    <div class="mx-1 my-4">
                        <div class="row">
                            {{-- @foreach ($recipes as $num => $item) --}}
                            <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                                <div class="card-body" style="border-radius: 15px; border: 0.50px black solid">
                                    <div class=" my-3 mx-auto" style="background-color: white">

                                        <img class="rounded-circle mx-4 mb-2"
                                            style="border: 0.50px black solid; max-width: 100%; height: 150px;width: 150px"
                                            src="{{ asset('images/dark-food.jpg') }}" />

                                        <div class="row">
                                            <div class="col-6">
                                                <h5>
                                                    <a style="color: black; font-size: 24px; margin-left:-1px"
                                                        href="#">
                                                        robak
                                                    </a>
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6 mb-3">
                                                <svg width="20" height="20" viewBox="0 0 28 28" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g id="&#240;&#159;&#166;&#134; icon &#34;thumbs up&#34;">
                                                        <path id="Vector"
                                                            d="M1.77327 12.9898V25.1137C1.77327 25.592 2.17023 25.9797 2.65991 25.9797H6.20645C6.69613 25.9797 7.09309 25.592 7.09309 25.1137V12.9898C7.09309 12.5116 6.69613 12.1239 6.20645 12.1239H2.65991C2.17023 12.1239 1.77327 12.5116 1.77327 12.9898ZM7.97973 11.0534L9.54368 7.99834C10.2644 6.59046 10.6396 5.03802 10.6396 3.46396V3.03096C10.6396 1.35701 12.029 0 13.7429 0C15.4567 0 16.8917 1.26842 17.0622 2.93405L17.6485 8.6599H23.5668C26.0152 8.6599 28 10.5985 28 12.9898C28 13.1337 27.9927 13.2775 27.978 13.4207L26.914 23.8126C26.6874 26.0261 24.7804 27.7117 22.5029 27.7117H11.5263C10.3336 27.7117 9.251 27.2517 8.45418 26.5035C7.98253 27.2297 7.15212 27.7117 6.20645 27.7117H2.65991C1.19088 27.7117 0 26.5485 0 25.1137V12.9898C0 11.555 1.19088 10.3919 2.65991 10.3919H6.20645C6.88771 10.3919 7.50914 10.642 7.97973 11.0534ZM8.86636 13.1943V23.3817C8.86636 24.8165 10.0572 25.9797 11.5263 25.9797H22.5029C23.8694 25.9797 25.0136 24.9683 25.1496 23.6402L26.2135 13.2484C26.2223 13.1625 26.2267 13.0762 26.2267 12.9898C26.2267 11.555 25.0358 10.3919 23.5668 10.3919H16.8461C16.3906 10.3919 16.0092 10.0548 15.9638 9.61206L15.2978 3.10639C15.2179 2.32615 14.5457 1.73198 13.7429 1.73198C13.0083 1.73198 12.4129 2.31356 12.4129 3.03096V3.46396C12.4129 5.3069 11.9736 7.12453 11.1297 8.77291L8.86636 13.1943Z"
                                                            fill="black" />
                                                    </g>
                                                </svg>
                                                50 suka
                                            </div>
                                            <div class="col-6 mb-2">
                                                <svg width="20" height="21" viewBox="0 0 30 31" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g
                                                        id="&#240;&#159;&#166;&#134; icon &#34;comment square chat message&#34;">
                                                        <g id="Group">
                                                            <path id="Vector" d="M7.22266 7.22168H22.7782" stroke="black"
                                                                stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path id="Vector_2" d="M7.22266 13.4443H13.4449"
                                                                stroke="black" stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path id="Vector_3"
                                                                d="M1 4.11111V28.6778C1 29.3707 1.83778 29.7177 2.32774 29.2277L8.32217 23.2334C8.61388 22.9417 9.00956 22.7778 9.42211 22.7778H25.8889C27.6072 22.7778 29 21.3849 29 19.6667V4.11111C29 2.39289 27.6072 1 25.8889 1H4.11111C2.39289 1 1 2.39289 1 4.11111Z"
                                                                stroke="black" stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </g>
                                                    </g>
                                                </svg>
                                                2 Komen
                                            </div>
                                            <div class="col-6 mb-2">
                                                <svg width="14" height="23" viewBox="0 0 24 33" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g id="&#240;&#159;&#166;&#134; icon &#34;bookmark save&#34;">
                                                        <path id="Vector"
                                                            d="M1 32V2.55C1 1.69397 1.69397 1 2.55 1H21.15C22.0061 1 22.7 1.69397 22.7 2.55V32L11.85 22.5278L1 32Z"
                                                            stroke="black" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </g>
                                                </svg>
                                                6 Favorit
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12 mb-2">
                                <div class="card-body" style="border-radius: 15px; border: 0.50px black solid">
                                    <div class=" my-3 mx-auto" style="background-color: white">

                                        <img class="rounded-circle mx-4 mb-2"
                                            style="border: 0.50px black solid; max-width: 100%; height: 150px;width: 150px"
                                            src="{{ asset('images/dark-food.jpg') }}" />

                                        <div class="row">
                                            <div class="col-6">
                                                <h5>
                                                    <a style="color: black; font-size: 24px; margin-left:-1px"
                                                        href="#">
                                                        robak
                                                    </a>
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6 mb-3">
                                                <svg width="20" height="20" viewBox="0 0 28 28" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g id="&#240;&#159;&#166;&#134; icon &#34;thumbs up&#34;">
                                                        <path id="Vector"
                                                            d="M1.77327 12.9898V25.1137C1.77327 25.592 2.17023 25.9797 2.65991 25.9797H6.20645C6.69613 25.9797 7.09309 25.592 7.09309 25.1137V12.9898C7.09309 12.5116 6.69613 12.1239 6.20645 12.1239H2.65991C2.17023 12.1239 1.77327 12.5116 1.77327 12.9898ZM7.97973 11.0534L9.54368 7.99834C10.2644 6.59046 10.6396 5.03802 10.6396 3.46396V3.03096C10.6396 1.35701 12.029 0 13.7429 0C15.4567 0 16.8917 1.26842 17.0622 2.93405L17.6485 8.6599H23.5668C26.0152 8.6599 28 10.5985 28 12.9898C28 13.1337 27.9927 13.2775 27.978 13.4207L26.914 23.8126C26.6874 26.0261 24.7804 27.7117 22.5029 27.7117H11.5263C10.3336 27.7117 9.251 27.2517 8.45418 26.5035C7.98253 27.2297 7.15212 27.7117 6.20645 27.7117H2.65991C1.19088 27.7117 0 26.5485 0 25.1137V12.9898C0 11.555 1.19088 10.3919 2.65991 10.3919H6.20645C6.88771 10.3919 7.50914 10.642 7.97973 11.0534ZM8.86636 13.1943V23.3817C8.86636 24.8165 10.0572 25.9797 11.5263 25.9797H22.5029C23.8694 25.9797 25.0136 24.9683 25.1496 23.6402L26.2135 13.2484C26.2223 13.1625 26.2267 13.0762 26.2267 12.9898C26.2267 11.555 25.0358 10.3919 23.5668 10.3919H16.8461C16.3906 10.3919 16.0092 10.0548 15.9638 9.61206L15.2978 3.10639C15.2179 2.32615 14.5457 1.73198 13.7429 1.73198C13.0083 1.73198 12.4129 2.31356 12.4129 3.03096V3.46396C12.4129 5.3069 11.9736 7.12453 11.1297 8.77291L8.86636 13.1943Z"
                                                            fill="black" />
                                                    </g>
                                                </svg>
                                                50 suka
                                            </div>
                                            <div class="col-6 mb-2">
                                                <svg width="20" height="21" viewBox="0 0 30 31" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g
                                                        id="&#240;&#159;&#166;&#134; icon &#34;comment square chat message&#34;">
                                                        <g id="Group">
                                                            <path id="Vector" d="M7.22266 7.22168H22.7782"
                                                                stroke="black" stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path id="Vector_2" d="M7.22266 13.4443H13.4449"
                                                                stroke="black" stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path id="Vector_3"
                                                                d="M1 4.11111V28.6778C1 29.3707 1.83778 29.7177 2.32774 29.2277L8.32217 23.2334C8.61388 22.9417 9.00956 22.7778 9.42211 22.7778H25.8889C27.6072 22.7778 29 21.3849 29 19.6667V4.11111C29 2.39289 27.6072 1 25.8889 1H4.11111C2.39289 1 1 2.39289 1 4.11111Z"
                                                                stroke="black" stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </g>
                                                    </g>
                                                </svg>
                                                2 Komen
                                            </div>
                                            <div class="col-6 mb-2">
                                                <svg width="14" height="23" viewBox="0 0 24 33" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g id="&#240;&#159;&#166;&#134; icon &#34;bookmark save&#34;">
                                                        <path id="Vector"
                                                            d="M1 32V2.55C1 1.69397 1.69397 1 2.55 1H21.15C22.0061 1 22.7 1.69397 22.7 2.55V32L11.85 22.5278L1 32Z"
                                                            stroke="black" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </g>
                                                </svg>
                                                6 Favorit
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12 mb-2">
                                <div class="card-body" style="border-radius: 15px; border: 0.50px black solid">
                                    <div class=" my-3 mx-auto" style="background-color: white">

                                        <img class="rounded-circle mx-4 mb-2"
                                            style="border: 0.50px black solid; max-width: 100%; height: 150px;width: 150px"
                                            src="{{ asset('images/dark-food.jpg') }}" />

                                        <div class="row">
                                            <div class="col-6">
                                                <h5>
                                                    <a style="color: black; font-size: 24px; margin-left:-1px"
                                                        href="#">
                                                        robak
                                                    </a>
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6 mb-3">
                                                <svg width="20" height="20" viewBox="0 0 28 28" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g id="&#240;&#159;&#166;&#134; icon &#34;thumbs up&#34;">
                                                        <path id="Vector"
                                                            d="M1.77327 12.9898V25.1137C1.77327 25.592 2.17023 25.9797 2.65991 25.9797H6.20645C6.69613 25.9797 7.09309 25.592 7.09309 25.1137V12.9898C7.09309 12.5116 6.69613 12.1239 6.20645 12.1239H2.65991C2.17023 12.1239 1.77327 12.5116 1.77327 12.9898ZM7.97973 11.0534L9.54368 7.99834C10.2644 6.59046 10.6396 5.03802 10.6396 3.46396V3.03096C10.6396 1.35701 12.029 0 13.7429 0C15.4567 0 16.8917 1.26842 17.0622 2.93405L17.6485 8.6599H23.5668C26.0152 8.6599 28 10.5985 28 12.9898C28 13.1337 27.9927 13.2775 27.978 13.4207L26.914 23.8126C26.6874 26.0261 24.7804 27.7117 22.5029 27.7117H11.5263C10.3336 27.7117 9.251 27.2517 8.45418 26.5035C7.98253 27.2297 7.15212 27.7117 6.20645 27.7117H2.65991C1.19088 27.7117 0 26.5485 0 25.1137V12.9898C0 11.555 1.19088 10.3919 2.65991 10.3919H6.20645C6.88771 10.3919 7.50914 10.642 7.97973 11.0534ZM8.86636 13.1943V23.3817C8.86636 24.8165 10.0572 25.9797 11.5263 25.9797H22.5029C23.8694 25.9797 25.0136 24.9683 25.1496 23.6402L26.2135 13.2484C26.2223 13.1625 26.2267 13.0762 26.2267 12.9898C26.2267 11.555 25.0358 10.3919 23.5668 10.3919H16.8461C16.3906 10.3919 16.0092 10.0548 15.9638 9.61206L15.2978 3.10639C15.2179 2.32615 14.5457 1.73198 13.7429 1.73198C13.0083 1.73198 12.4129 2.31356 12.4129 3.03096V3.46396C12.4129 5.3069 11.9736 7.12453 11.1297 8.77291L8.86636 13.1943Z"
                                                            fill="black" />
                                                    </g>
                                                </svg>
                                                50 suka
                                            </div>
                                            <div class="col-6 mb-2">
                                                <svg width="20" height="21" viewBox="0 0 30 31" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g
                                                        id="&#240;&#159;&#166;&#134; icon &#34;comment square chat message&#34;">
                                                        <g id="Group">
                                                            <path id="Vector" d="M7.22266 7.22168H22.7782"
                                                                stroke="black" stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path id="Vector_2" d="M7.22266 13.4443H13.4449"
                                                                stroke="black" stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path id="Vector_3"
                                                                d="M1 4.11111V28.6778C1 29.3707 1.83778 29.7177 2.32774 29.2277L8.32217 23.2334C8.61388 22.9417 9.00956 22.7778 9.42211 22.7778H25.8889C27.6072 22.7778 29 21.3849 29 19.6667V4.11111C29 2.39289 27.6072 1 25.8889 1H4.11111C2.39289 1 1 2.39289 1 4.11111Z"
                                                                stroke="black" stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </g>
                                                    </g>
                                                </svg>
                                                2 Komen
                                            </div>
                                            <div class="col-6 mb-2">
                                                <svg width="14" height="23" viewBox="0 0 24 33" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g id="&#240;&#159;&#166;&#134; icon &#34;bookmark save&#34;">
                                                        <path id="Vector"
                                                            d="M1 32V2.55C1 1.69397 1.69397 1 2.55 1H21.15C22.0061 1 22.7 1.69397 22.7 2.55V32L11.85 22.5278L1 32Z"
                                                            stroke="black" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </g>
                                                </svg>
                                                6 Favorit
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12 mb-2">
                                <div class="card-body" style="border-radius: 15px; border: 0.50px black solid">
                                    <div class=" my-3 mx-auto" style="background-color: white">

                                        <img class="rounded-circle mx-4 mb-2"
                                            style="border: 0.50px black solid; max-width: 100%; height: 150px;width: 150px"
                                            src="{{ asset('images/dark-food.jpg') }}" />

                                        <div class="row">
                                            <div class="col-6">
                                                <h5>
                                                    <a style="color: black; font-size: 24px; margin-left:-1px"
                                                        href="#">
                                                        robak
                                                    </a>
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6 mb-3">
                                                <svg width="20" height="20" viewBox="0 0 28 28" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g id="&#240;&#159;&#166;&#134; icon &#34;thumbs up&#34;">
                                                        <path id="Vector"
                                                            d="M1.77327 12.9898V25.1137C1.77327 25.592 2.17023 25.9797 2.65991 25.9797H6.20645C6.69613 25.9797 7.09309 25.592 7.09309 25.1137V12.9898C7.09309 12.5116 6.69613 12.1239 6.20645 12.1239H2.65991C2.17023 12.1239 1.77327 12.5116 1.77327 12.9898ZM7.97973 11.0534L9.54368 7.99834C10.2644 6.59046 10.6396 5.03802 10.6396 3.46396V3.03096C10.6396 1.35701 12.029 0 13.7429 0C15.4567 0 16.8917 1.26842 17.0622 2.93405L17.6485 8.6599H23.5668C26.0152 8.6599 28 10.5985 28 12.9898C28 13.1337 27.9927 13.2775 27.978 13.4207L26.914 23.8126C26.6874 26.0261 24.7804 27.7117 22.5029 27.7117H11.5263C10.3336 27.7117 9.251 27.2517 8.45418 26.5035C7.98253 27.2297 7.15212 27.7117 6.20645 27.7117H2.65991C1.19088 27.7117 0 26.5485 0 25.1137V12.9898C0 11.555 1.19088 10.3919 2.65991 10.3919H6.20645C6.88771 10.3919 7.50914 10.642 7.97973 11.0534ZM8.86636 13.1943V23.3817C8.86636 24.8165 10.0572 25.9797 11.5263 25.9797H22.5029C23.8694 25.9797 25.0136 24.9683 25.1496 23.6402L26.2135 13.2484C26.2223 13.1625 26.2267 13.0762 26.2267 12.9898C26.2267 11.555 25.0358 10.3919 23.5668 10.3919H16.8461C16.3906 10.3919 16.0092 10.0548 15.9638 9.61206L15.2978 3.10639C15.2179 2.32615 14.5457 1.73198 13.7429 1.73198C13.0083 1.73198 12.4129 2.31356 12.4129 3.03096V3.46396C12.4129 5.3069 11.9736 7.12453 11.1297 8.77291L8.86636 13.1943Z"
                                                            fill="black" />
                                                    </g>
                                                </svg>
                                                50 suka
                                            </div>
                                            <div class="col-6 mb-2">
                                                <svg width="20" height="21" viewBox="0 0 30 31" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g
                                                        id="&#240;&#159;&#166;&#134; icon &#34;comment square chat message&#34;">
                                                        <g id="Group">
                                                            <path id="Vector" d="M7.22266 7.22168H22.7782"
                                                                stroke="black" stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path id="Vector_2" d="M7.22266 13.4443H13.4449"
                                                                stroke="black" stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path id="Vector_3"
                                                                d="M1 4.11111V28.6778C1 29.3707 1.83778 29.7177 2.32774 29.2277L8.32217 23.2334C8.61388 22.9417 9.00956 22.7778 9.42211 22.7778H25.8889C27.6072 22.7778 29 21.3849 29 19.6667V4.11111C29 2.39289 27.6072 1 25.8889 1H4.11111C2.39289 1 1 2.39289 1 4.11111Z"
                                                                stroke="black" stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </g>
                                                    </g>
                                                </svg>
                                                2 Komen
                                            </div>
                                            <div class="col-6 mb-2">
                                                <svg width="14" height="23" viewBox="0 0 24 33" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g id="&#240;&#159;&#166;&#134; icon &#34;bookmark save&#34;">
                                                        <path id="Vector"
                                                            d="M1 32V2.55C1 1.69397 1.69397 1 2.55 1H21.15C22.0061 1 22.7 1.69397 22.7 2.55V32L11.85 22.5278L1 32Z"
                                                            stroke="black" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </g>
                                                </svg>
                                                6 Favorit
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12 mb-2">
                                <div class="card-body" style="border-radius: 15px; border: 0.50px black solid">
                                    <div class=" my-3 mx-auto" style="background-color: white">

                                        <img class="rounded-circle mx-4 mb-2"
                                            style="border: 0.50px black solid; max-width: 100%; height: 150px;width: 150px"
                                            src="{{ asset('images/dark-food.jpg') }}" />

                                        <div class="row">
                                            <div class="col-6">
                                                <h5>
                                                    <a style="color: black; font-size: 24px; margin-left:-1px"
                                                        href="#">
                                                        robak
                                                    </a>
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6 mb-3">
                                                <svg width="20" height="20" viewBox="0 0 28 28" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g id="&#240;&#159;&#166;&#134; icon &#34;thumbs up&#34;">
                                                        <path id="Vector"
                                                            d="M1.77327 12.9898V25.1137C1.77327 25.592 2.17023 25.9797 2.65991 25.9797H6.20645C6.69613 25.9797 7.09309 25.592 7.09309 25.1137V12.9898C7.09309 12.5116 6.69613 12.1239 6.20645 12.1239H2.65991C2.17023 12.1239 1.77327 12.5116 1.77327 12.9898ZM7.97973 11.0534L9.54368 7.99834C10.2644 6.59046 10.6396 5.03802 10.6396 3.46396V3.03096C10.6396 1.35701 12.029 0 13.7429 0C15.4567 0 16.8917 1.26842 17.0622 2.93405L17.6485 8.6599H23.5668C26.0152 8.6599 28 10.5985 28 12.9898C28 13.1337 27.9927 13.2775 27.978 13.4207L26.914 23.8126C26.6874 26.0261 24.7804 27.7117 22.5029 27.7117H11.5263C10.3336 27.7117 9.251 27.2517 8.45418 26.5035C7.98253 27.2297 7.15212 27.7117 6.20645 27.7117H2.65991C1.19088 27.7117 0 26.5485 0 25.1137V12.9898C0 11.555 1.19088 10.3919 2.65991 10.3919H6.20645C6.88771 10.3919 7.50914 10.642 7.97973 11.0534ZM8.86636 13.1943V23.3817C8.86636 24.8165 10.0572 25.9797 11.5263 25.9797H22.5029C23.8694 25.9797 25.0136 24.9683 25.1496 23.6402L26.2135 13.2484C26.2223 13.1625 26.2267 13.0762 26.2267 12.9898C26.2267 11.555 25.0358 10.3919 23.5668 10.3919H16.8461C16.3906 10.3919 16.0092 10.0548 15.9638 9.61206L15.2978 3.10639C15.2179 2.32615 14.5457 1.73198 13.7429 1.73198C13.0083 1.73198 12.4129 2.31356 12.4129 3.03096V3.46396C12.4129 5.3069 11.9736 7.12453 11.1297 8.77291L8.86636 13.1943Z"
                                                            fill="black" />
                                                    </g>
                                                </svg>
                                                50 suka
                                            </div>
                                            <div class="col-6 mb-2">
                                                <svg width="20" height="21" viewBox="0 0 30 31" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g
                                                        id="&#240;&#159;&#166;&#134; icon &#34;comment square chat message&#34;">
                                                        <g id="Group">
                                                            <path id="Vector" d="M7.22266 7.22168H22.7782"
                                                                stroke="black" stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path id="Vector_2" d="M7.22266 13.4443H13.4449"
                                                                stroke="black" stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path id="Vector_3"
                                                                d="M1 4.11111V28.6778C1 29.3707 1.83778 29.7177 2.32774 29.2277L8.32217 23.2334C8.61388 22.9417 9.00956 22.7778 9.42211 22.7778H25.8889C27.6072 22.7778 29 21.3849 29 19.6667V4.11111C29 2.39289 27.6072 1 25.8889 1H4.11111C2.39289 1 1 2.39289 1 4.11111Z"
                                                                stroke="black" stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </g>
                                                    </g>
                                                </svg>
                                                2 Komen
                                            </div>
                                            <div class="col-6 mb-2">
                                                <svg width="14" height="23" viewBox="0 0 24 33" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <g id="&#240;&#159;&#166;&#134; icon &#34;bookmark save&#34;">
                                                        <path id="Vector"
                                                            d="M1 32V2.55C1 1.69397 1.69397 1 2.55 1H21.15C22.0061 1 22.7 1.69397 22.7 2.55V32L11.85 22.5278L1 32Z"
                                                            stroke="black" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </g>
                                                </svg>
                                                6 Favorit
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- {{ $recipes->links('vendor.pagination.default') }} --}}
                    </div>
                </div>
                {{-- end --}}
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                    tabindex="0">
                    {{-- start tab 2 --}}
                    <div class="d-flex mt-4">
                        <div class="row">
                            <div class="col-3 mx-2">
                                <img src="{{ asset('img/3.jpg') }}" style="width: 100%; height: 100%; margin-left: -25px;"
                                    class="rounded float-end " alt="...">
                            </div>
                            <div class="col-8">
                                <strong class="me-5 w-75">Lorem Ipsum is simply dummy text of the printing and typesetting
                                    industry.
                                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                    unknown
                                    printer took a galley of type and scrambled it to make a type specimen book. It has
                                    survived not
                                    only five centuries, but also the leap into electronic typesetting, remaining
                                    essentially
                                    unchanged. It was popularised in the 1960s with the release of Letraset sheets
                                    containing Lorem
                                    Ipsum passages, and more recently with desktop publishing software like Aldus.</strong>
                                <p>
                                    <a type="button" class="mr-1 text-dark" onclick="openModel()"
                                        id="button-modal-komentar-feed" href="#"
                                        data-bs-toggle="modal"data-bs-target="#exampleModal">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 512 512">
                                            <path fill="currentColor"
                                                d="M323.8 34.8c-38.2-10.9-78.1 11.2-89 49.4l-5.7 20c-3.7 13-10.4 25-19.5 35l-51.3 56.4c-8.9 9.8-8.2 25 1.6 33.9s25 8.2 33.9-1.6l51.3-56.4c14.1-15.5 24.4-34 30.1-54.1l5.7-20c3.6-12.7 16.9-20.1 29.7-16.5s20.1 16.9 16.5 29.7l-5.7 20c-5.7 19.9-14.7 38.7-26.6 55.5c-5.2 7.3-5.8 16.9-1.7 24.9s12.3 13 21.3 13H448c8.8 0 16 7.2 16 16c0 6.8-4.3 12.7-10.4 15c-7.4 2.8-13 9-14.9 16.7s.1 15.8 5.3 21.7c2.5 2.8 4 6.5 4 10.6c0 7.8-5.6 14.3-13 15.7c-8.2 1.6-15.1 7.3-18 15.1s-1.6 16.7 3.6 23.3c2.1 2.7 3.4 6.1 3.4 9.9c0 6.7-4.2 12.6-10.2 14.9c-11.5 4.5-17.7 16.9-14.4 28.8c.4 1.3.6 2.8.6 4.3c0 8.8-7.2 16-16 16h-97.5c-12.6 0-25-3.7-35.5-10.7l-61.7-41.1c-11-7.4-25.9-4.4-33.3 6.7s-4.4 25.9 6.7 33.3l61.7 41.1c18.4 12.3 40 18.8 62.1 18.8H384c34.7 0 62.9-27.6 64-62c14.6-11.7 24-29.7 24-50c0-4.5-.5-8.8-1.3-13c15.4-11.7 25.3-30.2 25.3-51c0-6.5-1-12.8-2.8-18.7c11.6-11.7 18.8-27.7 18.8-45.4c0-35.3-28.6-64-64-64h-92.3c4.7-10.4 8.7-21.2 11.8-32.2l5.7-20c10.9-38.2-11.2-78.1-49.4-89zM32 192c-17.7 0-32 14.3-32 32v224c0 17.7 14.3 32 32 32h64c17.7 0 32-14.3 32-32V224c0-17.7-14.3-32-32-32H32z" />
                                        </svg>
                                        &nbsp; <span class="my-auto">10</span>
                                    </a>
                                    <a type="button" class="ms-3 text-dark" onclick="openModel()"
                                        id="button-modal-komentar-feed" href="#"
                                        data-bs-toggle="modal"data-bs-target="#exampleModal">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26"
                                            viewBox="0 0 16 16">
                                            <path fill="currentColor"
                                                d="M1 4.5A2.5 2.5 0 0 1 3.5 2h9A2.5 2.5 0 0 1 15 4.5v5a2.5 2.5 0 0 1-2.5 2.5H8.688l-3.063 2.68A.98.98 0 0 1 4 13.942V12h-.5A2.5 2.5 0 0 1 1 9.5v-5ZM3.5 3A1.5 1.5 0 0 0 2 4.5v5A1.5 1.5 0 0 0 3.5 11H5v2.898L8.312 11H12.5A1.5 1.5 0 0 0 14 9.5v-5A1.5 1.5 0 0 0 12.5 3h-9Z" />
                                        </svg>
                                        &nbsp; <span class="my-auto">50</span>
                                    </a>
                                    <a class="ml-3 mr-1 my-auto text-dark" href="#" data-bs-toggle="modal"
                                        data-bs-target="#bagikan">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="27" height="25"
                                            viewBox="0 0 512 512">
                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="32"
                                                d="m53.12 199.94l400-151.39a8 8 0 0 1 10.33 10.33l-151.39 400a8 8 0 0 1-15-.34l-67.4-166.09a16 16 0 0 0-10.11-10.11L53.46 215a8 8 0 0 1-.34-15.06ZM460 52L227 285" />
                                        </svg>
                                        &nbsp; <span class="my-auto">5</span>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
                {{-- end --}}
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"
                    tabindex="0">
                    {{-- start tab 3 --}}
                       <div class="d-flex">
                        <div class="card my-3" style="width: 30%; border-radius:15px">
                            <div class="row">
                                <div class="col-12">
                                    <img src="{{ asset('sawi.jpg') }}" class="card-img-top"
                                        style="max-width:100%; width:100%; border-top-left-radius:15px;
                                                   border-top-right-radius: 15px"
                                        alt="...">
                                </div>
                                <div class="card-body">
                                    <div class="col-12">
                                        <h5>Merebus</h5>
                                        <a href="/detail" class="btn"
                                            style="font-family: poppins;font-weight:bold">cara merebus dengan benar</a>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="card mx-3 my-3" style="width: 30%; border-radius:15px">
                            <div class="row">
                                <div class="col-12">
                                    <img src="{{ asset('sawi.jpg') }}" class="card-img-top"
                                        style="max-width:100%; width:100%; border-top-left-radius:15px;
                                                   border-top-right-radius: 15px"
                                        alt="...">
                                </div>
                                <div class="card-body">
                                    <div class="col-12">
                                        <h5>Merebus</h5>
                                        <a href="/detail" class="btn"
                                            style="font-family: poppins;font-weight:bold">cara merebus dengan benar</a>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="card mx-3 my-3" style="width: 30%; border-radius:15px">
                            <div class="row">
                                <div class="col-12">
                                    <img src="{{ asset('sawi.jpg') }}" class="card-img-top"
                                        style=" width:100%; border-top-left-radius:15px;
                                                   border-top-right-radius: 15px"
                                        alt="...">
                                </div>
                                <div class="card-body">
                                    <div class="col-12">
                                        <h5>Merebus</h5>
                                        <a href="/detail" class="btn"
                                            style="font-family: poppins;font-weight:bold">cara merebus dengan benar</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                       </div>
                </div>
            </div>
            {{-- end --}}
        </div>
    </div>
    <script>
        const click1 = document.getElementById("click1");
        const click2 = document.getElementById("c");
        const border1 = document.getElementById("border1");
        const border2 = document.getElementById("b");
        const o = document.getElementById("pp");
        const a_tab = document.getElementById("a-tab");

        a_tab.addEventListener('click', function(event) {
            event.preventDefault();
            o.style.display = "block";
            border1.style.display = "none";
            border2.style.display = "none";
        });

        click1.addEventListener('click', function(event) {
            event.preventDefault();
            border1.style.display = "block";
            border2.style.display = "none";
            o.style.display = "none";
        });

        click2.addEventListener("click", function(event) {
            event.preventDefault();
            border2.removeAttribute('hidden');
            border2.style.display = "block";
            border1.style.display = "none";
            o.style.display = "none";
        });
    </script>
@endsection
