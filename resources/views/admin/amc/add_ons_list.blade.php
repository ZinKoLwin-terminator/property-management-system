


@extends('admin.layouts.app')
@section('content')

<div class="pagetitle">
    <h1>Add ons</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Add ons</li>
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
                        <a href="{{url('admin/amc/add_add_ons/'.$getRecord->id)}}" class="btn btn-primary">Add New Add ons</a>
                    </h5>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           @if ($get_add_ons->count()!=0)
                           @foreach ($get_add_ons as $value)
                           <tr>
                          <td>{{$value->id}}</td>
                          <td>{{$value->name}}</td>
                          <td>{{number_format($value->price,2)}}</td>
                          <td>
                              <a href="{{url('admin/amc/edit_add_ons/'.$value->id)}}" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>


                              <a onclick="return confirm('Are you sure you want to delete?')" href="{{ url('admin/amc/delete_add_ons/'.$value->id) }}" class="btn btn-danger"><i class="bi bi-trash"></i></a>

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
                    {{$get_add_ons->links()}}
                </div>
            </div>
        </div>
    </div>

  </section>



@endsection
