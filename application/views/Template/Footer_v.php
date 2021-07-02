 <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?= base_url('Assets/dashboard/')?>libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?= base_url('Assets/dashboard/')?>libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?= base_url('Assets/dashboard/')?>libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?= base_url('Assets/dashboard/')?>js/app-style-switcher.js"></script>
    <!--Wave Effects -->
    <script src="<?= base_url('Assets/dashboard/')?>js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?= base_url('Assets/dashboard/')?>js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="<?= base_url('Assets/dashboard/')?>js/custom.js"></script>
    <!-- DataTables -->
    <script type="text/javascript" src="<?= base_url('Assets/')?>datatables/datatables.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable();
    } );
    </script>

    <!-- Terbilang -->
    <script src="<?= base_url('Assets/terbilang/')?>jquery-1.11.2.min.js"></script>
    <script src="<?= base_url('Assets/terbilang/')?>terbilang.js"></script>
    <script type="text/javascript">
    function inputTerbilang() {
      //mengambil data uang yang akan dirubah jadi terbilang
       var input = document.getElementById("terbilang-input").value.replace(/\./g, "");

       //menampilkan hasil dari terbilang
       document.getElementById("terbilang-output").value = terbilang(input).replace(/  +/g, ' ');
    } 
  </script>
</body>

</html>