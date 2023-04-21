@extends('layouts.master')

@section('title')
{{ __('New Doctor') }}
@endsection

@section('content')
    <div class="row">
      <div class="col">
         @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
      </div>
      
    </div>
    <div class="row justify-content-center">
                  

        <div class="col-md-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">{{ __('New Doctor') }}</h6>
                </div>
                <div class="card-body">
                 <form method="post" action="{{ route('doctor.create') }}">
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">{{ __('sentence.Full Name') }}<font color="red">*</font></label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputEmail3" name="name">
                        {{ csrf_field() }}
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">{{ __('sentence.Email Adress') }}<font color="red">*</font></label>
                      <div class="col-sm-9">
                        <input type="email" class="form-control" id="inputPassword3" name="email">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">{{ __('Age') }}<font color="red">*</font></label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="age" name="age" autocomplete="off">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">{{ __('sentence.Phone') }}</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputPassword3" name="phone">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">{{ __('sentence.Gender') }}<font color="red">*</font></label>
                      <div class="col-sm-9">
                        <select class="form-control" name="gender">
                          <option value="Male">{{ __('sentence.Male') }}</option>
                          <option value="Female">{{ __('sentence.Female') }}</option>
                        </select>
                      </div>
                    </div>
                    
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">{{ __('Designation') }}</label>
                      <div class="col-sm-9">
                        <textarea class="form-control" id="designation" name="designation" placeholder="Designation"></textarea>
                      </div>
                    </div>
                    
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">{{ __('Speciality') }}</label>
                      <div class="col-sm-9">
                        <textarea class="form-control" id="speciality" name="speciality" placeholder="Your Speciality"></textarea>
                      </div>
                    </div>
                    
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">{{ __('Details') }}</label>
                      <div class="col-sm-9">
                        <textarea class="form-control" id="details" name="details" placeholder="Your professional career details"></textarea>
                      </div>
                    </div>
                    
                     <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">{{ __('Experience') }}</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="experience" name="experience">
                      </div>
                    </div>
                    
                    <div class="form-group row">
                  <label for="Sunday" class="col-sm-4 col-md-3 col-form-label">{{ __('sentence.Sunday') }}</label>
                  <div class="col-sm-4 col-md-4" >
                     <input type="time" class="form-control" id="Sunday" name="sunday_from" value="{{ App\Setting::get_option('sunday_from') }}">
                  </div>
                  <div class="col-sm-4 col-md-4">
                     <input type="time" class="form-control" id="Sunday" name="sunday_to" value="{{ App\Setting::get_option('sunday_to') }}">
                  </div>
               </div>
               <div class="form-group row">
                  <label for="Monday" class="col-sm-4 col-md-3 col-form-label">{{ __('sentence.Monday') }}</label>
                  <div class="col-sm-4 col-md-4" >
                     <input type="time" class="form-control" id="Monday" name="monday_from" value="{{ App\Setting::get_option('monday_from') }}">
                  </div>
                  <div class="col-sm-4 col-md-4">
                     <input type="time" class="form-control" id="Monday" name="monday_to" value="{{ App\Setting::get_option('monday_to') }}">
                  </div>
               </div>
               <div class="form-group row">
                  <label for="Tuesday" class="col-sm-4 col-md-3 col-form-label">{{ __('sentence.Tuesday') }}</label>
                  <div class="col-sm-4 col-md-4" >
                     <input type="time" class="form-control" id="Tuesday" name="tuesday_from" value="{{ App\Setting::get_option('tuesday_from') }}">
                  </div>
                  <div class="col-sm-4 col-md-4">
                     <input type="time" class="form-control" id="Tuesday" name="tuesday_to" value="{{ App\Setting::get_option('tuesday_to') }}">
                  </div>
               </div>
               <div class="form-group row">
                  <label for="Wednseday" class="col-sm-4 col-md-3 col-form-label">{{ __('sentence.Wednseday') }}</label>
                  <div class="col-sm-4 col-md-4" >
                     <input type="time" class="form-control" id="Wednseday" name="wednesday_from" value="{{ App\Setting::get_option('wednesday_from') }}">
                  </div>
                  <div class="col-sm-4 col-md-4">
                     <input type="time" class="form-control" id="Wednseday" name="wednesday_to" value="{{ App\Setting::get_option('wednesday_to') }}">
                  </div>
               </div>
               <div class="form-group row">
                  <label for="Thurday" class="col-sm-4 col-md-3 col-form-label">{{ __('sentence.Thurday') }}</label>
                  <div class="col-sm-4 col-md-4" >
                     <input type="time" class="form-control" id="Thurday" name="thursday_from" value="{{ App\Setting::get_option('thursday_from') }}">
                  </div>
                  <div class="col-sm-4 col-md-4">
                     <input type="time" class="form-control" id="Thurday" name="thursday_to" value="{{ App\Setting::get_option('thursday_to') }}">
                  </div>
               </div>
               <div class="form-group row">
                  <label for="Friday" class="col-sm-4 col-md-3 col-form-label">{{ __('sentence.Friday') }}</label>
                  <div class="col-sm-4 col-md-4" >
                     <input type="time" class="form-control" id="Friday" name="friday_from" value="{{ App\Setting::get_option('friday_from') }}">
                  </div>
                  <div class="col-sm-4 col-md-4">
                     <input type="time" class="form-control" id="Friday" name="friday_to" value="{{ App\Setting::get_option('friday_to') }}">
                  </div>
               </div> 
               
               <div class="form-group row">
                  <label for="Friday" class="col-sm-4 col-md-3 col-form-label">{{ __('Saturday') }}</label>
                  <div class="col-sm-4 col-md-4" >
                     <input type="time" class="form-control" id="saturday_from" name="saturday_from" value="{{ App\Setting::get_option('saturday_from') }}">
                  </div>
                  <div class="col-sm-4 col-md-4">
                     <input type="time" class="form-control" id="saturday_to" name="saturday_to" value="{{ App\Setting::get_option('saturday_to') }}">
                  </div>
               </div> 
                    
                   
                   
                    <div class="form-group row">
                      <div class="col-sm-9">
                        <button type="submit" class="btn btn-primary">{{ __('sentence.Save') }}</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            
        </div>

    </div>

@endsection

@section('header')

@endsection

@section('footer')

@endsection
