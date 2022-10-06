@extends('layouts.index')
@push('css')
    <link rel="stylesheet" href="/plugins/calendar/main.css">

    <style>
        .fc-header-toolbar {
            gap: 3px;
        }

        .fc .fc-toolbar-title {
            font-size: 1.15em;
            white-space: nowrap;
            color: #fff;
        }

        .fc-col-header,
        .fc-day {
            background-color: #fff !important;
        }

        .fc-day-today {
            background-color: #ccc !important
        }

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
                    <img src="{{ $item->getImage }}" style="width:280px; height:250px; object-fit:cover" class="m-auto"
                        alt="" srcset="">
                </div>
                <div class="text-white text-center">TOP</div>
                <div class="text-white text-center">{{ $item->aname }}</div>
                @if (auth()->check())
                    @if (auth()->user()->id == $item->member_id)
                        <div class="text-white text-center"><a href="#" class="btn btn-xs btn-info">แก้ไขข้อมูล</a>
                        </div>
                        <div class="text-white text-center mt-2"><a href="{{ route('logout') }}"
                                class="btn btn-xs btn-info">ออกจากระบบ</a></div>
                    @endif
                @endif
            </div>
            <div class="col-lg-6 ">
                <div class="p-1 rounded" style="background-color: rgba(255,255,255, .8)">

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane"
                                aria-selected="true">รายละเอียด</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                data-bs-target="#profile-tab-pane" type="button" role="tab"
                                aria-controls="profile-tab-pane" aria-selected="false">รีวิว</button>
                        </li>

                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
                            tabindex="0">
                            {{ $item->details }}
                        </div>
                        <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab"
                            tabindex="0">...</div>

                    </div>

                </div>
                <div class="row mt-3">
                    <div class="col-lg-12">
                        <div class="container">
                            <div class="fs-4 d-inline-block p-2 text-white">วีดีโอ
                                @if (auth()->check())
                                    @if (auth()->user()->id == $item->member_id)
                                        <a href="{{ url('/arists/' . $item->id . '/add-video') }}"
                                            class="btn btn-xs btn-info">เพิ่มวีดีโอ</a>
                                    @endif
                                @endif

                            </div>
                            <div class="p-2 slide-container">
                                @foreach ($item->videos as $v)
                                    <div class="slide-item d-inline-block mx-1 ">
                                        <iframe width="141" height="141" src="{{ $v->url_youtube }}" title=""
                                            frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen></iframe>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div id="calendar"></div>
                @if (auth()->check())
                    @if ($item->member_id != auth()->user()->id)
                        <a href="#" id="event_action" class="btn btn-primary mt-3" style="margin:auto">จอง</a>
                    @endif
                @endif
            </div>
        </div>

    </div>
@endsection

@push('js')
    <script src="/plugins/calendar/main.js"></script>
    <script>
        var date_event_select = null;
        $(function() {

            $(document).on('click', '#event_action', function() {
                if (date_event_select == null) {
                    Swal.fire('แจ้งเตือน', 'กรุณาเลือกวันที่ๆ ต้องการจอง', 'warning')
                    return false;
                }

                Swal.fire({
                    title: 'ต้องการจองวันที่เลือกนี้หรือไม่?',
                    text: 'ท่านได้เลือกวันที่ ' + date_event_select.dateStr,
                    showCancelButton: true,
                    confirmButtonText: 'ตกลง',
                }).then(function(result) {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        Swal.fire('กำลังทำรายการกรุณารอสักครู่', '', 'warning')
                        Swal.showLoading();
                        $.ajax({
                                method: "POST",
                                url: "{{url('arists/'. $item->id . '/event')}}",
                                data: {
                                    event_date: date_event_select.dateStr
                                }
                            })
                            .done(function(msg) {
                                Swal.fire('แจ้งเตือน','ทำรายการเรียบร้อยแล้ว', 'success')
                                Swal.hideLoading();
                            });
                    }
                })
            })
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
                ],

            });
        })
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                // height: '100%',
                expandRows: true,
                slotMinTime: '08:00',
                slotMaxTime: '20:00',
                dateClick: function(info) {
                    console.log(info)
                    date_event_select = info
                },
                locale: 'th-TH',
                headerToolbar: {
                    left: 'prev,next',
                    center: 'title',
                    right: 'dayGridMonth'
                },
                initialView: 'dayGridMonth',
                // navLinks: true, // can click day/week names to navigate views
                // editable: true,
                selectable: true,
                nowIndicator: true,
                dayMaxEvents: true, // allow "more" link when too many events
                events: [
                    //   {
                    //     title: 'All Day Event',
                    //     start: '2020-09-01',
                    //   },
                    //   {
                    //     title: 'Long Event',
                    //     start: '2020-09-07',
                    //     end: '2020-09-10'
                    //   },
                    //   {
                    //     groupId: 999,
                    //     title: 'Repeating Event',
                    //     start: '2020-09-09T16:00:00'
                    //   },
                    //   {
                    //     groupId: 999,
                    //     title: 'Repeating Event',
                    //     start: '2020-09-16T16:00:00'
                    //   },
                    //   {
                    //     title: 'Conference',
                    //     start: '2020-09-11',
                    //     end: '2020-09-13'
                    //   },
                    //   {
                    //     title: 'Meeting',
                    //     start: '2020-09-12T10:30:00',
                    //     end: '2020-09-12T12:30:00'
                    //   },
                    //   {
                    //     title: 'Lunch',
                    //     start: '2020-09-12T12:00:00'
                    //   },
                    //   {
                    //     title: 'Meeting',
                    //     start: '2020-09-12T14:30:00'
                    //   },
                    //   {
                    //     title: 'Happy Hour',
                    //     start: '2020-09-12T17:30:00'
                    //   },
                    //   {
                    //     title: 'Dinner',
                    //     start: '2020-09-12T20:00:00'
                    //   },
                    //   {
                    //     title: 'Birthday Party',
                    //     start: '2020-09-13T07:00:00'
                    //   },
                    //   {
                    //     title: 'Click for Google',
                    //     url: 'http://google.com/',
                    //     start: '2020-09-28'
                    //   }
                ]
            });

            calendar.render();
        });
    </script>
@endpush
