@extends('admin.main-template')
@section('page_name', 'View Post')
@section('breadcrumb1', 'View')
@section('breadcrumb2', 'Post')
@section('main_content')
  <x-error />
  <x-admin-post :id="$id" />
@endsection