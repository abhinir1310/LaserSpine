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
                    <h6 class="m-0 font-weight-bold text-primary w-75 p-2">All Inquiry</h6>
                </div>
                <div class="col-4">
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
                      <th class="text-center">Subject</th>
                      <th class="text-center">Message</th>
                      <th class="text-center">Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($inquiry as $val)
                    <tr>
                      <td>{{ $val->id }}</td>
                      <td class="text-center">{{ $val->name }} </td>
                      
                      <td class="text-center"> {{ $val->email }} </td>
                      <td class="text-center"> {{ $val->subject }} </td>
                      <td class="text-center"> {{ $val->messages }} </td>
                      <td class="text-center">{{ $val->created_at->diffForHumans() }}</td>
                    </tr>
                    @endforeach
                   
                  </tbody>
                </table>
              </div>
            </div>
          </div>
@endsection
