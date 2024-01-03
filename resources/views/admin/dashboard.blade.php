@extends('admin.main-template')
@section('page_name', 'Dashboard')
@section('breadcrumb1', 'Home')
@section('breadcrumb2', 'Dashboard')
@section('main_content')
    <x-dashboard-items />
@endsection