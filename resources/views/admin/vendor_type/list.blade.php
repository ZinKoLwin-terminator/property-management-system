


@extends('admin.layouts.app')
@section('content')

<div class="pagetitle">
    <h1>Vendor Type</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Vendor Type</li>
      </ol>
    </nav>
  </div>

  <section class="section">

    <div class="row">
        <div class="col-lg-12">
            @include('_message')
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="{{url('admin/vendor_type/add')}}" class="btn btn-primary">Add New Vendor Type</a>
                    </h5>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Vendor Type Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($getRecord->count()!=0)
                            @foreach ($getRecord as $value)
                            <tr>
                           <td>{{$value->id}}</td>
                           <td>{{$value->name}}</td>
                           <td>
                               <a href="{{url('admin/vendor_type/edit/'.$value->id)}}" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>

                               <a onclick="return confirm('Are you sure you want to delete?')" href="{{ url('admin/vendor_type/delete/'.$value->id) }}" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                           </td>
                       </tr>
                       @endforeach
                            @else
                            <tr>
                             <td class="text-center" colspan="100%">Record Not Found</td>
                         </tr>
                            @endif
                        </tbody>
                    </table>
                    {{$getRecord->links()}}
                </div>
            </div>
        </div>
    </div>

  </section>



@endsection
