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
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.25/b-1.7.1/b-print-1.7.1/date-1.1.0/fh-3.1.9/r-2.2.9/datatables.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
      $('#example').DataTable();
      } );
    </script>

    <!-- Terbilang -->
    <script src="<?= base_url('Assets/terbilang/')?>terbilang.js"></script>
    <script type="text/javascript">
    function inputTerbilang() {
      //mengambil data uang yang akan dirubah jadi terbilang
       var input = document.getElementById("terbilang-input").value.replace(/\./g, "");

       //menampilkan hasil dari terbilang
       document.getElementById("terbilang-output").value = terbilang(input).replace(/  +/g, ' ');
    } 
  </script>

    <script type="text/javascript">
    $('#submit').click(function() {
        var form_data = {
            username: $('#username').val(),
            email: $('#email').val(),
            nama: $('#nama').val(),
            password: $('#password').val(),
            role: $('#role').val(),
        };
        $.ajax({
            url: "<?php echo site_url('User/User/add'); ?>",
            type: 'POST',
            data: form_data,
            success: function(msg) {
                if (msg == 'YES')
                  location.reload();
                else
                    $('#alert-msg').html('<div class="alert alert-danger">' + msg + '</div>');
            }
        });
        return false;
    });
    </script>

<!-- Auto Pos Anggaran  -->
<script>
    $(document).ready(function(){
        $('#jns_trans').change(function(){
            var jns_trans=$(this).val();
            $.ajax({
                url : "<?php echo base_url('Master/Anggaran/data_pos_anggaran');?>",
                method : "POST",
                data : {jns_trans: jns_trans},
                async : false,
                dataType : 'json',
                success: function(data){
                    var isi = '';
                    var i;
                    for(i=0; i<data.length; i++){
                      isi += `<option value="${data[i].nama_pos}">${data[i].nama_pos}</option>`;
                    }
                    $('#nama_pos').html(isi);

                }
            });
        });
    });
  </script>

    
</body>

</html>