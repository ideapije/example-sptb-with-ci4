<footer class="p-3 mb-2 bg-light text-dark">
  <div class="container text-center">
    <p>
      &copy; Copyright <?= date('Y') ?><br/>
      All Rights reserved. Powered By the <i><a href="https://github.com/ideapije" target="_blank">Tech Engineer Community</a></i>
    </p>
  </div>
</footer>
<script src="<?= base_url()?>/js/jquery-3.6.0.min.js" ></script>
<script type="text/javascript" src="<?= base_url()?>/js/datatables.min.js"></script>
<script src="<?= base_url()?>/js/bootstrap.bundle.min.js" ></script>
<script>
$(document).ready(function() {
    var table = $('#dataTables').DataTable( {
        "dom": '<"clearfix"<"float-start"l><"float-end"f>><"mt-3"t><"row"<"col"i><"col"p>>',
        "processing": true,
        "serverSide": true,
        "ajax": {
          "url": "<?= route_to('api.projects.tables') ?>",
          "data": function (data) {
            data.status = $('select#selectStatus').val()
          }
        }
    } );

    $('select#selectStatus').change(function() {
      $('h4#listStatus').html($(this).val() ?? 'All Status');
      table.draw();
    });
} );

  function deleteProject(event, element) {
    event.preventDefault();

    $(element).children('form').submit();
  }
</script>
