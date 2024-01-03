@extends('admin.main-template')
{{-- @section('page_name', 'Pet Approval') --}}
@section('breadcrumb1', 'Available Pet')
@section('breadcrumb2', 'Selling')
@section('main_content')
<x-error />
<x-available-pet-selling />
@endsection