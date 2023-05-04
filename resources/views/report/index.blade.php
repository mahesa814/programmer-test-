@extends('layouts.app')
@section('breadcrumbs','Report')
@section('content')
<div class="d-flex gx-5">
    <div class="card card-bordered col-md-12" style="margin-left:10px;">
        <div class="card card-header">
            <h5>Report</h5>
        </div>
        <hr>
        <div>
            <div class="card-inner p-2">
                <form action="{{ route('report.index') }}" method="get">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="">Masukan Account Id</label>
                            <input type="number"  name="id" class="form-control mt-2">
                        </div>
                        <div class="col-md-3">
                            <label for="">Start Date</label>
                            <input type="date"  name="start_date" value="{{ $start_date }}" class="form-control mt-2">
                        </div>
                        <div class="col-md-3">
                            <label for="">Masukan Account Id</label>
                            <input type="date"  name="end_date" value="{{ $end_date }}" class="form-control mt-2">
                        </div>
                        <div class="col-md-6 mt-2">
                            <label for=""></label>
                            <button name="search" class="btn btn-primary col-md-2">Cari</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <hr>
        <div class="card-inner p-2">
            <span>AccountId : {{ $id ?? 'Belom Di isi'}} , StartDate : {{ $start_date }}, EndDate : {{ $end_date }}</span>
        </div>
        <hr>
        <div class="card-inner p-2">
            <table class="table table-stripped">
                <thead>
                  <tr class="">
                    <th scope="col">Transaction Date</th>
                    <th scope="col">Description</th>
                    <th scope="col">Credit</th>
                    <th scope="col">Debit</th>
                    <th scope="col">Amount</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($reports as $index => $report )

                    <tr>
                      <th scope="row">{{ $report->transaction_date }}</th>
                      <td>{{ $report->description }}</td>
                      <td>{{ $report->debit_credit_status === 'C' ? number_format($report->amount) : '-' }}</td>
                      <td>{{ $report->debit_credit_status === 'D' ? number_format($report->amount) : '-' }}</td>
                      <td>{{ number_format($report->amount)  }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="20">
                            <div class="alert alert danger"> Tidak ada data</div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>


</div>
@endsection
