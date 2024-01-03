@extends('admin.main-template')
{{-- @section('page_name', 'Pet Approval') --}}
@section('breadcrumb1', 'Services')
@section('breadcrumb2', 'Management')
@section('main_content')
<x-error />
<x-admin-services />
@endsection