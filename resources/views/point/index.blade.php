@extends('layouts.app')
@section('breadcrumbs','Points')
@section('content')
<div class="d-flex gx-5">
    <div class="card card-bordered col-md-6" style="margin-left:10px;">
        <div class="card card-header">
            <h5>Daftar Point Masing Masing transaksi</h5>
        </div>
        <div class="card-inner p-2">
            <table class="table table-stripped">
                <thead>
                  <tr class="">
                    <th scope="col">Account Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Point</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($points as $index => $point )

                    <tr>
                      <th scope="row">{{ $point->id }}</th>
                      <td>{{ $point->name }}</td>
                      <td>{{ number_format($point->amount) }}</td>
                      <td>{{ $point->point }}</td>
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
