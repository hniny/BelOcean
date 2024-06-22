@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
   
@stop

@section('content')

<div class="row pt-5">
    <div class="col-md-3">
        <!-- Apply any bg-* class to to the info-box to color it -->
        <div class="info-box bg-blue">
            {{-- <span class="info-box-icon"><i class="fa fa-comments-o"></i></span> --}}
            <div class="info-box-content">
              <span class="info-box-text">Likes</span>
              <span class="info-box-number">41,410</span>
              <!-- The progress section is optional -->
              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
              <span class="progress-description">
                70% Increase in 30 Days
              </span>
            </div><!-- /.info-box-content -->
          </div><!-- /.info-box -->
    </div>
    <div class="col-md-3">
        <!-- Apply any bg-* class to to the info-box to color it -->
        <div class="info-box bg-green">
            {{-- <span class="info-box-icon"><i class="fa fa-comments-o"></i></span> --}}
            <div class="info-box-content">
              <span class="info-box-text">Likes</span>
              <span class="info-box-number">41,410</span>
              <!-- The progress section is optional -->
              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
              <span class="progress-description">
                70% Increase in 30 Days
              </span>
            </div><!-- /.info-box-content -->
          </div><!-- /.info-box -->
    </div>
    <div class="col-md-3">
        <!-- Apply any bg-* class to to the info-box to color it -->
        <div class="info-box bg-warning ">
            {{-- <span class="info-box-icon"><i class="fa fa-comments-o"></i></span> --}}
            <div class="info-box-content">
              <span class="info-box-text">Likes</span>
              <span class="info-box-number">41,410</span>
              <!-- The progress section is optional -->
              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
              <span class="progress-description">
                70% Increase in 30 Days
              </span>
            </div><!-- /.info-box-content -->
          </div><!-- /.info-box -->
    </div>
    <div class="col-md-3">
        <!-- Apply any bg-* class to to the info-box to color it -->
        <div class="info-box bg-red">
            {{-- <span class="info-box-icon"><i class="fa fa-comments-o"></i></span> --}}
            <div class="info-box-content">
              <span class="info-box-text">Likes</span>
              <span class="info-box-number">41,410</span>
              <!-- The progress section is optional -->
              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
              <span class="progress-description">
                70% Increase in 30 Days
              </span>
            </div><!-- /.info-box-content -->
          </div><!-- /.info-box -->
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop