@extends('layouts.master')

@section('title')
{{ __('sentence.Edit Patient') }}
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
                  <h6 class="m-0 font-weight-bold text-primary">{{ __('Edit Doctor') }}</h6>
                </div>
                <div class="card-body">
                 <form method="post" action="{{ route('doctor.store_edit') }}">
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">{{ __('sentence.Full Name') }}<font color="red">*</font></label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputEmail3" name="name" value="{{$doctor->name}}">
                        <input type="hidden" class="form-control" id="inputEmail3" name="user_id" value="{{ $doctor->id }}">
                        {{ csrf_field() }}
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">{{ __('sentence.Email Adress') }}<font color="red">*</font></label>
                      <div class="col-sm-9">
                        <input type="email" class="form-control" id="inputPassword3" name="email" value="{{$doctor->email}}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">{{ __('Age') }}<font color="red">*</font></label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="age" name="age" autocomplete="off" value="{{$doctor->age}}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">{{ __('sentence.Phone') }}</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputPassword3" name="phone" value="{{$doctor->phone}}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">{{ __('sentence.Gender') }}<font color="red">*</font></label>
                      <div class="col-sm-9">
                        <select class="form-control" name="gender">
                            
                            
                            
                          <option value="Male" {{$doctor->gender == 'Male' ? "selected" : "" }}>{{ __('sentence.Male') }}</option>
                          <option value="Female" {{$doctor->gender == 'Female' ? "selected" : ""}}>{{ __('sentence.Female') }}</option>
                        </select>
                      </div>
                    </div>
                    
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">{{ __('Designation') }}</label>
                      <div class="col-sm-9">
                        <textarea class="form-control" id="designation" name="designation" placeholder="Designation">{{$doctor->designation}}</textarea>
                      </div>
                    </div>
                    
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">{{ __('Speciality') }}</label>
                      <div class="col-sm-9">
                        <textarea class="form-control" id="speciality" name="speciality" placeholder="Your Speciality">{{$doctor->speciality}}</textarea>
                      </div>
                    </div>
                    
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">{{ __('Details') }}</label>
                      <div class="col-sm-9">
                        <textarea class="form-control" id="details" name="details" placeholder="Your professional career details">{{$doctor->details}}</textarea>
                      </div>
                    </div>
                    
                     <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">{{ __('Experience') }}</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="experience" name="experience" value="{{$doctor->experience}}">
                      </div>
                    </div>
                    
                    <div class="form-group row">
                  <label for="Sunday" class="col-sm-4 col-md-3 col-form-label">{{ __('sentence.Sunday') }}</label>
                  <div class="col-sm-4 col-md-4" >
                     <input type="time" class="form-control" id="Sunday" name="sunday_from" value="{{$doctor->sunday_from}}">
                  </div>
                  <div class="col-sm-4 col-md-4">
                     <input type="time" class="form-control" id="Sunday" name="sunday_to" value="{{$doctor->sunday_to}}">
                  </div>
               </div>
               <div class="form-group row">
                  <label for="Monday" class="col-sm-4 col-md-3 col-form-label">{{ __('sentence.Monday') }}</label>
                  <div class="col-sm-4 col-md-4" >
                     <input type="time" class="form-control" id="Monday" name="monday_from" value="{{$doctor->monday_from}}">
                  </div>
                  <div class="col-sm-4 col-md-4">
                     <input type="time" class="form-control" id="Monday" name="monday_to" value="{{$doctor->monday_to}}">
                  </div>
               </div>
               <div class="form-group row">
                  <label for="Tuesday" class="col-sm-4 col-md-3 col-form-label">{{ __('sentence.Tuesday') }}</label>
                  <div class="col-sm-4 col-md-4" >
                     <input type="time" class="form-control" id="Tuesday" name="tuesday_from" value="{{$doctor->tuesday_from}}">
                  </div>
                  <div class="col-sm-4 col-md-4">
                     <input type="time" class="form-control" id="Tuesday" name="tuesday_to" value="{{$doctor->tuesday_to}}">
                  </div>
               </div>
               <div class="form-group row">
                  <label for="Wednseday" class="col-sm-4 col-md-3 col-form-label">{{ __('sentence.Wednseday') }}</label>
                  <div class="col-sm-4 col-md-4" >
                     <input type="time" class="form-control" id="Wednseday" name="wednesday_from" value="{{$doctor->wednesday_from}}">
                  </div>
                  <div class="col-sm-4 col-md-4">
                     <input type="time" class="form-control" id="Wednseday" name="wednesday_to" value="{{$doctor->wednesday_to}}">
                  </div>
               </div>
               <div class="form-group row">
                  <label for="Thurday" class="col-sm-4 col-md-3 col-form-label">{{ __('sentence.Thurday') }}</label>
                  <div class="col-sm-4 col-md-4" >
                     <input type="time" class="form-control" id="Thurday" name="thursday_from" value="{{$doctor->thursday_from}}">
                  </div>
                  <div class="col-sm-4 col-md-4">
                     <input type="time" class="form-control" id="Thurday" name="thursday_to" value="{{$doctor->thursday_to}}">
                  </div>
               </div>
               <div class="form-group row">
                  <label for="Friday" class="col-sm-4 col-md-3 col-form-label">{{ __('sentence.Friday') }}</label>
                  <div class="col-sm-4 col-md-4" >
                     <input type="time" class="form-control" id="Friday" name="friday_from" value="{{$doctor->friday_from}}">
                  </div>
                  <div class="col-sm-4 col-md-4">
                     <input type="time" class="form-control" id="Friday" name="friday_to" value="{{$doctor->friday_to}}">
                  </div>
               </div> 
               
               <div class="form-group row">
                  <label for="Friday" class="col-sm-4 col-md-3 col-form-label">{{ __('Saturday') }}</label>
                  <div class="col-sm-4 col-md-4" >
                     <input type="time" class="form-control" id="saturday_from" name="saturday_from" value="{{$doctor->saturday_from}}">
                  </div>
                  <div class="col-sm-4 col-md-4">
                     <input type="time" class="form-control" id="saturday_to" name="saturday_to" value="{{$doctor->saturday_to}}">
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
