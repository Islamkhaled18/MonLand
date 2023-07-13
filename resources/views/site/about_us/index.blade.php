@extends('layouts.site.app')

@section('title')
-  عن المنظمة
@endsection

@section('content')
<section>


</section>

<div class="container mt-4 mb-5">
    <div class="page-nav row">
        <a href="/" class="text-dark pl-2">
            <i class="fa-solid fa-house-chimney"></i>
        </a>
        <a href="#" class="text-dark">
            <i class="fa fa-chevron-right" aria-hidden="true"></i>
            عن منظمة كيان
        </a>
    </div>
</div>
<section class="container text-right">


    <h4 class="my-5">
         من نحن ؟
    </h4>


    @foreach ($about_us as $about)
    <div class="env-border mb-5">
        {!! $about->text !!}

    </div>
    @endforeach
</section>
@endsection
