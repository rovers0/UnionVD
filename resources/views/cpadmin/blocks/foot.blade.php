<!-- jQuery -->
<script src="{{ asset('cpadmin/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('cpadmin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('cpadmin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('cpadmin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('cpadmin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('cpadmin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ asset('cpadmin/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('cpadmin/dist/js/demo.js') }}"></script>
<script src="{{ asset('/js/main.js') }}"></script>
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
    
      });
    });
    function checkdelete(msg){
      if(window.confirm(msg) == true){
        return true;
      }
      return false;
    }
  </script>
