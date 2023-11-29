@extends('layouts.app')

@section('title', 'Contact Page')

@section('content')

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d245368.2610494859!2d107.93803973954033!3d16.071763492683953!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314219c792252a13%3A0x1df0cb4b86727e06!2zxJDDoCBO4bq1bmcsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1666947416840!5m2!1svi!2s"
                    width="100%" height="620" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                <div class="icon">
                    <i class="fa fa-map-maker">
                    </i>
                </div>
            </div>
            <div class="col-lg-4 p-3">
                <h4 class="text-center mb-3">Về chúng tôi</h4>
                <div class="alert alert-secondary shadow-5 d-flex fw-bold" role="alert">
                    <i class="fa-solid fa-location-dot" style="font-size: 25px;"></i>
                    <div style="margin-left: 70px;">
                        Địa chỉ : Da Nang, Viet Nam
                    </div>
                </div>
                <div class="alert alert-secondary shadow-5 d-flex fw-bold" role="alert">
                    <i class="fa-solid fa-phone" style="font-size: 25px;"></i>
                    <div style="margin-left: 70px;">
                        Số điện thoại : + 01 234 567 88
                    </div>
                </div>
                <div class="alert alert-secondary shadow-5 d-flex fw-bold" role="alert">
                    <i class="fa-solid fa-envelope" style="font-size: 25px;"></i>
                    <div style="margin-left: 70px;">
                        Email : info@example.com
                    </div>
                </div>

                <h4 class="text-center mt-5 mb-3">Đặt câu hỏi</h4>
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <input type="text" id="form3Example1" class="form-control" />
                                <label class="form-label" for="form3Example1">Họ tên</label>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <input type="email" id="form3Example3" class="form-control" />
                                <label class="form-label" for="form3Example3">Email</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-outline">
                                <textarea class="form-control" id="textAreaExample" rows="4"></textarea>
                                <label class="form-label" for="textAreaExample">Câu hỏi ?</label>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-success mt-4">Gửi</button>
                </form>
            </div>
        </div>
    </div>

@endsection
