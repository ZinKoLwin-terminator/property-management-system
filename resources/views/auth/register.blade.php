
@extends('layouts.app')
@section('content')
              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                    <p class="text-center small">Enter your personal details to create account</p>
                  </div>

                  <form class="row g-3 needs-validation" method="POST" action="{{url('register')}}" novalidate>
                    {{ csrf_field() }}
                    <div class="col-12">
                      <label  class="form-label">First Name</label>
                      <input type="text" name="name" class="form-control" value="{{old('name')}}"  required>
                      <span style="color:red">{{$errors->first('name')}}</span>

                    </div>

                    <div class="col-12">
                        <label  class="form-label">Last Name</label>
                        <input type="text" name="last_name" class="form-control" >
                        <div class="invalid-feedback">Please, enter your last name!</div>
                      </div>


                    <div class="col-12">
                      <label  class="form-label">Your Email</label>
                      <input type="email" name="email" class="form-control" value="{{old('email')}}"  required>
                      <span style="color:red">{{$errors->first('email')}}</span>
                      <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Mobile Number</label>
                        <input type="text" name="mobile" class="form-control" value="{{old('mobile')}}"   >
                        <div class="invalid-feedback">Please, enter your mobile number!</div>
                      </div>

                      <div class="col-12">
                        <label  class="form-label">Address</label>
                        <input type="text" name="address" class="form-control" value="{{old('address')}}" >
                        <div class="invalid-feedback">Please, enter your Address!</div>
                      </div>


                    <div class="col-12">
                      <label  class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" required>
                      <span style="color:red">{{$errors->first('password')}}</span>

                    </div>

                    <div class="col-12">
                        <label  class="form-label">Confirm Password</label>
                        <input type="password" name="confirm_password" class="form-control"  required>
                        <span style="color:red">{{$errors->first('confirm_password')}}</span>

                      </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" name="remember" type="checkbox" value=""  required>
                        <label class="form-check-label" >I agree and accept the <a href="#">terms and conditions</a></label>
                        <div class="invalid-feedback">You must agree before submitting.</div>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Create Account</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Already have an account? <a href="{{url('/')}}">Log in</a></p>
                    </div>
                  </form>

                </div>
              </div>

@endsection
