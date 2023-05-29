@extends('layouts.site.app')

@section('title')

- تواصل معنا
@endsection

@section('content')

<section>


</section>

<div class="container mt-4 mb-5">
    <div class="page-nav row">
        <a href="/" class="text-dark pl-2">
            <i class="fa-solid fa-house-chimney"></i>
        </a>
        <a href="{{ route('Site.contactUs') }}" class="text-dark">
            <i class="fa fa-chevron-right" aria-hidden="true"></i>
            اتصل بنا
        </a>
    </div>
</div>
<section class="container text-right">

    <div class="mt-5 big-border pr-3 pt-3 pb-2 shadow d-inline-block pl-5">
        <h6>
            اتصل بنا من خلال مواقع التواصل الاجتماعى
        </h6>

        <ul class="list-unstyled d-flex mt-4 social-list ">
            <li>
                <a href="{{ $setting['facebook'] }}" class="p-3 facebook">
                    <i class="fab fa-facebook-f fa-lg"></i>
                </a>
            </li>
            <li>
                <a href="{{ $setting['phone'] }}" class="mx-3 p-3 whats">
                    <i class="fab fa-whatsapp fa-lg"></i>
                </a>
            </li>
            <li>
                <a href="{{ $setting['telegram'] }}" class="p-3 telegram">
                    <i class="fab fa-telegram fa-lg"></i>
                </a>
            </li>
        </ul>
    </div>

    <h4 class="my-5">
        خدمة العملاء - اتصل بنا
    </h4>


    <div class="env-border mb-5">


        <form action="{{route('Site.ContactUs.store')}}" method="POST" class="p-5">
            @csrf

            <div class="row">
                <div class="col-5">
                    <div class="form-group ">
                        <label for="inputName">الاسم الاول</label>
                        <input type="text" disabled value="{{auth()->user()->firstName}}" name="user_id" class="form-control ml-5 bg-light" id="inputName">
                    </div>
                    <div class="form-group ">
                        <label for="inputName">الاسم الثانى</label>
                        <input type="text" disabled value="{{auth()->user()->lastName}}" name="user_id" class="form-control ml-5 bg-light" id="inputName">
                    </div>
                    <div class="form-group ">
                        <label for="inputName">
                            عنوان البريد الالكترونى
                        </label>
                        <input type="email" disabled value="{{auth()->user()->email}}" name="user_id" class="form-control ml-5 bg-light" id="inputName">
                    </div>
                    <div class="form-group ">
                        <label for="inputName">رقم الهاتف </label>
                        <input type="text" disabled value="{{auth()->user()->phone}}" name="user_id" class="form-control ml-5 bg-light" id="inputName">
                    </div>
                </div>
                <div class="col-7">
                    <div class="form-group ">
                        <label for="inputPhone">الموضوع</label>
                        <textarea name="subject" class=" w-100 h-100 bg-light form-control" rows="11">

                        </textarea>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end mt-3">
                <button type="submit" class="btn btn-style">
                    ارسال
                </button>
            </div>

        </form>

    </div>
</section>
@endsection
