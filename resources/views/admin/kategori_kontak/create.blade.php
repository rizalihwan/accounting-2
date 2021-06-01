@extends('_layouts.main')
@section('title', 'Kategori Kontak')
@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-user-plus bg-blue"></i>
                        <div class="d-inline">
                            <h5>Kategori Kontak</h5>
                            <span>Form tambah kategori kontak</span>
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
                                <a href="#">Tambah Kategori Kontak</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header">
                        <h3>Tambah Kategori Kontak</h3>
                    </div>
                    <div class="card-body">
                        <form class="forms-sample" method="POST" action="#">
                            @csrf
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="kategori">{{ __('kategori') }}<span class="text-red">*</span></label>
                                        <input id="kategori" type="text"
                                            class="form-control @error('kategori') is-invalid @enderror" name="kategori"
                                            required>
                                        <div class="help-block with-errors"></div>
                                        @error('kategori')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="keterangan">{{ __('keterangan') }}<span class="text-red">*</span></label>
                                        <input id="keterangan" type="text"
                                            class="form-control @error('keterangan') is-invalid @enderror" name="keterangan"
                                            required>
                                        <div class="help-block with-errors"></div>
                                        @error('keterangan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
