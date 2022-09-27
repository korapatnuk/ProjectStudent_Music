@extends('layouts.index')

@section('content')
    <div class="container">
        <main>
            <div class="py-5 text-center">
                <h2 class="fs-1 fw-bold is-font text-white">สมัครสมาชิก</h2>
            </div>
            <form class="needs-validation" novalidate="">
                <div class="row mb-3 p-3" style="background-color: rgba(255,255,255,.8)">
                    <div class="col-md-12 col-lg-8">
                        <h4 class="mb-3">Billing address</h4>
                        <div class="row g-3">

                            <div class="col-12">
                                <label for="username" class="form-label">Username</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text">@</span>
                                    <input type="text" class="form-control" id="username" placeholder="Username"
                                        required="">
                                    <div class="invalid-feedback">
                                        Your username is required.
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="email" class="form-label">รหัสผ่าน </label>
                                <input type="email" class="form-control" id="email" placeholder="รหัสผ่าน">
                                <div class="invalid-feedback">
                                    Please enter a valid email address for shipping updates.
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="email" class="form-label">ยืนยันรหัสผ่าน </label>
                                <input type="email" class="form-control" id="email" placeholder="ยืนยันรหัสผ่าน">
                                <div class="invalid-feedback">
                                    Please enter a valid email address for shipping updates.
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="address" class="form-label">ชื่อ</label>
                                <input type="text" class="form-control" id="address" placeholder="ชื่อ"
                                    required="">
                                <div class="invalid-feedback">

                                </div>
                            </div>
                            <div class="col-12">
                                <label for="address" class="form-label">นามสกุล</label>
                                <input type="text" class="form-control" id="address" placeholder="นามสกุล"
                                    required="">
                                <div class="invalid-feedback">

                                </div>
                            </div>
                            <div class="col-12">
                                <label for="address2" class="form-label">เบอร์โทรศัพท์ </label>
                                <input type="text" class="form-control" id="address2" placeholder="เบอร์โทรศัพท์">
                            </div>
                            <div class="col-12">
                                <label for="address2" class="form-label">E-mail </label>
                                <input type="text" class="form-control" id="address2" placeholder="E-mail">
                            </div>


                            <div class="col-12">
                                <div class="form-check">
                                    <input id="credit" name="paymentMethod" type="radio" class="form-check-input"
                                        checked="" required="">
                                    <label class="form-check-label" for="credit">ชาย</label>
                                </div>
                                <div class="form-check">
                                    <input id="debit" name="paymentMethod" type="radio" class="form-check-input"
                                        required="">
                                    <label class="form-check-label" for="debit">หญิง</label>
                                </div>

                            </div>
                            <div class="col-12">
                                <label for="address2" class="form-label">ที่อยู่</label>
                                <input type="text" class="form-control" id="address2" placeholder="ที่อยู่">
                            </div>
                            <div class="col-lg-12">
                                <label for="country" class="form-label">จังหวัด</label>
                                <select class="form-select" id="country" required="">
                                    <option value="">จังหวัด</option>
                                    <option>United States</option>
                                </select>
                                <div class="invalid-feedback">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <input class="form-control" type="file" accept="image/*" onchange="loadFile(event)">
                        <img class="img-thumbnail mt-3" id="output" />
                    </div>

                    <button class="mb-3 w-100 btn btn-warning btn-lg" type="submit">ยืนยัน</button>
                </div>
            </form>

        </main>
    </div>
@endsection
@push('js')
    <script type="text/javascript">
        var loadFile = function(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('output');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        };
    </script>
@endpush
