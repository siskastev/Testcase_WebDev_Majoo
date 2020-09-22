  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url()?>TemplateAdmin/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url()?>TemplateAdmin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url()?>TemplateAdmin/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url()?>TemplateAdmin/js/sb-admin-2.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      $('#example').DataTable();
    } );
  </script>


  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.1/js/responsive.bootstrap4.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.1/js/responsive.bootstrap4.min.js"></script>
<!--   <script src="<?php echo base_url().'bootstrap/js/raphael-min.js'?>"></script>
  <script src="<?php echo base_url().'bootstrap/js/morris.min.js'?>"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

  <script type='text/javascript'>
    function previewImage(event) 
    {
      var reader = new FileReader();
      reader.onload = function()
      {
        var output = document.getElementById("image-preview");
        output.src = reader.result;
      }
      reader.readAsDataURL(event.target.files[0]);
    }
  </script>


  <!-- Page level plugins -->
  <!-- <script src="<?php echo base_url()?>TemplateAdmin/vendor/chart.js/Chart.min.js"></script> -->

  <!-- Page level custom scripts -->
      <!--   <script src="<?php echo base_url()?>TemplateAdmin/js/demo/chart-area-demo.js"></script>
        <script src="<?php echo base_url()?>TemplateAdmin/js/demo/chart-pie-demo.js"></script> -->