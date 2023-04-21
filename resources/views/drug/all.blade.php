@extends('layouts.master')

@section('title')
{{ __('sentence.All Drugs') }}
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
            <h6 class="m-0 font-weight-bold text-primary w-75 p-2">{{ __('sentence.All Drugs') }}</h6>
         </div>
         <div class="col-4">
            <a href="{{ route('drug.create') }}" class="btn btn-primary float-right"><i class="fa fa-plus"></i> {{ __('sentence.Add Drug') }}</a>
         </div>
      </div>
   </div>
   <div class="card-body">
      <div class="table-responsive">
         <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
               <tr>
                  <th>ID</th>
                  <th>{{ __('sentence.Trade Name') }}</th>
                  <th>{{ __('sentence.Generic Name') }}</th>
                  <th class="text-center">{{ __('sentence.Actions') }}</th>
               </tr>
            </thead>
            <tbody>
               @foreach($drugs as $drug)
               <tr>
                  <td>{{ $drug->id }}</td>
                  <td>{{ $drug->trade_name }}</td>
                  <td>{{ $drug->generic_name }}</td>
                  <td class="text-center">
                     <a href="{{ url('drug/edit/'.$drug->id) }}" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-pencil"></i></a>
                     <a href="{{ url('drug/delete/'.$drug->id) }}" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></a>
                  </td>
               </tr>
               @endforeach
            </tbody>
         </table>
      </div>
   </div>
</div>
@endsection