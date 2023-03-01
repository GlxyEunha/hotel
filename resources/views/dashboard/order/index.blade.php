@extends('dashboard.layout.main')
@section('title')
<title>Dashboard | Order</title>
@endsection
@section('content')
{{-- < Page Heading --> --}}
                    <div class="container-fluid">
                        <h1 class="h3 mb-2 text-gray-800">Data Transactions Active</h1>
                            <p class="mb-4">Semua data transaction yang akan mendatang atau aktif</p>
                        <div class="modal fade" id="modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                        aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Have any account?</h5>
                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="d-flex justify-content-center">
                                        <a class="btn btn-sm btn-primary m-1"
                                            href="/dashboard/order/create-identity">No, create
                                            new account!</a>
                                        <a class="btn btn-sm btn-success m-1"
                                            href="/dashboard/order/pick">Yes, use
                                            their account!</a>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    </div>

                    <!-- Content Row -->
                    <div class="container-fluid">
                    {{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p> --}}

                        <div class="card">
                            <div class="card-header">
                                <div class="col-md-6">
                                    <div class="d-sm-flex align-items-center">
                                        <a class="d-none d-sm-inline-block btn btn-sm btn-white" href="#" data-toggle="modal" data-target="#modal">
                                            <i class="fas fa-plus"></i>
                                        </a>
                                        <a href="order/history" class="d-none d-sm-inline-block btn btn-sm btn-white ms-1 "><i class="fa fa-history"></i></a>
                                        <a href="order/history-pay" class="d-none d-sm-inline-block btn btn-sm btn-white ms-1 "><i class="fas fa-money-bill-wave"></i></a>
                                    </div>
                                </div>
                            </div>
                                <div class="card-body">
                                    <div class="col-md-auto">

                                        <table class="table table-striped table-bordered table-responsive" id="myTable">
                                            <thead>
                                                <tr>
                                                    <th width="4%">#</th>
                                                    <th>Customer</th>
                                                    <th>Room</th>
                                                    <th>Check in</th>
                                                    <th>Check out</th>
                                                    <th>Days</th>
                                                    <th>Total Price</th>
                                                    <th>Paid Off</th>
                                                    <th>Debt</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($transaction as $t)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $t->Customer->name ?? '-' }}</td>
                                                    <td>{{ $t->Room->no}}</td>
                                                    <td>{{ $t->check_in->isoFormat('D MMM Y') }}</td>
                                                    <td>{{ $t->check_out->isoFormat('D MMM Y') }}</td>
                                                    <td>{{ $t->check_in->diffindays($t->check_out) }} Day</td>
                                                    <td>Rp.{{ number_format($t->getTotalPrice()) }}</td>
                                                    <td>Rp. {{ number_format($t->getTotalPayment()) }}</td>
                                                    <td>Rp. {{ number_format($t->getTotalPrice() - $t->getTotalPayment()) }}</td>
                                                    <td>
                                                        @php
                                                               $insufficient = $t->getTotalPrice() - $t->getTotalPayment();
                                                        @endphp
                                                        <a @if($insufficient <= 0)
                                                        style="pointer-events: none;
                                                        cursor: default;color:gray"
                                                    @endif href="/dashboard/order/{{ $t->id }}/pay-debt"><i class="fas fa-money-bill-wave"></i></a></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Customer</th>
                                                    <th>Room</th>
                                                    <th>Check in</th>
                                                    <th>Check out</th>
                                                    <th>Days</th>
                                                    <th>Total Price</th>
                                                    <th>Paid Off</th>
                                                    <th>Debt</th>
                                                    <th>Action</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                            </div>
                    </div>


                </div>

@endsection
            <!-- End of Main Content -->
