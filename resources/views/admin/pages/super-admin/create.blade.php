@extends('admin.layouts.app')
@section('title', $title)
@section('content')
    <div class="section-header">
        <h1>{{ @$title }}</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">{{ @$title }}</a></div>
            <div class="breadcrumb-item">Buat {{ @$title }}</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Form {{ $title }}</h4>
                    </div>
                    <form method="POST" action="{{ route($route.'store') }}" class="needs-validation" enctype="multipart/form-data">
                        @csrf
                        @include($view.'field')
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
