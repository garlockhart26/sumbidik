    <footer class="main-footer">
        <div class="copyright my-auto">
            <span>Copyright &copy; <a href="http://www.smkn1ciamis.id/">SMK Negeri 1 Ciamis</a>
                <script>
                    document.write(new Date().getFullYear());
                </script> | Develop by <a href="">Garly Nugraha</a>
            </span>
        </div>
    </footer>

    <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="<?php echo base_url('assets/'); ?>vendor/AdminLTE-2.4.13/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?php echo base_url('assets/'); ?>vendor/AdminLTE-2.4.13/bower_components/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?php echo base_url('assets/'); ?>vendor/AdminLTE-2.4.13/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="<?php echo base_url('assets/'); ?>vendor/AdminLTE-2.4.13/bower_components/raphael/raphael.min.js"></script>
    <script src="<?php echo base_url('assets/'); ?>vendor/AdminLTE-2.4.13/bower_components/morris.js/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="<?php echo base_url('assets/'); ?>vendor/AdminLTE-2.4.13/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="<?php echo base_url('assets/'); ?>vendor/AdminLTE-2.4.13/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="<?php echo base_url('assets/'); ?>vendor/AdminLTE-2.4.13/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?php echo base_url('assets/'); ?>vendor/AdminLTE-2.4.13/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="<?php echo base_url('assets/'); ?>vendor/AdminLTE-2.4.13/bower_components/moment/min/moment.min.js"></script>
    <script src="<?php echo base_url('assets/'); ?>vendor/AdminLTE-2.4.13/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="<?php echo base_url('assets/'); ?>vendor/AdminLTE-2.4.13/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="<?php echo base_url('assets/'); ?>vendor/AdminLTE-2.4.13/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="<?php echo base_url('assets/'); ?>vendor/AdminLTE-2.4.13/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url('assets/'); ?>vendor/AdminLTE-2.4.13/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url('assets/'); ?>vendor/AdminLTE-2.4.13/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?php echo base_url('assets/'); ?>vendor/AdminLTE-2.4.13/dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url('assets/'); ?>vendor/AdminLTE-2.4.13/dist/js/demo.js"></script>
    <!-- DataTables -->
    <script src="<?php echo base_url('assets/'); ?>vendor/AdminLTE-2.4.13/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url('assets/'); ?>vendor/AdminLTE-2.4.13/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script>
        $(function() {
            $('#example1').DataTable({
                'lengthMenu': [
                    [10, 20, 20, -1],
                    [10, 20, 30, "All"]
                ]
            })
            $('#example2').DataTable({
                'paging': true,
                'lengthChange': false,
                'searching': false,
                'ordering': true,
                'info': true,
                'autoWidth': false,
                'lengthMenu': [
                    [10, 20, 30, -1],
                    [10, 20, 30, "All"]
                ]
            })
        })
    </script>

    <!-- Sweetalert -->
    <script src="<?php echo base_url('assets/'); ?>vendor/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="<?php echo base_url('assets/'); ?>js/alert.js"></script>
    <!-- Filter -->
    <script src="<?php echo base_url('assets/'); ?>js/filter.js"></script>

    <!-- Dropify -->
    <script type="text/javascript" src="<?php echo base_url().'assets/vendor/dropify/dropify.min.js'?>"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.dropify').dropify({
                messages: {
                    default: 'Drag dan Drop untuk memilih Gambar',
                    replace: 'Ubah',
                    remove:  'Hapus',
                    error:   'Error'
                }
            });
        });
    </script>

    <script>
        function hanyaAngka(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))

                return false;
            return true;
        }
    </script>

</body>

</html>