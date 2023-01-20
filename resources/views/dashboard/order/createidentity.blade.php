@extends('dashboard.layout.main')
@section('title')
<title>Dashboard</title>
@endsection
@section('content')
                    <!-- Page Heading -->
                    <div class="container">
                            <div class="mb-3">
                                <link rel="stylesheet" href="/style/progress-indication.css">
                             @include('dashboard.order.progressbar')
                            </div>

                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Row -->
                        <div class="col-lg-12">
                            <div class="container">
                            <div class="card">
                                    <div class="card-header">
                                      <h4>Create New Customer</h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="/dashboard/order/post-identity" method="POST">
                                            @csrf
                                            <div class="row">
                                                    <div class="col-md-4">
                                                    <label for="name" class="form-label">Name <span style="font-style: italic;">(required)</span></label>
                                                        <input type="text" class="form-control" id="name" name ='name' required placeholder="ex Jamal Kurniawan">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="username" class="form-label">Username <span style="font-style: italic;">(required)</span></label>
                                                        <input type="text" class="form-control" id="username" name="username" required placeholder="ex Jamal30">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="email" class="form-label">Email <span style="font-style: italic;">(required)</span></label>
                                                        <input type="text" class="form-control" id="email" name ='email' required placeholder="ex Jamal@gmail.com">
                                                    </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 mt-3">
                                                    <label for="password" class="form-label">Password <span style="font-style: italic;">(required)</span></label>
                                                    <input type="password" class="form-control" id="password" name ='password' required placeholder="***********">
                                                </div>
                                                <div class="col-md-4 mt-3">
                                                    <label for="telp" class="form-label">Telp <span style="font-style: italic;">(required)</span> </label>
                                                    <input type="text" class="form-control" id="telp" name ='telp' required placeholder="ex 0123123123">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4 mt-3">
                                                    <label for="birthdate" class="form-label">Birthdate </label>
                                                    <input type="date" class="form-control" id="birthdate" name ='birthdate'  placeholder="ex Jamal">
                                                </div>

                                                <div class="col-md-4 mt-3">
                                                    <label for="jk" class="form-label">Jenis kelamin </label>
                                                    <select class="form-select" name="jk" id="jk">
                                                        <option selected value="?"> Pilih Jenis Kelamin </option>
                                                        <option value="L">Pria</option>
                                                        <option value="P">Wanita</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 mt-3">
                                                    <label for="job" class="form-label">Job </label>
                                                  <input type="text" name="job" id="job" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-7 mt-3">
                                                    <label for="address" class="form-label">Address</label>
                                                    {{-- <input type="text" class="form-control" id="address" name ='address'  placeholder="ex Jamal"> --}}
                                                    <textarea name="address" id="address" class="form-control" cols="50" rows="2"></textarea>
                                                </div>

                                            </div>

                                            <button class="btn btn-dark mt-4" type="submit"> SUBMIT </button>
                                        </form>
                                    </div>
                                </div>
                        </div>
                        </div>

                </div>

@endsection
            <!-- End of Main Content -->
