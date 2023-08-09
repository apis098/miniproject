@extends('layouts.nav_koki')
@section('konten')

<br>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-md-4 mb-2">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                    <h3></h3>
                  <p>Tips Dasar</p>
                </div>
                <div class="icon">
                  <i class="fas fa-utensils"></i>
                </div>
                <a href="{{route('basic_tips.index')}}" class="small-box-footer">Lihat    <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->

            <!-- ./col -->
            <div class="col-md-4 mb-2">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                    <h3></h3>

                  <p>Seputar Dapur</p>
                </div>
                <div class="icon">
                  <i class="fas fa-mortar-pestle"></i>
                </div>
                <a href="{{route('seputar_dapur.index')}}" class="small-box-footer">Lihat    <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-md-4 mb-2">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                    <h3></h3>

                  <p>Resep - Resep</p>
                </div>
                <div class="icon">
                  <i class="fas fas fa-receipt"></i>
                </div>
                <a href="/koki/resep" class="small-box-footer">Lihat    <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
        </div>
          </div>
        </div>
          <!-- /.row -->
          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <section class="col-md-12 mb-5">
              <!-- Custom tabs (Charts with tabs)-->
              <div class="card bg-gradient-success">
                <div class="card-header border-0">

                  <h3 class="card-title">
                    <i class="far fa-calendar-alt"></i>
                    Calendar
                  </h3>
                  <!-- tools card -->
                  <div class="card-tools">
                    <!-- button with a dropdown -->
                    <div class="btn-group">


                    </div>
                    <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                  <!-- /. tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body pt-0">
                  <!--The calendar -->
                  <div id="calendar" style="width: 100%"></div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->


            </section>

            <section class="col-lg-5 connectedSortable">

<div>
                  <div class="card-footer bg-transparent">
                    <div class="row">
                      <div class="col-4 text-center">
                       <input type="hidden" id="sparkline-1">

                      </div>
                      <!-- ./col -->
                      <div class="col-4 text-center">
                        <input type="hidden" id="sparkline-2">

                      </div>
                      <!-- ./col -->
                      <div class="col-4 text-center">
                       <input type="hidden" id="sparkline-3">
                      </div>
                      <!-- ./col -->
                    </div>
                    <!-- /.row -->
                  </div>
                </div>
            </section>
            <!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->

            <!-- right col -->
          </div>
          <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
      </section>


@endsection



