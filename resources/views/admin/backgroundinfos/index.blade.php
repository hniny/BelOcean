@extends('adminlte::page')

@section('title', 'Background Infos')

@section('content_header')

@stop

@section('content')
<div class="container bg-white pb-3 mt-5">
    <div class="row border-top border-info ">
        <div class="col-lg-12 margin-tb py-3">
            <div class="float-left">
                <h2>Background Infos</h2>
            </div>
            <div class="float-right">
                @can('personal-create')
            <a class="btn btn-success" href="{{ route('backgroundinfos.create') }}"> Add Backgroundinfos</a>
                @endcan
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert" style="background-color: #acf38f;border-color:#a6ee8a">
            <p class="pb-0">{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered table-sm">
        <tr style="background-color:#dff0d8">
            <th>No</th>
            <th>Background Info</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($backgroundinfos as $backgroundinfo)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $backgroundinfo->bg_name }}</td>
            <td>
                <form action="{{ route('backgroundinfos.destroy',$backgroundinfo->id) }}" method="POST">
                    <a class="btn btn-info btn-sm" href="{{ route('backgroundinfos.show',$backgroundinfo->id) }}"><i class="fa fa-eye"></i></a>
                    @can('personal-edit')
                    <a class="btn btn-primary btn-sm" href="{{ route('backgroundinfos.edit',$backgroundinfo->id) }}"><i class="fa fa-edit"></i></a>
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


    {!! $backgroundinfos->links() !!}


</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop