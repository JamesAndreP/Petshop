@extends('main-template')
@section('page_name', 'Pet Category')
@section('breadcrumb1', 'Pet')
@section('breadcrumb2', 'Category')
@section('main_content')
  <x-error />
  <x-pet-category />
@endsection