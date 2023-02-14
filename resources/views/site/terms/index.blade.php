@extends('layouts.site.app')

@section('title')
    - الشروطوالاحكام
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
                الشروط والاحكام الخاصه بموقع كيان
            </a>
        </div>
    </div>
    <section class="container text-right">


        @foreach ($terms as $term)
            <div class="env-border mb-5">
                {{ $term->name }}

            </div>
        @endforeach
    </section>
@endsection
