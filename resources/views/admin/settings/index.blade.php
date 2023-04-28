@extends('layouts.admin.app')
@section('title')
الاعدادات
@endsection
@section('content')
<main class="app sidebar-mini rtl">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> الاعدادات </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i><a href="{{ route('admin.dashboard') }}"></a>
            </li>
            <li class="breadcrumb-item"><a href="{{ route('settings.index') }}" title="الاعدادات">الاعدادات</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <form enctype="multipart/form-data" method="post" action="{{ route('settings.update', 'test') }}">
                        @csrf

                        <div class="col-md-12 border-right-2 border-right-blue-400">

                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="col-lg-2 col-form-label font-weight-semibold">عبارة
                                            الترحيب<span class="text-danger">*</span></label>
                                        <div class="col-lg-9">
                                            <input name="welcome_title" value="{{ $setting['welcome_title'] }}" required
                                                type="text" class="form-control" placeholder="Welcome Title">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-lg-2 col-form-label font-weight-semibold">رسالة
                                            ترحيبيه<span class="text-danger">*</span></label>
                                        <div class="col-lg-9">
                                            <input name="welcome_subject" value="{{ $setting['welcome_subject'] }}"
                                                required type="text" class="form-control" placeholder="Welcome subject">
                                        </div>
                                    </div>
                                </div>
                            </div>


                            {{-- <div class="form-group ">
                                <label class="col-lg-2 col-form-label font-weight-semibold"><span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <input name="content_question" value="{{ $setting['content_question'] }}" required
                                        type="text" class="form-control" placeholder="Content Question">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="col-lg-2 col-form-label font-weight-semibold">Content answer<span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <input name="content_answer" value="{{ $setting['content_answer'] }}" required
                                        type="text" class="form-control" placeholder="Content answer">
                                </div>
                            </div> --}}
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="col-lg-2 col-form-label font-weight-semibold"> رؤيتنا <span
                                                class="text-danger">*</span></label>
                                        <div class="col-lg-9">
                                            <input name="our_vision" value="{{ $setting['our_vision'] }}" required
                                                type="text" class="form-control" placeholder="Our vision">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-lg-2 col-form-label font-weight-semibold"> هدفنا <span
                                                class="text-danger">*</span></label>
                                        <div class="col-lg-9">
                                            <input name="our_mission" value="{{ $setting['our_mission'] }}" required
                                                type="text" class="form-control" placeholder="Our mission">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="col-lg-2 col-form-label font-weight-semibold"> العنوان<span
                                                class="text-danger">*</span></label>
                                        <div class="col-lg-9">
                                            <input name="address" value="{{ $setting['address'] }}" required type="text"
                                                class="form-control" placeholder="Address">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-lg-2 col-form-label font-weight-semibold"> البريد
                                            الالكتروني<span class="text-danger">*</span></label>
                                        <div class="col-lg-9">
                                            <input name="email" value="{{ $setting['email'] }}" required type="text"
                                                class="form-control" placeholder="Email">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="col-lg-2 col-form-label font-weight-semibold"> الهاتف<span
                                                class="text-danger">*</span></label>
                                        <div class="col-lg-9">
                                            <input name="phone" value="{{ $setting['phone'] }}" required type="text"
                                                class="form-control" placeholder="Phone">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-lg-2 col-form-label font-weight-semibold"> انستجرام<span
                                                class="text-danger">*</span></label>
                                        <div class="col-lg-9">
                                            <input name="instgram" value="{{ $setting['instgram'] }}" required
                                                type="text" class="form-control" placeholder="Instagram">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="col-lg-2 col-form-label font-weight-semibold"> الفيس بوك<span
                                                class="text-danger">*</span></label>
                                        <div class="col-lg-9">
                                            <input name="facebook" value="{{ $setting['facebook'] }}" required
                                                type="text" class="form-control" placeholder="Facebook">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-lg-2 col-form-label font-weight-semibold"> اليوتيوب<span
                                                class="text-danger">*</span></label>
                                        <div class="col-lg-9">
                                            <input name="youtube" value="{{ $setting['youtube'] }}" required type="text"
                                                class="form-control" placeholder="Youtube">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="col-lg-2 col-form-label font-weight-semibold"> تويتر<span
                                                class="text-danger">*</span></label>
                                        <div class="col-lg-9">
                                            <input name="twitter" value="{{ $setting['twitter'] }}" required type="text"
                                                class="form-control" placeholder="Twiter">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-lg-2 col-form-label font-weight-semibold"> تليجرام<span
                                                class="text-danger">*</span></label>
                                        <div class="col-lg-9">
                                            <input name="telegram" value="{{ $setting['telegram'] }}" required
                                                type="text" class="form-control" placeholder="Telegram">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tile-footer">
                            <button class="btn btn-primary" type="submit">تعديل</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</main>
@endsection
