@extends('_layouts.main')
@section('title', 'Laporan - Jurnal Umum')
@push('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('admin.report.menu') }}">Laporan Keuangan</a>
    </li>
    <li class="breadcrumb-item" aria-current="page">Jurnal Umum</li>
@endpush
@section('content')
        <div class="row">
                <!-- end message area-->
                <div class="col-lg-12 col-md-6 col-12">
                    <div class="card">
                    <div class="card-header">
                        <div class="d-flex">
                            @if (request('startDate') && request('endDate'))
                                <a href="{{ route('admin.report.keuangan.jurnalumum') }}" class="btn btn-danger btn-sm mr-1"><i class="fa fa-arrow-left"></i></a>
                                <h2 class="badge badge-success p-1"><u>Laporan Dari : {{ $startDate }} &middot; Sampai : {{ $endDate }}</u></h2>
                            @else
                                <h2 class="badge badge-success p-1"><u>SILAHKAN CARI DATA SESUAI TANGGAL.</u></h2>
                            @endif
                        </div>
                        <div>
                            <form action="{{ route('admin.report.keuangan.jurnalumum.cari') }}" method="GET">
                            @csrf
                                <div class="d-flex">
                                    <label for="startDate" class="mr-2">Start Date</label>
                                    <input type="date" class="form-control @error('startDate') is-invalid @enderror"
                                        name="startDate" id="startDate" required>
                                    @error('startDate')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                    <h4 class="mx-1"> - </h4>
                                    <label for="endDate" class="mr-2">End Date</label>
                                    <input type="date" class="form-control @error('endDate') is-invalid @enderror mr-1"
                                        name="endDate" id="endDate" required>
                                    @error('endDate')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                    <button type="submit" class="btn btn-secondary btn-sm" style="width: 70px"><i class="fa fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover" style="height: 140px">
                                <thead>
                                    <tr>
                                        <th>TANGGAL</th>
                                        <th>URAIAN</th>
                                        <th>NO. REFERENSI</th>
                                        <th>DEBIT</th>
                                        <th>KREDIT</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (request('startDate') && request('endDate'))
                                        @forelse ($data as $key)
                                            <tr>
                                                <td>
                                                    <span class="badge badge-info">
                                                        {{ $key->jurnalumum->tanggal }}
                                                    </span>
                                                </td>
                                                <td>{{ $key->jurnalumum->uraian }}</td>
                                                <td>{{ $key->jurnalumum->kode_jurnal }}</td>
                                                <td>{{ 'IDR ' . number_format($key->debit, 0, ',', '.') }}</td>
                                                <td>{{ 'IDR ' . number_format($key->kredit, 0, ',', '.') }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" align="center">Data tidak ditemukan.</td>
                                            </tr>
                                        @endforelse
                                    @else
                                        <th colspan="5" style="text-align: center">
                                            <span class="badge badge-danger">-- KOSONG --</span>
                                        </th>
                                    @endif
                                </tbody>
                            </table>
                            @if (request('startDate') && request('endDate'))
                                {{ $data->links('pagination::bootstrap-4') }}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection