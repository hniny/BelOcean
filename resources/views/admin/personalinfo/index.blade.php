@extends('adminlte::page')

@section('title', 'Personalinfos')

@section('content_header')
   
@stop

@section('content')
<div class="container bg-white pb-5 mt-5">
    <div class="row border-top border-info ">
        <div class="col-lg-12 margin-tb py-3">
            <div class="float-left">
                <h2>Personalinfos</h2>
            </div>
            <div class="float-right">
            @can('role-create')
                <a class="btn btn-sm btn-success" href="{{ route('personalinfos.create') }}"> Add Personalinfo</a>
                @endcan
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert" style="background-color:#acf38f">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered table-sm">
      <tr style="background-color:#dff0d8">
         <th>No</th>
         <th>Name</th>
         <th>Age</th>
         <th>Date of Birth</th>
         <th>Place of Birth</th>
         <th colspan="2">Action</th>
      </tr>
      @foreach ($personalinfos as $personalinfo)
      <tr>
          <td>{{ ++$i }}</td>
          <td>{{ $personalinfo->name }}</td>
          <td>{{ $personalinfo->age }}</td>
          <td>{{ \Carbon\Carbon::parse($personalinfo->date_birth)->format('d-m-Y') }}</td>
          <td >{{ $personalinfo->place_birth }}</td>
          <td width="160px">
              <form action="{{ route('personalinfos.destroy',$personalinfo->id) }}" method="POST">
                  <a class="btn btn-info btn-sm" href="{{ route('personalinfos.show',$personalinfo->id) }}"><i class="fa fa-eye"></i></a>
                  @can('personal-edit')
                  <a class="btn btn-primary btn-sm" href="{{ route('personalinfos.edit',$personalinfo->id) }}"><i class="fa fa-edit"></i></a>
                  @endcan
                  @csrf
                  @method('DELETE')
                  @can('personal-delete')
                  <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash" data-image="{{$personalinfo->person_img}}"></i></button>
                  @endcan
                  <a href="{{action('PersonalinfoController@downloadPDF', $personalinfo->id)}}" class="btn btn-sm btn-secondary"><i class="fa fa-download"></i></a>
              </form>
          </td>
          <td width="150px">
                                            
            <form action="{{ route('yearly') }}" method="POST">
                @csrf
                @method('POST')
                <input type="text" class="year from-control" style="width: 50px" name="year" placeholder="Year"/>

                {{-- <input type="hidden" name="id" value="{{$customer->id}}"> --}}

                    <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-download pr-1"></i>Yearly</button>
                                
            </form>
        </td>
          
      </tr>
      @endforeach
    </table>
    {!! $personalinfos->links() !!}
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.year').datepicker({
                    minViewMode: 2,
                    format: 'yyyy',
            });
        });
    </script>
@stop
      
        