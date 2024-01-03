@extends('admin.main-template')
@section('page_name', 'Pet Management')
@section('breadcrumb1', 'Pet')
@section('breadcrumb2', 'Management')
@section('main_content')
    <x-error />
    <x-pet-management />
@endsection