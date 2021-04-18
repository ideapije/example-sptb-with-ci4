<div class="btn-group" role="group" aria-label="Basic example">
  <a href="<?= isset($id) ? route_to('projects.edit', $id) : '#'; ?>" class="btn btn-warning">
    <i class="far fa-edit"></i>
  </a>

  <a href="#" class="btn btn-primary">
    <i class="fas fa-print"></i>
  </a>

  <a href="<?= isset($id) ? route_to('projects.delete', $id) : '#'; ?>" class="btn btn-danger" onclick="deleteProject(event, this);">
    <i class="far fa-trash-alt"></i>
    <form action="<?= route_to('projects.delete', $id); ?>" method="post">
        <input type="hidden" name="<?= csrf_token(); ?>" value="<?= csrf_hash(); ?>">
        <input type="hidden" name="_method" value="delete">
    </form>
  </a>
</div>
