@extends('adminlte::page')

@section('title', 'Applied Categories')

@section('content_header')

@stop

@section('content')
<div class="container bg-white pb-5 mt-5">
    <div class="row border-top border-info ">
        <div class="col-lg-12 margin-tb py-3">
            <div class="float-left">
                <h2>Applied Categories</h2>
            </div>
            <div class="float-right">
                @can('personal-create')
            <a class="btn btn-success" href="{{ route('categories.create') }}"> Add Categoy</a>
                @endcan
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert" style="background-color: #acf38f;border-color:#acf38f">
            <p class="pb-0">{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered table-sm">
        <tr style="background-color:#dff0d8">
            <th>No</th>
            <th>Applied Category Name</th>
            <th width="280px">Action</th>
        </tr>
        
        @foreach ($appliedCategories as $appliedCategory)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $appliedCategory->cat_name }}</td>
            <td>
                <form action="{{ route('categories.destroy',$appliedCategory->id) }}" method="POST">
                    {{-- {{dd($appliedCategory->id)}} --}}
                    <a class="btn btn-info btn-sm" href="{{ route('categories.show',$appliedCategory->id) }}"><i class="fa fa-eye"></i></a>
                    @can('personal-edit')
                    <a class="btn btn-primary btn-sm" href="{{ route('categories.edit',$appliedCategory->id) }}"><i class="fa fa-edit"></i></a>
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


    {!! $appliedCategories->links() !!}


</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop