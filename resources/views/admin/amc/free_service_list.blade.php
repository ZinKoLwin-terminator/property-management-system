


@extends('admin.layouts.app')
@section('content')

<div class="pagetitle">
    <h1>Free Service</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Free Service</li>
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
                        <a href="{{url('admin/amc/add_free_service/'.$getRecord->id)}}" class="btn btn-primary">Add New Free Service</a>
                    </h5>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Limits</th>
                                <th>Price</th>

                            </tr>
                        </thead>
                        <tbody>
                            @if ($get_free_service->count()!=0)
                            @foreach ($get_free_service as $value)
                                <tr>
                                    <td>{{$value->id}}</td>
                                <td>{{$value->name}}</td>
                                <td>{{$value->limits}}</td>
                                <td>{{$value->price}}</td>

                                </tr>
                       @endforeach
                            @else
                            <tr>
                             <td class="text-center" colspan="100%">Record Not Found</td>
                         </tr>

                            @endif


                        </tbody>
                    </table>
                    {{$get_free_service->links()}}
                </div>
            </div>
        </div>
    </div>

  </section>



@endsection
