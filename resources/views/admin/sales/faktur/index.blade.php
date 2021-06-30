@extends('_layouts.main')
@section('title', 'Faktur Penjualan')
@push('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ route('admin.sales.') }}">Penjualan</a>
</li>
<li class="breadcrumb-item" aria-current="page">Faktur Penjualan</li>
@endpush
@section('content')

<div class="row">
    <div class="col-lg-12 col-md-12 col-12">
        <div class="card card-payment">
            <div class="card-header py-2 d-flex justify-content-between align-items-center">
                <h4 class="card-title">Faktur Penjualan</h4>
                <a href="{{ route('admin.sales.faktur.create') }}" class="btn btn-sm btn-primary shadow"><i data-feather="plus"></i></a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th style="width: 1px">#</th>
                                <th>Tanggal</th>
                                <th>kode Faktur</th>
                                <th>Nama Pelanggan</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th style="width: 1px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($fakturs as $faktur)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $faktur->tanggal }}</td>
                                <td>{{ $faktur->kode }}</td>
                                <td>{{ $faktur->pelanggan->nama }}</td>
                                <td>{{ 'Rp. ' . number_format($faktur->total, 0, ',', '.') }}</td>
                                <td>{{ $faktur->status == 1 ? 'Aktif' : 'Tidak Aktif' }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow"
                                            data-toggle="dropdown">
                                            <i data-feather="more-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item"
                                                href="{{ route('admin.sales.faktur.show', $faktur->id) }}">
                                                <i data-feather="eye"></i>
                                                <span class="ml-1">Show</span>
                                            </a>
                                            <a class="dropdown-item" href="{{ route('admin.sales.faktur.edit', $faktur->id) }}">
                                                <i data-feather="edit"></i>
                                                <span class="ml-1">Edit</span>
                                            </a>
                                            <div class="dropdown-item">
                                                <form action="{{ route('admin.sales.faktur.destroy', $faktur->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="button delete-confirm btn btn-flat-danger"><i data-feather="trash"></i>
                                                        <span class="ml-1">Delete</span></button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>      
                            @empty
                            <tr>
                                <td colspan="7" align="center">
                                    Tidak ada data
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <hr style="margin-top: -1px">
                    {{ $fakturs->links() }}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection