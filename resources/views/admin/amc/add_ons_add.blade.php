
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
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        Add ons
                    </h5>

                    <form action="{{url('admin/amc/add_add_ons/'.$getRecord->id)}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <input type="hidden" name="amc_id" value="{{$getRecord->id}}">

                       <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Name<span style="color: red">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" required value="{{old('name')}}">
                        </div>
                       </div>

                       <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Price<span style="color: red">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" name="price" class="form-control" required value="{{old('price')}}" oninput="javascript:this.value=this.value.replace(/[^0-9]/g,'');if(this.value.length>this.maxLength)this.value=this.value.slice(0,this.maxLength);"
                            maxLength="10"
                            >
                        </div>
                       </div>


                       <div class="row mb-3">
                        <label for="" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <button class="btn btn-primary" type="submit">
                                Submit
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
