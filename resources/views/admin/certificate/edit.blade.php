@extends('adminlte::page')

@section('title', 'Certificates')

@section('content_header')

@stop

@section('content')
<div class="container bg-white pb-5 mt-5">
    <div class="row border-top border-info ">
        <div class="col-lg-12 margin-tb py-3">
            <div class="float-left">
                <h2>Edit Product</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary btn-sm" href="{{ route('certificates.index') }}"> Back</a>
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


    <form action="{{ route('certificates.update',$certificate->id) }}" method="POST">
        @csrf
        @method('PUT')
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{ $certificate->name }}" class="form-control" >
                </div>
                <div class="form-group form-check">
                   
                    <input type="checkbox" class="form-check-input" name="status" id="exampleCheck1" {{$checked}} >
                    <label class="form-check-label"  for="exampleCheck1" >File Attach</label>
                </div>
                {{-- <input type="hidden" name="id" value={{$certificate->id}}> --}}
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <div class="float-right">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
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