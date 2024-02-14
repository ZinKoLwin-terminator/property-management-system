

@extends('admin.layouts.app')
@section('content')

<div class="pagetitle">
    <h1>Edit Free Service</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Edit Free Service</li>
      </ol>
    </nav>
  </div>

  <section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                       Edit Free Service
                    </h5>

                    <form action="{{url('admin/amc/edit_free_service/'.$getRecord->id)}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}


                       <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Name<span style="color: red">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" required value="{{$getRecord->name}}">
                            <span style="color: red">{{$errors->first('name')}}</span>
                        </div>
                       </div>

                       <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Limits<span style="color: red">*</span></label>
                        <div class="col-sm-10">
                           <select name="limits" class="form-control" >
                            @for ($i=1;$i<=50;$i++)
                            <option {{($getRecord->limits==$i)?'selected':''}} value="{{$i}}">{{$i}}</option>
                            @endfor
                           </select>
                           <span style="color: red">{{$errors->first('limits')}}</span>
                        </div>
                       </div>

                       <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Price<span style="color: red">*</span></label>
                        <div class="col-sm-10">
                            <input type="text" name="price" class="form-control" required value="{{$getRecord->price}}" oninput="javascript:this.value=this.value.replace(/[^0-9]/g,'');if(this.value.length>this.maxLength)this.value=this.value.slice(0,this.maxLength);"
                            maxLength="10"
                            >
                            <span style="color: red">{{$errors->first('price')}}</span>
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
