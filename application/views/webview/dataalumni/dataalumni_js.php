<script src="https://cdn.datatables.net/v/bs5/dt-1.13.6/r-2.5.0/datatables.min.js"></script>
<script>
  $(document).ready(function() {
    var table = $("#dataalumni").DataTable({
      responsive: true,
      "processing": true, //Feature control the processing indicator.
      "serverSide": true, //Feature control DataTables' server-side processing mode.
      "order": [], //Initial no order.
      "iDisplayLength": 50,

      // Load data for the table's content from an Ajax source
      "ajax": {
        "url": "<?php echo site_url('DataAlumni/ajax_list') ?>",
        "type": "POST",
        "data": function(data) {
          data.sekolah = $('#sekolah_filter').val();
          data.tahun_kelulusan = $('#tahun_filter').val();
          data.status = $('#status_filter').val();
        }
      },
      // Set column definition initialisation properties.
      "columnDefs": [{
        "orderable": false, //set not orderable
      }, ],
      "dom": '<"row"<"col-sm-6"l><"col-sm-6"f>>rtip'

    });

    $('#sekolah_filter, #tahun_filter, #status_filter').on('change', function() {
      table.ajax.reload();
    });
  });

  function exportDataPDF() {
    // Get the selected filter options
    var selectedSekolah = document.getElementById('sekolah_filter').value;
    var selectedTahun = document.getElementById('tahun_filter').value;
    var selectedStatus = document.getElementById('status_filter').value;

    // Construct the URL with the selected filter options
    var baseUrl = "<?php echo base_url('dataalumni/exportpdf') ?>";
    var url = baseUrl + "?sekolah=" + selectedSekolah + "&tahun=" + selectedTahun + "&status=" + selectedStatus;

    // Redirect to the constructed URL
    window.location.href = url;
  }

  function exportDataExcel() {
    // Get the selected filter options
    var selectedSekolah = document.getElementById('sekolah_filter').value;
    var selectedTahun = document.getElementById('tahun_filter').value;
    var selectedStatus = document.getElementById('status_filter').value;

    // Construct the URL with the selected filter options
    var baseUrl = "<?php echo base_url('dataalumni/exportExcel') ?>";
    var url = baseUrl + "?sekolah=" + selectedSekolah + "&tahun=" + selectedTahun + "&status=" + selectedStatus;

    // Redirect to the constructed URL
    window.location.href = url;
  }
</script>