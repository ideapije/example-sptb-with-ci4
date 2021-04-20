<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>
<?php if (session()->has('status') && session()->has('message')): ?>
  <div class="alert alert-<?= session()->get('status'); ?> alert-dismissible fade show" role="alert">
    <?= session()->get('message'); ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php endif; ?>

<div class="row">
  <div class="col">
    <a href="<?= base_url(route_to('projects.new')); ?>" class="btn btn-primary mb-3">
      Buat SPtB
    </a>
  </div>
</div>
<div class="row cols-3 mb-2">
  <div class="col-md-4">
    <select name="status" id="selectStatus" class="form-select" aria-label="Dropdown Project Status">
      <option>All Status</option>
      <option value="Backlog / TODO">Backlog / TODO</option>
      <option value="On Progress">On Progress</option>
      <option value="Done">Done</option>
    </select>
  </div>
</div>
<div class="row mb-3">
  <div class="col-md-4">
    <h4 id="listStatus"><?= 'All Status' ?></h4>
  </div>
</div>
<div class="row">
  <div class="col">
    <table class="table table-striped" id="dataTables">
      <thead class="table-primary text-center">
        <tr>
          <th scope="col">Tanggal Berangkat</th>
          <th scope="col">Pelanggan</th>
          <th scope="col">Proyek</th>
          <th scope="col">Jenis</th>
          <th scope="col">Status</th>
          <th scope="col">Opsi</th>
        </tr>
      </thead>
      <tbody class="text-center">
        <tr>
          <td colspan="6">
            Loading....
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
<?= $this->endSection() ?>
