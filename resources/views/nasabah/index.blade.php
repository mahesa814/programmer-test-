@extends('layouts.app')
@section('breadcrumbs','Nasabah')
@section('content')
<div class="d-flex gx-5">
    <div class="card card-bordered col-md-3" style="margin-right:30px;">
        <div class="card card-header">
            <h5>Daftar Nasabah</h5>
        </div>
        <div class="p-2 card-inner">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Nasabah</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($nasabahs as $index => $nasabah )

                    <tr>
                      <th scope="row">{{ ++$index }}</th>
                      <td>{{ $nasabah->name }}</td>
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
    <div class="card card-bordered col-md-6">
        <div class="card-header">
            <h5>Create Nasabah</h5>
        </div>
        <div class="p-3">
            <form action="{{ route('nasabah.store') }}" method="post">
                @csrf
                <div class="row gy-2">
                    <div class="col-md-12">
                        @error('name')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                          </div>
                        @enderror
                        <label for="">Nama Nasabah</label>
                        <input type="text" name="name" id="" class="form-control" required>
                    </div>
                    <div>
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
