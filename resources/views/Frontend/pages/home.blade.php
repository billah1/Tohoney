@extends('Frontend.layouts.master')

@section('frontendtitle')
  Home Page
@endsection

@section('frontend_content')
     @include('Frontend.pages.widgets.slider')
     @include('Frontend.pages.widgets.featured')
     @include('Frontend.pages.widgets.countdown')
     @include('Frontend.pages.widgets.best-seller')
     @include('Frontend.pages.widgets.latest')
     @include('Frontend.pages.widgets.testmonial')

@endsection
