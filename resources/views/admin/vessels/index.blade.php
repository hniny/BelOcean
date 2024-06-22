@extends('adminlte::page')

@section('title', 'Vessels')

@section('content_header')

@stop

@section('content')
<div class="container bg-white pb-5 mt-5">
    <div class="row border-top border-info ">
        <div class="col-lg-12 margin-tb py-3">
            <div class="float-left">
                <h2>Vessels</h2>
            </div>
            <div class="float-right">
                @can('personal-create')
            <a class="btn btn-success" href="{{ route('vessels.create') }}"> Add Vessels</a>
                @endcan
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert" style="background-color: #a6ee8a;border-color:#a6ee8a">
            <p class="pb-0">{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered table-sm">
        <tr style="background-color:#dff0d8">
            <th>No</th>
            <th>Vessel Name</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($vessels as $vessel)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $vessel->vsl_name }}</td>
            <td>
                <form action="{{ route('vessels.destroy',$vessel->id) }}" method="POST">
                    <a class="btn btn-info btn-sm" href="{{ route('vessels.show',$vessel->id) }}"><i class="fa fa-eye"></i></a>
                    @can('personal-edit')
                    <a class="btn btn-primary btn-sm" href="{{ route('vessels.edit',$vessel->id) }}"><i class="fa fa-edit"></i></a>
                    @endcan
                    @csrf
                    @method('DELETE')
                    @can('personal-delete')
                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                    @endcan
                </form>
            </td>
        </tr>
        @endforeach
    </table>


    {!! $vessels->links() !!}


</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop