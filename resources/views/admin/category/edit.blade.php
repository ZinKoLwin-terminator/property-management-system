
@extends('admin.layouts.app')
@section('content')

<div class="pagetitle">
    <h1>Category</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Category</li>
      </ol>
    </nav>
  </div>

  <section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        Edit Category
                    </h5>

                    <form action="{{url('admin/category/edit/'.$getRecord->id)}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                       <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Category Name<span style="color: red">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" required value="{{$getRecord->name}}">
                            <span style="color: red">{{$errors->first('name')}}</span>
                        </div>
                       </div>
                      <div class="row mb-3">
                        <label for="" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <button class="btn btn-primary" type="submit">
                                Update
                            </button>
                        </div>
                       </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
  </section>


  @endsection