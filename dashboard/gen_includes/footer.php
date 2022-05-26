
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    <footer class="footer" ><span style="width:80%; margin:auto; text-align: center;">Copyright © 2020 Zuriel crypto cash All Rights Reserved</span></footer>
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
  </div>
  <!-- ============================================================== -->
  <!-- End Page wrapper  -->
  <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<!-- Bootstrap -->
<script src="../assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/vendors/jquery/jquery.min.js"></script>

<!-- slimscrollbar scrollbar JavaScript -->
<script src="../assets/vendors/ps/perfect-scrollbar.jquery.min.js"></script>
<!--Wave Effects -->
<script src="../js/waves.js"></script>
<!--Menu sidebar -->
<script src="../js/sidebarmenu.js"></script>
<!--Custom JavaScript -->
<script src="../js/custom.min.js"></script>
<!-- ============================================================== -->
<!-- This page plugins -->
<!-- ============================================================== -->
<!--morris JavaScript -->
<script src="../assets/vendors/raphael/raphael-min.js"></script>
<script src="../assets/vendors/morrisjs/morris.min.js"></script>
<!--c3 JavaScript -->
<script src="../assets/vendors/d3/d3.min.js"></script>
<script src="../assets/vendors/c3-master/c3.min.js"></script>
<!-- Popup message jquery -->
<!-- <script src="../assets/vendors/toast-master/js/jquery.toast.js"></script> -->
<!--Sparkline JavaScript -->
<script src="../assets/vendors/sparkline/jquery.sparkline.min.js"></script>
<!-- Chart JS -->
<script src="../js/dashboard1.js"></script>

 <!-- This is data table -->
 <script src="../assets/vendors/datatables/jquery.dataTables.min.js"></script>
<!-- ============================================================== -->
<!-- Style switcher -->
<!-- ============================================================== -->
<script src="../assets/vendors/styleswitcher/jQuery.style.switcher.js"></script>

<script>
  $(function() {
    $('#myTable').DataTable();
    var table = $('#example').DataTable({
        "columnDefs": [{
            "visible": false,
            "targets": 2
        }],
        "order": [
            [2, 'asc']
        ],
        "displayLength": 25,
        "drawCallback": function(settings) {
            var api = this.api();
            var rows = api.rows({
                page: 'current'
            }).nodes();
            var last = null;
            api.column(2, {
                page: 'current'
            }).data().each(function(group, i) {
                if (last !== group) {
                    $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                    last = group;
                }
            });
        }
    });
    // Order by the grouping
    $('#example tbody').on('click', 'tr.group', function() {
      var currentOrder = table.order()[0];
      if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
          table.order([2, 'desc']).draw();
      } else {
          table.order([2, 'asc']).draw();
      }
    });
      
  });
  $('#example23').DataTable({
    dom: 'Bfrtip',
    buttons: [
      'copy', 'csv', 'excel', 'pdf', 'print'
    ]
  });
</script>

</body>


</html>

