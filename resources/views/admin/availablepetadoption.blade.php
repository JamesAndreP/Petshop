@extends('admin.main-template')
{{-- @section('page_name', 'Pet Approval') --}}
@section('breadcrumb1', 'Available Pet')
@section('breadcrumb2', 'Adoption')
@section('main_content')
<x-error />
<x-available-pet-adoption />
@endsection