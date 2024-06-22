@extends('adminlte::page')

@section('title', 'Certificates')

@section('content_header')

@stop

@section('content')
<div class="container bg-white pb-5 mt-5">
    <div class="row border-top border-info ">
        <div class="col-lg-12 margin-tb py-3">
            <div class="float-left">
                <h2> Show Background Info</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary btn-sm" href="{{ route('backgroundinfos.index') }}"> Back</a>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Background Info:</strong>
                {{ $backgroundinfo->bg_name }}
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop