           <!-- /.content-wrapper -->
           <footer class="main-footer">
               <strong>No Copyright. 2020-2021 <a href="index.php">Online Donation Platform</a>.</strong>
               No rights reserved.

           </footer>

           <!-- Control Sidebar -->
           <aside class="control-sidebar control-sidebar-dark">
               <!-- Control sidebar content goes here -->
           </aside>
           <!-- /.control-sidebar -->
           <script src="plugins/jquery/jquery.min.js"></script>
           <!-- jQuery UI 1.11.4 -->
           <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
           <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
           <script>
               $.widget.bridge('uibutton', $.ui.button)
           </script>
           <!-- Bootstrap 4 -->
           <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
           <!-- ChartJS -->
           <script src="plugins/chart.js/Chart.min.js"></script>
           <!-- Sparkline -->
           <script src="plugins/sparklines/sparkline.js"></script>
           <!-- JQVMap -->
           <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
           <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
           <!-- jQuery Knob Chart -->
           <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
           <!-- daterangepicker -->
           <script src="plugins/moment/moment.min.js"></script>
           <script src="plugins/daterangepicker/daterangepicker.js"></script>
           <!-- Tempusdominus Bootstrap 4 -->
           <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
           <!-- Summernote -->
           <script src="plugins/summernote/summernote-bs4.min.js"></script>
           <!-- overlayScrollbars -->
           <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
           <!-- AdminLTE App -->
           <script src="dist/js/adminlte.js"></script>
           <!-- AdminLTE for demo purposes -->
           <script src="dist/js/demo.js"></script>
           <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
           <script src="dist/js/pages/dashboard.js"></script>
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

           <!-- Popper JS -->
           <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

           <!-- Latest compiled JavaScript -->
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
           <script type="text/javascript">
               $(function() {

                   var url = window.location;
                   // var element = $('ul.nav a').filter(function() {
                   //     return this.href == url;
                   // }).addClass('active').parent().parent().addClass('in').parent();
                   var element = $('.nav-item a').filter(function() {
                       return this.href == url;
                   }).addClass('active').parent();

                   while (true) {
                       if (element.is('li')) {
                           element = element.parent().addClass('in').parent();
                       } else {
                           break;
                       }
                   }
               });
           </script>
           </body>

           </html>