 <!-- [Page Specific JS] start -->
 <!-- datatable Js -->
 <script src="{{ url('assets') }}/cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
 <script src="{{ url('assets') }}/js/plugins/dataTables.min.js"></script>
 <script src="{{ url('assets') }}/js/plugins/dataTables.bootstrap5.min.js"></script>
 <script src="{{ url('assets') }}/js/plugins/buttons.colVis.min.js"></script>
 <script src="{{ url('assets') }}/js/plugins/buttons.print.min.js"></script>
 <script src="{{ url('assets') }}/js/plugins/pdfmake.min.js"></script>
 <script src="{{ url('assets') }}/js/plugins/jszip.min.js"></script>
 <script src="{{ url('assets') }}/js/plugins/dataTables.buttons.min.js"></script>
 <script src="{{ url('assets') }}/js/plugins/vfs_fonts.js"></script>
 <script src="{{ url('assets') }}/js/plugins/buttons.html5.min.js"></script>
 <script src="{{ url('assets') }}/js/plugins/buttons.bootstrap5.min.js"></script>
 <script>
     // [ HTML5 Export Buttons ]
     $('#basic-btn').DataTable({
         dom: 'Bfrtip',
         buttons: ['copy', 'csv', 'excel', 'print']
     });

     // [ Column Selectors ]
     $('#cbtn-selectors').DataTable({
         dom: 'Bfrtip',
         buttons: [{
                 extend: 'excelHtml5',
                 exportOptions: {
                     columns: ':visible'
                 }
             },
             {
                 extend: 'pdfHtml5',
                 exportOptions: {
                    columns: [0, 1, 2, 5]
                 }
             },
             'colvis'
         ]
     });

     // [ Excel - Cell Background ]
     $('#excel-bg').DataTable({
         dom: 'Bfrtip',
         buttons: [{
             extend: 'excelHtml5',
             customize: function(xlsx) {
                 var sheet = xlsx.xl.worksheets['sheet1.xml'];
                 $('row c[r^="F"]', sheet).each(function() {
                     if ($('is t', this).text().replace(/[^\d]/g, '') * 1 >= 500000) {
                         $(this).attr('s', '20');
                     }
                 });
             }
         }]
     });

     // [ Custom File (JSON) ]
     $('#pdf-json').DataTable({
         dom: 'Bfrtip',
         buttons: [{
             text: 'JSON',
             action: function(e, dt, button, config) {
                 var data = dt.buttons.exportData();
                 $.fn.dataTable.fileSave(new Blob([JSON.stringify(data)]), 'Export.json');
             }
         }]
     });
 </script>