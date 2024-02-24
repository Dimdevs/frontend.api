@extends('admin.layouts.app')
@section('title' , $title)
@section('content')
<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card card-statistic-2">
            <div class="card-icon shadow-primary bg-primary">
                <i class="fas fa-users-cog"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Super Admin</h4>
                </div>
                <div class="card-body">
                    {{ $datas->where('role' , 'super_admin')->count() }}
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card card-statistic-2">
            <div class="card-icon shadow-primary bg-primary">
                <i class="fas fa-user-graduate"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Mahasiswa</h4>
                </div>
                <div class="card-body">
                    {{ $collergers->count() }}
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card card-statistic-2">
            <div class="card-icon shadow-primary bg-primary">
                <i class="fas fa-building"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Super Admin & Mahasiswa</h4>
                </div>
                <div class="card-body">
                    {{ $datas->where('role' , 'super_admin')->count() + $collergers->count() }}
                </div>
            </div>
        </div>
    </div>
  </div>
@endsection
