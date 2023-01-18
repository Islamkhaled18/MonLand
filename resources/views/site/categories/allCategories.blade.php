@extends('layouts.site.app')

@section('title')

- كل الاقسام
@endsection

@section('content')

<section class="container">

    <div class="row mt-5">
        <h4 class="text-right">
            جميع الفئات
        </h4>
        <div class="col-12 mt-4">
            <div class="row text-right">
                <div class="card col-12 border-0">
                    <div class="bg-light">
                        <h5 class="p-4 border-bottom">
                            الفئة
                        </h5>
                        <div class="row">

                            @isset($allCategories)

                            @foreach ( $allCategories as $allCategory )

                            <div class="col-4">
                                <ul class="list-unstyled px-3 py-2">
                                    <h4 class="mb-4">
                                        <a href="{{route('Site.category',$allCategory->name)}}" class="text-dark">
                                            {{ $allCategory->name }}
                                        </a>
                                    </h4>
                                    @isset($allCategory ->childrens)
                                    @foreach($allCategory->childrens as $children)
                                    <li class="my-2">
                                        <a href="{{route('Site.category',$children->name)}}" class="text-dark">{{$children ->name}}</a>
                                    </li>
                                    @endforeach

                                    @endisset
                                </ul>
                            </div>
                            @endforeach
                            @endisset

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row mb-5">

    </div>
</section>

@endsection
