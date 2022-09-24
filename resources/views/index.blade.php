@extends('layouts.index')


@section('content')
    <div class="px-4 py-5 my-5 text-center is-font">
        <div class="d-flex justify-content-center m-5 gap-2 flex-column">
            <div><span class="text-white p-2 bg-dark fs-1" style="margin-left: -215px;">หาวงดนตรีได้ง่ายๆ</span></div>
            <div><span class="text-white p-2 bg-dark fs-1">หาเพลงฟังใหม่ๆ ได้ง่ายๆ</span> </div>
        </div>
        <div class="col-lg-6 mx-auto">
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                <form class="row g-3">
                    <div class="col-auto">
                        <input style="width: 338px;" type="text" class="form-control-lg" id="artis_name"
                            placeholder="ชื่อวงดนตรี/นักร้อง/นักดนตรี">
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-lg btn-warning mb-3">ค้นหาศิลปินเลย</button>
                    </div>
                </form>

            </div>
        </div>
        <div>
            <button type="button" class="btn btn-warning btn-lg px-4 gap-3">สร้างโปรไฟล์วงดนตรี</button>
        </div>
    </div>
    <div class="container">
        <div class="fs-4 d-inline-block p-2 text-white" style="background-color: rgba(0,0,0,.6)">ยอดนิยม</div>
        <div class="fs-4 p-2 slide-container" style="background-color: rgba(0,0,0,.6)">
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
