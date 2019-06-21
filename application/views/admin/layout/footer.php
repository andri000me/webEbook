                    </div>
                    <!--End Chat Panel Example-->
                </div>
            </div>

        </div>
        <!-- end page-wrapper -->

    </div>
    <!-- end wrapper -->

<!-- Core Scripts - Include with every page -->
    <script src="<?php echo base_url() ?>assets/siminta/assets/plugins/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url() ?>assets/siminta/assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/siminta/assets/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo base_url() ?>assets/siminta/assets/plugins/pace/pace.js"></script>
    <script src="<?php echo base_url() ?>assets/siminta/assets/scripts/siminta.js"></script>
    <!-- Page-Level Plugin Scripts-->
    <script src="<?php echo base_url() ?>assets/siminta/assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url() ?>assets/siminta/assets/plugins/dataTables/dataTables.bootstrap.js"></script>
    <!-- Page-Level Plugin Scripts-->
    <script src="<?php echo base_url() ?>assets/siminta/assets/scripts/dashboard-demo.js"></script>
    <!-- SweatAlert Plugin-->
    <script src="<?php echo base_url() ?>assets/package/dist/sweetalert2.all.min.js"></script>
    <!-- Calendar -->
    <script src="<?php echo base_url() ?>assets/calendar/zabuto_calendar.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#dataTables-example').dataTable();
            $("#my-calendar").zabuto_calendar({
                cell_border: true,
                today: true,
                show_days: true,
                weekstartson: 0,
                nav_icon: {
                      prev: '<i class="fa fa-chevron-circle-left"></i>',
                      next: '<i class="fa fa-chevron-circle-right"></i>'
                  }
            });
        });
    </script>
    
</body>

</html>
