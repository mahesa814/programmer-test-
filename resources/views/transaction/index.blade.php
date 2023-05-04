@extends('layouts.app')
@section('breadcrumbs','Nasabah')
@section('content')
<div class="d-flex gx-5">
    <div class="card card-bordered col-md-6">
        <div class="card-header">
            <h5>Create Transaksi</h5>
        </div>
        <div class="p-3">
            <form action="{{ route('transaction.store') }}" method="post">
                @csrf
                <div class="row gy-4">
                    <div class="col-md-12">
                        <label for="">Pilih Nasabah</label>
                        <select name="nasabah_id" id="" class="form-control mt-3" required>
                            <option value="" class="">Pilih Nasabah</option>
                            @foreach ($nasabah as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="">Tanggal Transaksi</label>
                        <input type="date" name="transaction_date" id="" class="form-control mt-3" required>
                    </div>
                    <div class="col-md-12">
                        <label for="">Deskripsi Transaksi</label>
                        <select name="description" id="" class="form-control mt-3">
                            <option value="">Pilih Keterangan Transaksi</option>
                            <option value="Tarik Tunai">Tarik Tunai</option>
                            <option value="Beli Pulsa">Beli Pulsa</option>
                            <option value="Setor Tunai">Setor Tunai</option>
                            <option value="Beli Listrik">Beli Listrik</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="">Debit Card</label>
                        <div class="d-flex">
                            <div class="form-check" style="margin-right:10px;">
                                <input class="form-check-input" type="radio" name="debit_credit_status" id="c" value="C">
                                <label class="form-check-label" for="c">
                                    C
                                </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="debit_credit_status" id="d" value="D">
                                <label class="form-check-label" for="d">
                                  D
                                </label>
                              </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="">Amount</label>
                        <input type="number" name="amount" id="" class="form-control mt-3" required>
                    </div>
                    <div>
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card card-bordered col-md-6" style="margin-left:10px;">
        <div class="card card-header">
            <h5>Daftar Transaksi</h5>
        </div>
        <div class="card-inner p-2">
            <table class="table table-stripped">
                <thead>
                  <tr class="">
                    <th scope="col">Account Id</th>
                    <th scope="col">Tanggal Transaksi</th>
                    <th scope="col">Deskripsi Transaksi</th>
                    <th scope="col">Debit Credit Status</th>
                    <th scope="col">Amount</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($transactions as $index => $transaction )

                    <tr>
                      <th scope="row">{{ $transaction->nasabah->id }}</th>
                      <td>{{ date('Y-m-d',strtotime($transaction->transaction_date)) }}</td>
                      <td>{{ $transaction->description }}</td>
                      <td>{{ $transaction->debit_credit_status }}</td>
                      <td>{{ number_format($transaction->amount) }}</td>
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
