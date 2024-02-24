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
            <div class="col-12 col-sm-12 col-md-12 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <img src="{{ $data->image }}" class="img-fluid" alt="{{ basename($data->image) }}">
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Form Detail {{ $title }}</h4>
                    </div>
                    <form method="POST" action="#" class="needs-validation" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="row">
                                    <div class="form-group col-md-6">
                                    <label for="name">Nama</label>
                                    <input type="text" name="name" class="form-control" readonly value="{{ isset($data) ? $data->name : '' }}">
                                    @error('name')
                                    <p style="font-size: 12px;" class="mb-0 text-danger mt-1 font-italic font-weight-bold">{{$message}} !</p>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="gender">Jenis Kelamin</label>
                                    <select name="gender" disabled class="custom-select" id="gender">
                                        <option value="" selected>Pilih Jenis Kelamin</option>
                                        <option value="Laki - Laki" {{ isset($data->gender) && $data->gender == 'Laki - Laki' ? 'selected' : '' }}>Laki - Laki</option>
                                        <option value="Perempuan" {{ isset($data->gender) && $data->gender == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                    @error('gender')
                                    <p style="font-size: 12px;" class="mb-0 text-danger mt-1 font-italic font-weight-bold">{{$message}} !</p>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12 mb-0">
                                    <label for="address">Address</label>
                                    <textarea type="text" name="address" class="form-control" readonly>{{ isset($data->address) && $data->address }}</textarea>
                                    @error('address')
                                    <p style="font-size: 12px;" class="mb-0 text-danger mt-1 font-italic font-weight-bold">{{$message}} !</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                           <div class="row">

                                @include('admin.pages.colleger.course.detail')

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
