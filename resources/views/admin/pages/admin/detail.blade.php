@extends('admin.layouts.app')
@section('title', $title)
@section('content')
    <div class="section-header">
        <h1>{{ @$title }}</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">{{ @$title }}</a></div>
            <div class="breadcrumb-item">Data {{ @$title }}</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Form Detail Banner Iklan</h4>
                    </div>
                    <form method="POST" action="#" class="needs-validation" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row">
                                        <div class="form-group col-md-6">
                                        <label for="name">Nama</label>
                                        <input type="text" name="name" class="form-control" value="{{ isset($data) ? $data->name : '' }}" readonly>
                                        @error('name')
                                        <p style="font-size: 12px;" class="mb-0 text-danger mt-1 font-italic font-weight-bold">{{$message}} !</p>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6 mb-0">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control" value="{{ isset($data) ? $data->email : '' }}" readonly>
                                        @error('email')
                                        <p style="font-size: 12px;" class="mb-0 text-danger mt-1 font-italic font-weight-bold">{{$message}} !</p>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12 mb-0">
                                        <label for="status">Status</label>
                                        <select name="status" class="custom-select" id="status" disabled>
                                            <option value="" selected>Pilih Status</option>
                                            <option value="1" {{ isset($data->status) && $data->status == 1 ? 'selected' : '' }}>Aktif</option>
                                            <option value="0" {{ isset($data->status) && $data->status == 0 ? 'selected' : '' }}>Non Aktif</option>
                                        </select>
                                        @error('status')
                                        <p style="font-size: 12px;" class="mb-0 text-danger mt-1 font-italic font-weight-bold">{{$message}} !</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between">
                                <a href="{{ route($route.'index') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('libraiesJS')
    <!-- JS Libraies -->
@endsection

@section('script')
    <script></script>
@endsection
