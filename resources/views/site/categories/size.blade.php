@extends('layouts.site.app')

@section('title')

- جدول المقاسات 
@endsection

@section('content')

<section class="container">

    <img src="{{ $size->image_url }}" title="{{ $size->name }}" alt="{{ $size->name }}" width="600" height="600">

  
</section>

@endsection
