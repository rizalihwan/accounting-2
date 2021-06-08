@extends('_layouts.main')
@section('title', 'akun')
@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-user-plus bg-blue"></i>
                        <div class="d-inline">
                            <h5>akun</h5>
                            <span>Form edit akun</span>
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
                                <a href="{{ route('admin.akun.create') }}">Edit akun</a>
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
                        <h3>Edit Akun</h3>
                    </div>
                    <div class="card-body">
                        <form class="forms-sample" method="POST" action="{{ route('admin.akun.update', $akun->id) }}">
                            @csrf
                            @method('patch')
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">    
                                        <label for="kode">{{ __('Kode') }}<span class="text-red">*</span></label>
                                        <input id="kode" type="text"
                                            class="form-control @error('kode') is-invalid @enderror" value="{{ $akun->kode ?? old('akun') }}" name="kode"
                                            required>
                                        <div class="help-block with-errors"></div>
                                        @error('kode')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">    
                                        <label for="name">{{ __('Name') }}<span class="text-red">*</span></label>
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" value="{{ $akun->name ?? old('akun') }}" name="name"
                                            required>
                                        <div class="help-block with-errors"></div>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">    
                                        <label for="subklasifikasi_id">{{ __('akun') }}<span class="text-red">*</span></label>
                                        <select name="subklasifikasi_id" id="subklasifikasi_id" class="form-control" required>
                                            @foreach($subklasifikasi_id as $value)
                                                <option value="{{ $value->id }}" @if($value->id == $akun->subklasifikasi_id) selected @endif>{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="help-block with-errors"></div>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 mt-4">
                                    <div class="form-group">
                                        <a href="{{ route('admin.akun.index') }}" class="btn btn-danger">KEMBALI</a>
                                        <button type="submit" class="btn btn-primary">
                                            UPDATE</button>
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