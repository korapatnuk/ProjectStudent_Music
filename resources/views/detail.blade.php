@extends('layouts.index')
@push('css')

    <style>
        .slick-slide img {
            display: block;
            object-fit: cover;
            width: 100%;
        }

        .slick-prev:before {
            content: "" !important;
            background-image: url(/plugins/slick-slide/right-arrow.png);
            background-size: contain;
            background-repeat: no-repeat;
            display: inline-block;
            width: 41px;
            height: 49px;
            margin-top: -40px;
            margin-left: -16px;
            transform: rotate(180deg);
        }

        .slick-next:before {
            content: "" !important;
            background-image: url(/plugins/slick-slide/right-arrow.png);
            background-size: contain;
            background-repeat: no-repeat;
            display: inline-block;
            width: 40px;
            height: 89px;
            margin-top: -25px;
            margin-left: -9px;
        }
    </style>
@endpush
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-3">
                <div class="text-center">
                    <img src="https://dummyimage.com/250" class="m-auto" alt="" srcset="">
                </div>
                <div class="text-white text-center">TOP</div>
                <div class="text-white text-center">ANATOMY RABBIT</div>
            </div>
            <div class="col-lg-6 ">
                <div class="p-1 rounded" style="background-color: rgba(255,255,255, .8)">
                    123
                </div>
                <div class="row mt-3">
                    <div class="col-lg-12">
                        <div class="container">
                            <div class="fs-4 d-inline-block p-2 text-white">ยอดนิยม</div>
                            <div class="p-2 slide-container">
                                <div class="slide-item d-inline-block mx-1 ">
                                    <div class="text-center">
                                        <img src="https://dummyimage.com/250" class="m-auto" alt="" srcset="">
                                    </div>
                                    <div class="text-white text-center">TOP</div>
                                    <div class="text-white text-center">ANATOMY RABBIT</div>
                                </div>
                                <div class="slide-item d-inline-block mx-1">
                                    <div class="text-center">
                                        <img src="https://dummyimage.com/250" class="m-auto" alt="" srcset="">
                                    </div>
                                    <div class="text-white text-center">1</div>
                                    <div class="text-white text-center">ANATOMY RABBIT</div>
                                </div>
                                <div class="slide-item d-inline-block mx-1">
                                    <div class="text-center">
                                        <img src="https://dummyimage.com/250" class="m-auto" alt="" srcset="">
                                    </div>
                                    <div class="text-white text-center">2</div>
                                    <div class="text-white text-center">ANATOMY RABBIT</div>
                                </div>
                                <div class="slide-item d-inline-block mx-1">
                                    <div class="text-center">
                                        <img src="https://dummyimage.com/250" class="m-auto" alt="" srcset="">
                                    </div>
                                    <div class="text-white text-center">3</div>
                                    <div class="text-white text-center">ANATOMY RABBIT</div>
                                </div>
                                <div class="slide-item d-inline-block mx-1">
                                    <div class="text-center">
                                        <img src="https://dummyimage.com/250" class="m-auto" alt="" srcset="">
                                    </div>
                                    <div class="text-white text-center">4</div>
                                    <div class="text-white text-center">ANATOMY RABBIT</div>
                                </div>
                                <div class="slide-item d-inline-block mx-1">
                                    <div class="text-center">
                                        <img src="https://dummyimage.com/250" class="m-auto" alt="" srcset="">
                                    </div>
                                    <div class="text-white text-center">5</div>
                                    <div class="text-white text-center">ANATOMY RABBIT</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">3</div>
        </div>

    </div>
@endsection

@push('js')

    <script>
        $(function() {
            $('.slide-container').slick({
                infinite: true,
                slidesToShow: 4,
                slidesToScroll: 1,
                responsive: [{
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            infinite: true,
                            dots: true
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            centerMode: true,
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            centerMode: true,
                        }
                    }
                    // You can unslick at a given breakpoint now by adding:
                    // settings: "unslick"
                    // instead of a settings object
                ]
            });
        })
    </script>
@endpush
