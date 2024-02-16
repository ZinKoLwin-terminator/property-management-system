
@extends('admin.layouts.app')
@section('content')

<div class="pagetitle">
    <h1>Vendor</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Vendor</li>
      </ol>
    </nav>
  </div>

  <section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        Add Vendor
                    </h5>

                    <form action="{{url('admin/vendor/add')}}" method="post" enctype="multipart/form-data" enctype="multipart/form-data">
                        {{ csrf_field() }}
                       <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Vendor First Name<span style="color: red">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="name" class="form-control" required value="{{old('name')}}">
                            <span style="color: red">{{$errors->first('first_name')}}</span>
                        </div>
                       </div>

                       <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Vendor Last Name<span style="color: red"></span></label>
                        <div class="col-sm-9">
                            <input type="text" name="last_name" class="form-control"  value="{{old('last_name')}}">
                            <span style="color: red">{{$errors->first('last_name')}}</span>
                        </div>
                       </div>

                       <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Vendor Email<span style="color: red">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="email" class="form-control"  value="{{old('email')}}">
                            <span style="color: red">{{$errors->first('email')}}</span>
                        </div>
                       </div>

                       <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Vendor Mobile<span style="color: red"></span></label>
                        <div class="col-sm-9">
                            <input type="text" name="mobile" class="form-control"  value="{{old('mobile')}}">
                            <span style="color: red">{{$errors->first('mobile')}}</span>
                        </div>
                       </div>

                       <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Vendor Profile<span style="color: red"></span></label>
                        <div class="col-sm-9">
                            <input type="file" name="profile" class="form-control"  value="{{old('profile')}}">
                            <span style="color: red">{{$errors->first('profile')}}</span>
                        </div>
                       </div>

                       {{-- <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Vendor Address<span style="color: red"></span></label>
                        <div class="col-sm-9">
                           <textarea name="address" class="form-control" value="{{old('address')}}"></textarea>
                            <span style="color: red">{{$errors->first('address')}}</span>
                        </div>
                       </div> --}}

                       <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Vendor Type<span style="color: red">*</span></label>
                        <div class="col-sm-9">
                            <select name="vendor_type_id" class="form-select" required>
                                <option value="">Select Vendor Type</option>
                                @foreach ($getVendorType as $value1)
                                    <option value="{{$value1->id}}">{{$value1->name}}</option>
                                @endforeach
                            </select>
                        </div>
                       </div>

                       <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Company Name<span style="color: red"></span></label>
                        <div class="col-sm-9">
                            <input type="text" name="company_name" class="form-control"  value="{{old('company_name')}}">
                            <span style="color: red">{{$errors->first('company_name')}}</span>
                        </div>
                       </div>

                       <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Employee Id<span style="color: red"></span></label>
                        <div class="col-sm-9">
                            <input type="text" name="employee_id" class="form-control"  value="{{old('employee_id')}}">
                            <span style="color: red">{{$errors->first('employee_id')}}</span>
                        </div>
                       </div>

                       <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Category<span style="color: red">*</span></label>
                        <div class="col-sm-9">
                            <select name="category_id" class="form-select" required>
                                <option value="">Select  Category Name</option>
                                @foreach ($getCategory as $value2)
                                    <option value="{{$value2->id}}">{{$value2->name}}</option>
                                @endforeach
                            </select>
                        </div>
                       </div>

                       <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Status<span style="color: red">*</span></label>
                        <div class="col-sm-9">
                            <select name="status" class="form-select" required>
                                <option value="">Select  Status</option>
                                <option {{old('status') == '0'?"selected":""}} value="0">Active</option>
                                <option {{old('status') == '1'?"selected":""}} value="1">InActive</option>
                            </select>
                        </div>
                       </div>

                       <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Always Assign<span style="color: red">*</span></label>
                        <div class="col-sm-9">
                            <select name="always_assign" class="form-select" required>
                                <option value="">Select  Always Assign</option>
                                <option {{old('always_assign') == '0'?"selected":""}} value="0">No</option>
                                <option {{old('always_assign') == '1'?"selected":""}} value="1">Yes</option>
                            </select>
                        </div>
                       </div>

                      <div class="row mb-3">
                        <label for="" class="col-sm-3 col-form-label"></label>
                        <div class="col-sm-9">
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
