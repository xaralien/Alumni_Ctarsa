<script src="https://cdn.datatables.net/v/bs5/dt-1.13.6/r-2.5.0/datatables.min.js"></script>
<script>

$(document).ready(function () {
        $("#dataalumni").DataTable({
          responsive: true,
          "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
            "iDisplayLength": 50,

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('DataAlumni/ajax_list') ?>",
                "type": "POST",
                "data": function(data) {}
            },
            // Set column definition initialisation properties.
            "columnDefs": [{
                "orderable": false, //set not orderable
            }, ],
        });
      });
</script>