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
                        <h4>Form Edit {{ $title }}</h4>
                    </div>
                    <form method="POST" action="{{ route($route.'update' , $data->id) }}" class="needs-validation" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
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
<script>
  $(document).ready(function(){
    $(".addRow").click(function(){
        var newRow = '<tr>' +
                        '<th scope="row"></th>' +
                        '<td><input type="text" class="form-control" name="course[]"></td>' +
                        '<td>' +
                            '<div class="d-flex">' +
                                '<button type="button" class="btn btn-danger m-1 removeRow">Hapus</button>' +
                            '</div>' +
                        '</td>' +
                    '</tr>';
        $("#courseTable tbody").append(newRow);
        updateRowNumbers();
    });

    $(document).on('click', '.removeRow', function(){
        if($(this).closest('tr').index() !== 0) {
            $(this).closest('tr').remove();
            updateRowNumbers();
        } else {
            alert("Baris pertama tidak bisa dihapus.");
        }
    });

    function updateRowNumbers(){
        $('#courseTable tbody tr').each(function(index){
            $(this).find('th').text(index + 1);
        });
    }
});
</script>
@endsection
