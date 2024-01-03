@extends('admin.main-template')
{{-- @section('page_name', 'Pet Approval') --}}
@section('breadcrumb1', 'Pet')
@section('breadcrumb2', 'Approval')
@section('main_content')
  <x-error />
  <x-pet-approval />
@endsection