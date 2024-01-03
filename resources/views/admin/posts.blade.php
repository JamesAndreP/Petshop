@extends('admin.main-template')
@section('page_name', 'View Posts')
@section('breadcrumb1', 'View')
@section('breadcrumb2', 'Posts')
@section('main_content')
  <x-error />
  <x-admin-posts />
@endsection