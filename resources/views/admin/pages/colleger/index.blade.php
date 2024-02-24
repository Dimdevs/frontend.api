@extends('admin.layouts.app')
@section('title', 'List ' . $title)
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
            <div class="col-12">
                <div class="card">
                    <div class="card-header justify-content-between">
                        <h4>Data {{ @$title }}</h4>
                        <a class="btn btn-primary" href="{{ route($route . 'create') }}">+ Tambah</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            #
                                        </th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Alamat</th>
                                        <th>Jumlah Mata Kuliah</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($datas as $data)
                                        <tr>
                                            <td>{{ $no++  }}</td>
                                            <td>{{ $data->name ?? 'Tidak Ada Nama' }}</td>
                                            <td>{{ $data->gender ?? 'Tidak Ada Gender' }}</td>
                                            <td>{{ $data->address ?? 'Tidak Ada Alamat' }}</td>
                                            <td>{{ $data->course()->count() ?? 'Tidak Ada Mata ' }}</td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <a href="{{ route($route . 'show', $data->id) }}" class="btn btn-icon m-1 btn-info"><i class="fas fa-eye"></i></a>
                                                    <a href="{{ route($route . 'edit', $data->id) }}" class="btn btn-icon m-1 btn-success"><i class="far fa-edit"></i></a>
                                                    <a class="btn btn-danger m-1 button-delete text-white" data-id={{ $data->id }}><i class="far fa-trash-alt"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('libraiesJS')
    <!-- JS Libraies -->
    <script src="{{ asset('template/base-admin/dist/assets/modules/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('template/base-admin/dist/assets/modules/datatables/datatables.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('template/base-admin/dist/assets/js/page/modules-datatables.js') }}"></script>
@endsection

@section('script')
<script>
    $(document).ready(function () {
        $('.button-delete').on('click', function () {
            var itemId = $(this).data('id');
            var title = "{{ $title }}";
            Swal.fire({
                title: 'Hapus ' + title + ' ?',
                text: 'Apa Anda Yakin Untuk Menghapus ' + title + ' !',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Hapus !',
                cancelButtonText: 'Batalkan !',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route($route . "destroy", ":id") }}'.replace(':id', itemId),
                        type: 'DELETE',
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function (response) {
                            // Handle success
                            Swal.fire({
                                title: 'Deleted!',
                                text: response.message,
                                icon: 'success',
                                timer: 2000,
                                showConfirmButton: false
                            });
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                        },
                        error: function (error) {
                            // Handle errors
                            Swal.fire({
                                title: 'Error!',
                                text: 'Error deleting item: ' + error.responseText,
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });

                            // console.error('Error deleting item:', error.responseText);
                        }
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    // User clicked "No, cancel!"
                    // You can handle the cancel action or do nothing
                }
            });
        });
    });
</script>
@endsection
