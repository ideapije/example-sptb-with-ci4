<footer class="p-3 mb-2 bg-light text-dark">
  <div class="container text-center">
    <p>
      &copy; Copyright <?= date('Y') ?><br/>
      All Rights reserved. Powered By the <i><a href="https://github.com/ideapije" target="_blank">Tech Engineer Community</a></i>
    </p>
  </div>
</footer>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.24/datatables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script>
$(document).ready(function() {
    $('#dataTables').DataTable( {
        "dom": '<"clearfix"<"float-start"l><"float-end"f>><"mt-3"t><"row"<"col"i><"col"p>>',
        "processing": true,
        "serverSide": true,
        "ajax": "<?= route_to('api.projects.tables') ?>"
    } );
} );

  function deleteProject(event, element) {
    event.preventDefault();

    $(element).children('form').submit();
  }
</script>
