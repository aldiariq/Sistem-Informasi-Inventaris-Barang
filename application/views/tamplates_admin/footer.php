            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center mb-0 font-17 text-dark font-weight-medium">
                © 2020 PT KERETA API INDONESIA (PERSERO), All Rights Reserved
            </footer>
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
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url() ?>/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="<?php echo base_url() ?>/dist/js/app-style-switcher.js"></script>
    <script src="<?php echo base_url() ?>/dist/js/feather.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="<?php echo base_url() ?>/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url() ?>/dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <script src="<?php echo base_url() ?>/assets/extra-libs/c3/d3.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/extra-libs/c3/c3.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js"></script>
    <script src="<?php echo base_url() ?>/dist/js/pages/dashboards/dashboard1.min.js"></script>

    <script src="<?php echo base_url() ?>/assets/extra-libs/datatables.net/js/jquery.dataTables.js"></script>
    <script src="<?php echo base_url() ?>/dist/js/pages/datatable/datatable-basic.init.js"></script>
    <script src="<?php echo base_url() ?>/assets/extra-libs/datatables.net/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/extra-libs/datatables.net/js/buttons.bootstrap4.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/extra-libs/datatables.net/js/jszip.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/extra-libs/datatables.net/js/pdfmake.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/extra-libs/datatables.net/js/vfs_fonts.js"></script>
    <script src="<?php echo base_url() ?>/assets/extra-libs/datatables.net/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/extra-libs/datatables.net/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/extra-libs/datatables.net/js/buttons.colVis.min.js"></script>

    <?php if ($this->uri->segment(1) == 'laporanstok'): ?>
      
    <?php endif ?>

    <?php if ($this->uri->segment(1) == 'laporanbarang'): ?>
      
    <?php endif ?>

    <?php if ($this->uri->segment(1) == 'laporanstok' || $this->uri->segment(1) == 'laporanbarang'): ?>
      <script>
      $(document).ready(function() {
        var buttonCommon = {
          exportOptions: {
            format: {
              body: function ( data, row, column, node ) {
                    return column === 0 ?
                    data.replace( /[$,]/g, '' ) :
                    data;
                  }
                }
              }
            };

            $('#zero_config').DataTable( {
              stateSave: true,
              "bDestroy": true,
              dom: 'Bfrtip',
              header: true,
              paging: false,
              autoWidth: false,
              buttons: [
              {
               extend: 'collection',
               text: 'Simpan Data',
               autoClose: true,
               buttons: [
                    { text: 'Copy',
                      extend: 'copyHtml5',
                      title: ' ',
                      filename: 'Laporan',
                      orientation: 'landscape',
                      alignment: 'center',
                      exportOptions: {
                        pageSize: 'a4',
                        rows: ':visible',
                        <?php 
                          if ($this->uri->segment(1) == 'laporanbarang') {
                            echo "columns: [ 0, 1, 2, 3, 4]";
                          }
                        ?>
                      }
                    },
                    { text: 'Excel',
                      extend: 'excelHtml5',
                      title: ' ',
                      <?php if ($this->uri->segment(1) == 'laporanbarang'): ?>
                        filename: '<?php echo "Stok Barang di ".urldecode($this->uri->segment(2))." Tanggal ".date("d-m-Y") ?>',
                      <?php endif ?>

                      <?php if ($this->uri->segment(1) == 'laporanstok'): ?>
                        filename: '<?php echo "Laporan Barang Keluar dari ".urldecode($this->uri->segment(2))." Tanggal ".date("d-m-Y") ?>',
                      <?php endif ?>
                      orientation: 'landscape',
                      alignment: 'center',
                      exportOptions: {
                        pageSize: 'a4',
                        rows: ':visible',
                        <?php 
                          if ($this->uri->segment(1) == 'laporanbarang') {
                            echo "columns: [ 0, 1, 2, 3, 4, 5 ]";
                          }
                        ?>
                      }
                    },
                    { text: 'PDF',
                      extend: 'pdfHtml5',
                      title: ' ',
                      <?php if ($this->uri->segment(1) == 'laporanbarang'): ?>
                        filename: '<?php echo "Stok Barang di ".urldecode($this->uri->segment(2))." Tanggal ".date("d-m-Y") ?>',
                      <?php endif ?>

                      <?php if ($this->uri->segment(1) == 'laporanstok'): ?>
                        filename: '<?php echo "Laporan Barang Keluar dari ".urldecode($this->uri->segment(2))." Tanggal ".date("d-m-Y") ?>',
                      <?php endif ?>
                      orientation: 'landscape',
                      alignment: 'center',
                      exportOptions: {
                        pageSize: 'letter',
                        rows: ':visible',
                        <?php 
                          if ($this->uri->segment(1) == 'laporanbarang') {
                            echo "columns: [ 0, 1, 2, 3, 4, 5 ]";
                          }
                        ?>
                      },
                      customize: function ( doc ) {
                        <?php if ($this->uri->segment(1) == 'laporanbarang'): ?>
                          doc.content[1].table.widths = [ '16%',  '16%', '16%', '16%', '16%','16%'];
                        <?php endif ?>

                        <?php if ($this->uri->segment(1) == 'laporanstok'): ?>
                          doc.content[1].table.widths = [ '11%','11%','11%','11%','11%','11%','11%','11%','11%'];
                        <?php endif ?>
                        doc.content.splice( 1, 0, {
                        margin: [ 0, 0, 0, 0 ],
                        alignment: 'center',
                        <?php if ($this->uri->segment(1) == 'laporanbarang'): ?>
                          image: 'data:image/png;base64,<?php echo base64_encode(file_get_contents(base_url()."/assets/images/koplaporanstok.jpg")) ?>'
                        <?php endif ?>

                        <?php if ($this->uri->segment(1) == 'laporanstok'): ?>
                          image: 'data:image/png;base64,<?php echo base64_encode(file_get_contents(base_url()."/assets/images/koplaporan.jpg")) ?>'
                        <?php endif ?>
                        });
                        doc['footer']=(function(page, pages) {
                          if (page == pages) {
                            return {
                              alignment: 'right',
                              columns: ['Palembang, <?php echo date("d-m-Y") ?>'],
                              margin: [50, -15]
                            }
                          }
                  });
                      }
                    }
               ],
               fade: true
             }
             ],
            } );
     });
   </script>
      
    <?php endif ?>


    
</body>

</html>