@extends('admin.main-template')
{{-- @section('page_name', 'Pet Approval') --}}
@section('breadcrumb1', 'Adopted')
@section('breadcrumb2', 'Pets')
@section('main_content')
<x-error />
<x-adopted-pets />
@endsection