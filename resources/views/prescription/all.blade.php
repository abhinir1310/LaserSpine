@extends('layouts.master')

@section('title')
{{ __('sentence.All Prescriptions') }}
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
            <h6 class="m-0 font-weight-bold text-primary w-75 p-2">{{ __('sentence.All Prescriptions') }}</h6>
         </div>
         <div class="col-4">
            <a href="{{ route('prescription.create') }}" class="btn btn-primary float-right"><i class="fa fa-plus"></i> {{ __('sentence.New Prescription') }}</a>
         </div>
      </div>
   </div>
   <div class="card-body">
      <div class="table-responsive">
         <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
               <tr>
                  <th>ID</th>
                  <th>{{ __('sentence.Patient') }}</th>
                  <th class="text-center">{{ __('sentence.Date') }}</th>
                  <th class="text-center">{{ __('sentence.Content') }}</th>
                  <th class="text-center">{{ __('sentence.Actions') }}</th>
               </tr>
            </thead>
            <tbody>
               @foreach($prescriptions as $prescription)
               <tr>
                  <td>{{ $prescription->id }}</td>
                  <td><a href="{{ url('patient/view/'.$prescription->user_id) }}"> {{ $prescription->User->name }} </a></td>
                  <td class="text-center">{{ $prescription->created_at->format('d M Y H:i') }}</td>
                  <td class="text-center"> {{ count($prescription->Drug) }} Drugs | {{ count($prescription->Test) }} Tests </td>
                  <td class="text-center">
                     <a href="{{ url('prescription/view/'.$prescription->id) }}" class="btn btn-success btn-circle btn-sm"><i class="fa fa-eye"></i></a>
                     <a href="{{ url('prescription/pdf/'.$prescription->id) }}" class="btn btn-primary btn-circle btn-sm"><i class="fas fa-print"></i></a>
                     <a href="{{ url('prescription/delete/'.$prescription->id) }}" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></a>
                  </td>
               </tr>
               @endforeach
            </tbody>
         </table>
      </div>
   </div>
</div>
@endsection