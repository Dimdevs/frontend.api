<script src="{{ asset('template/base-admin/dist/assets/modules/jquery.min.js')}}"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script src="{{ asset('template/base-admin/dist/assets/modules/popper.js')}}"></script>
<script src="{{ asset('template/base-admin/dist/assets/modules/tooltip.js')}}"></script>
<script src="{{ asset('template/base-admin/dist/assets/modules/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('template/base-admin/dist/assets/modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
<script src="{{ asset('template/base-admin/dist/assets/modules/moment.min.js')}}"></script>
<script src="{{ asset('template/base-admin/dist/assets/js/stisla.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
<script type="text/javascript">
$('.btn-delete').on('click',function(){
    var $this = $(this);
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        $this.parent('form').submit();
      }
    })
    return false;
});
</script>

@yield('libraiesJS')

<!-- Template JS File -->
<script src="{{ asset('template/base-admin/dist/assets/js/scripts.js')}}"></script>
<script src="{{ asset('template/base-admin/dist/assets/js/custom.js')}}"></script>

@yield('script')

<script src="{{ asset('js/app.js') }}"></script>
