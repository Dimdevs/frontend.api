<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>Admin - @yield('title')</title>

<!-- General CSS Files -->
<link rel="stylesheet" href="{{ asset('template/base-admin/dist/assets/modules/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{ asset('template/base-admin/dist/assets/modules/fontawesome/css/all.min.css')}}">
<link href="{{ asset('template/base-admin/dist/assets/figma-assets/dimdevs-logo.png') }}" rel="shortcut icon" />

<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('template/base-admin/dist/assets/modules/dropzonejs/dropzone.css')}}">
<link rel="stylesheet" href="{{ asset('template/base-admin/dist/assets/modules/jqvmap/dist/jqvmap.min.css')}}">
<link rel="stylesheet" href="{{ asset('template/base-admin/dist/assets/modules/summernote/summernote-bs4.css')}}">
<link rel="stylesheet" href="{{ asset('template/base-admin/dist/assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css')}}">
<link rel="stylesheet" href="{{ asset('template/base-admin/dist/assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css')}}">
<link rel="stylesheet" href="{{ asset('template/base-admin/dist/assets/modules/datatables/datatables.min.css')}}">
<link rel="stylesheet" href="{{ asset('template/base-admin/dist/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('template/base-admin/dist/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css')}}">
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script src="https://cdn.tiny.cloud/1/uhcnz0d9rf5ovy5f10kbmcgaxptcxm7j5pmllyl3q7ahfkmq/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
<!-- Template CSS -->
<link rel="stylesheet" href="{{asset('template/base-admin/dist/assets/css/style.css')}}">
<link rel="stylesheet" href="{{asset('template/base-admin/dist/assets/css/components.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-rR2DEMBf5IUBMJFp7G2lWKCtR9zglcXr/yYg3CRgLJaxq4cctTYpPxb1Qt4GJK8y" crossorigin="anonymous">

<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());

gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA -->
