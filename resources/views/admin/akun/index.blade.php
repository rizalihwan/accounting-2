@extends('_layouts.main')
@section('title', 'Akun')
@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">   
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-users bg-blue"></i>
                        <div class="d-inline">
                            <h5>Akun</h5>
                            <span>List data akun</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('home') }}"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.akun.index') }}">akun</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- end message area-->
            <div class="col-md-12">
                <div class="card p-3">
                    <div class="card-header justify-content-between d-flex">
                        <div>
                            <a href="{{ route('admin.akun.create') }}" class="btn btn-primary btn-lg"><i class="fa fa-plus"></i> TAMBAH AKUN</a>
                        </div>
                        <div class="d-flex">
                            <input type="date" class="form-control mx-1" name="" id="">
                            <input type="date" class="form-control mr-2" name="" id="">
                            <button type="submit" class="btn btn-success"><i class="fa fa-search"></i> Cari</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-light table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Kode Akun</th>
                                    <th>Nama akun</th>
                                    <th>Subklasifikasi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>        
                            <tbody>
                                @forelse ($data as $item)
                                <tr>
                                    <th>{{ $loop->iteration + $data->firstItem() - 1 . '.' }}</th>
                                    <td>
                                        <span class="badge badge-success">{{ $item->kode }}</span>
                                    </td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->subklasifikasi->name }}</td>
                                    <td>
                                        <a href="{{ route('admin.akun.edit', $item->id) }}" class="btn btn-info btn-sm mr-1" style="float: left;"><i class="fa fa-edit"></i></a>
                                        <form action="{{ route('admin.akun.destroy', $item->id) }}" method="post" onclick="return confirm('Apakah yakin?')">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                    
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection