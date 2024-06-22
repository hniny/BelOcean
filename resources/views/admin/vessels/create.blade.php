@extends('adminlte::page')

@section('title', 'Vessels')

@section('content_header')

@stop

@section('content')
<div class="container bg-white pb-5 mt-5">
    <div class="row border-top border-info ">
        <div class="col-lg-12 margin-tb py-3">
            <div class="float-left">
                <h2>Add New Vessel</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary btn-sm" href="{{ route('vessels.index') }}"> Back</a>
            </div>
        </div>
    </div>


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('vessels.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="form-group">
                    <label for="name">Vessel Name:</label>
                    <input type="text" id="vsl_name" name="vsl_name" class="form-control" required>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <div class="float-right">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
      </form>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop