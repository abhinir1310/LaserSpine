@extends('layouts.master')

@section('title')
{{ __('All Doctors') }}
@endsection

@section('content')

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

   <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
               <div class="row">
                <div class="col-8">
                    <h6 class="m-0 font-weight-bold text-primary w-75 p-2">{{ __('All Doctors') }}</h6>
                </div>
                <div class="col-4">
                  <a href="{{ route('doctor.create') }}" class="btn btn-primary float-right"><i class="fa fa-plus"></i> {{ __('New Doctor') }}</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>{{ __('Name') }}</th>
                      <th class="text-center">{{ __('Email') }}</th>
                      <th class="text-center">{{ __('Contact No') }}</th>
                      <th class="text-center">{{ __('Speciality') }}</th>
                      <th class="text-center">{{ __('Experience') }}</th>
                      <th class="text-center">{{ __('sentence.Date') }}</th>
                      <th class="text-center">{{ __('sentence.Actions') }}</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($doctors as $val)
                    <tr>
                      <td>{{ $val->id }}</td>
                      <td class="text-center">{{ $val->name }} </td>
                      
                      <td class="text-center"> {{ $val->email }} </td>
                      <td class="text-center"> {{ $val->phone }} </td>
                      <td class="text-center"> {{ $val->speciality }} </td>
                      <td class="text-center"> {{ $val->experience }} </td>
                      <td class="text-center">{{ $val->created_at->format('d M Y H:i') }}</td>
                      <td class="text-center">
                        <a href="{{ url('doctor/view/'.$val->id) }}" class="btn btn-success btn-circle btn-sm"><i class="fa fa-eye"></i></a>
                        <a href="{{ url('doctor/edit/'.$val->id) }}" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-pencil"></i></a>
                        <a href="{{ url('doctor/delete/'.$val->id) }}" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></a>
                      </td>
                    </tr>
                    @endforeach
                   
                  </tbody>
                </table>
              </div>
            </div>
          </div>
@endsection
