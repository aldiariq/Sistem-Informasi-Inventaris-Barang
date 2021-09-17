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
                        columns: [ 0, 1, 2, 3, 4 ]
                      }
                    },
                    { text: 'Excel',
                      extend: 'excelHtml5',
                      title: ' ',
                      filename: 'Laporan',
                      orientation: 'landscape',
                      alignment: 'center',
                      exportOptions: {
                        pageSize: 'a4',
                        rows: ':visible',
                        columns: [ 0, 1, 2, 3, 4 ]
                      }
                    },
                    { text: 'PDF',
                      extend: 'pdfHtml5',
                      title: ' ',
                      filename: 'Laporan',
                      orientation: 'landscape',
                      alignment: 'center',
                      exportOptions: {
                        pageSize: 'a4',
                        rows: ':visible',
                        columns: [ 0, 1, 2, 3, 4 ]
                      },
                      customize: function ( doc ) {
                        doc.content.splice( 1, 0, {
                        margin: [ 0, 0, 0, 12 ],
                        alignment: 'center',
                        image: 'data:image/png;base64,<?php echo base64_encode(file_get_contents(base_url()."/assets/images/koplaporan.png")) ?>'
                        } );
                        doc['footer']=(function(page, pages) {
                          if (page == pages) {
                            return {
                              alignment: 'right',
                              columns: ['Palembang, <?php echo date("d-m-Y") ?>'],
                              margin: [50, -50]
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