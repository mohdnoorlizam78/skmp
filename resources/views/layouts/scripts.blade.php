<!-- jQuery -->
<script src="{{asset('AdminLTE-3.2.0/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{asset('AdminLTE-3.2.0/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('AdminLTE-3.2.0/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('AdminLTE-3.2.0/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('AdminLTE-3.2.0/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('AdminLTE-3.2.0/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('AdminLTE-3.2.0/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('AdminLTE-3.2.0/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('AdminLTE-3.2.0/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('AdminLTE-3.2.0/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('AdminLTE-3.2.0/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('AdminLTE-3.2.0/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('AdminLTE-3.2.0/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('AdminLTE-3.2.0/dist/js/adminlte.min.js')}}"></script>



<script>
  $(function() {
    $("#tablePelajar").DataTable({
      
      "language": {
        "url": '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Malay.json',
    },
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      dom: 'lBfrtip',
        buttons: [
          
            //'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ],
      "buttons": [
        
        "csv", "excel",
        { extend: 'pdf',
              orientation: 'landscape',
              pageSize: 'LEGAL',
              title: 'Rekod Senarai Pelajar' },
        { extend: 'copy', text: 'Salin' },
        { extend: 'print',
              orientation: 'landscape',
              pageSize: 'LEGAL',
              title: 'Rekod Senarai Pelajar',
              text: 'Cetak' },
        { extend: 'colvis', text: 'Paparan Kolum' },
      ]
    });

    $("#tableMohon").DataTable({
      
      "language": {
        "url": '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Malay.json',
    },
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      dom: 'lBfrtip',
        buttons: [
          
            //'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ],
      "buttons": [
        
        "csv", 
        "excel",
        { extend: 'pdf',
              orientation: 'landscape',
              pageSize: 'LEGAL',
              title: 'Rekod Permohonan Keluar Pelajar' },
        { extend: 'copy', text: 'Salin' },
        { extend: 'print',
              orientation: 'landscape',
              pageSize: 'LEGAL',
              title: 'Rekod Permohonan Keluar Pelajar',
              text: 'Cetak' },
        { extend: 'colvis', text: 'Paparan Kolum' },
      ]
    });

    $("#tableRekodPenuh").DataTable({
      
      "language": {
        "url": '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Malay.json',
    },
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      dom: 'lBfrtip',
        buttons: [
          
            //'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ],
      "buttons": [
        
        "csv", "excel",
        { extend: 'pdf',
              orientation: 'landscape',
              pageSize: 'LEGAL',
              title: 'Rekod Keseluruhan Pelajar Keluar Masuk' },
        { extend: 'copy', text: 'Salin' },
        { extend: 'print',
              orientation: 'landscape',
              pageSize: 'LEGAL',
              title: 'Rekod Keseluruhan Pelajar Keluar Masuk',
              text: 'Cetak' },
        { extend: 'colvis', text: 'Paparan Kolum' },
      ]
    });

    $("#tableRekodBalik").DataTable({
      
      "language": {
        "url": '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Malay.json',
    },
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      dom: 'lBfrtip',
        buttons: [
          
            //'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ],
      "buttons": [
        
        "csv", "excel",
        { extend: 'pdf',
              orientation: 'landscape',
              pageSize: 'LEGAL',
              title: 'Rekod Keseluruhan Pelajar Keluar Masuk' },
        { extend: 'copy', text: 'Salin' },
        { extend: 'print',
              orientation: 'landscape',
              pageSize: 'LEGAL',
              title: 'Rekod Keseluruhan Pelajar Keluar Masuk',
              text: 'Cetak' },
        { extend: 'colvis', text: 'Paparan Kolum' },
      ]
    });

    $("#tableRekodKlinik").DataTable({
      
      "language": {
        "url": '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Malay.json',
    },
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      dom: 'lBfrtip',
        buttons: [
          
            //'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ],
      "buttons": [
        
        "csv", "excel",
        { extend: 'pdf',
              orientation: 'landscape',
              pageSize: 'LEGAL',
              title: 'Rekod Keseluruhan Pelajar Keluar Masuk' },
        { extend: 'copy', text: 'Salin' },
        { extend: 'print',
              orientation: 'landscape',
              pageSize: 'LEGAL',
              title: 'Rekod Keseluruhan Pelajar Keluar Masuk',
              text: 'Cetak' },
        { extend: 'colvis', text: 'Paparan Kolum' },
      ]
    });

    $("#tableRekodKeseluruhanDitolak").DataTable({
      
      "language": {
        "url": '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Malay.json',
    },
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      dom: 'lBfrtip',
        buttons: [
          
            //'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ],
      "buttons": [
        
        "csv", "excel",
        { extend: 'pdf',
              orientation: 'landscape',
              pageSize: 'LEGAL',
              title: 'Rekod Keseluruhan Permohonan Keluar Pelajar Ditolak' },
        { extend: 'copy', text: 'Salin' },
        { extend: 'print',
              orientation: 'landscape',
              pageSize: 'LEGAL',
              title: 'Rekod Keseluruhan Permohonan Keluar Pelajar Ditolak',
              text: 'Cetak' },
        { extend: 'colvis', text: 'Paparan Kolum' },
      ]
    });

    $("#tableKursus").DataTable({
      
      "language": {
        "url": '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Malay.json',
    },
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      dom: 'lBfrtip',
        buttons: [
          
            //'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ],
      "buttons": [
        
        "csv", "excel",
        { extend: 'pdf',
              orientation: 'landscape',
              pageSize: 'LEGAL',
              title: 'Rekod Pelajar Keluar Masuk' },
        { extend: 'copy', text: 'Salin' },
        { extend: 'print',
              orientation: 'landscape',
              pageSize: 'LEGAL',
              title: 'Rekod Pelajar Keluar Masuk',
              text: 'Cetak' },
        { extend: 'colvis', text: 'Paparan Kolum' },
      ]
    });

    $("#tableUser").DataTable({
     
      "language": {
        "url": '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Malay.json',
    },
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      dom: 'lBfrtip',
        buttons: [
          
            //'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ],
      "buttons": [
        
        "csv", "excel",
        { extend: 'pdf',
              orientation: 'landscape',
              pageSize: 'LEGAL',
              title: 'Rekod Pengguna' },
        { extend: 'copy', text: 'Salin' },
        { extend: 'print',
              orientation: 'landscape',
              pageSize: 'LEGAL',
              title: 'Rekod Pengguna',
              text: 'Cetak' },
        { extend: 'colvis', text: 'Paparan Kolum' },
      ]
    });

    $("#tableSesi").DataTable({
     
      "language": {
        "url": '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Malay.json',
    },
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      dom: 'lBfrtip',
        buttons: [
          
            //'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ],
      "buttons": [
        
        "csv", "excel",
        { extend: 'pdf',
              orientation: 'landscape',
              pageSize: 'LEGAL',
              title: 'Senarai Sesi' },
        { extend: 'copy', text: 'Salin' },
        { extend: 'print',
              orientation: 'landscape',
              pageSize: 'LEGAL',
              title: 'Senarai Sesi',
              text: 'Cetak' },
        { extend: 'colvis', text: 'Paparan Kolum' },
      ]
    });

    $("#tableTujuan").DataTable({
      
      "language": {
        "url": '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Malay.json',
    },
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      dom: 'lBfrtip',
        buttons: [
          
            //'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ],
      "buttons": [
        
        "csv", "excel",
        { extend: 'pdf',
              orientation: 'landscape',
              pageSize: 'LEGAL',
              title: 'Senarai Tujuan' },
        { extend: 'copy', text: 'Salin' },
        { extend: 'print',
              orientation: 'landscape',
              pageSize: 'LEGAL',
              title: 'Senarai Tujuan',
              text: 'Cetak' },
        { extend: 'colvis', text: 'Paparan Kolum' },
      ]
    });    

  });
 

</script>


