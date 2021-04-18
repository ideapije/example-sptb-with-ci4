<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>
<div class="row">
  <div class="col">
    <a href="<?= base_url(); ?>" class="btn btn-dark mb-3">
      <i class="fas fa-arrow-left"></i> <?= lang('Label.back'); ?>
    </a>
  </div>
</div>

<?php if (session()->has('status') && session()->has('message')): ?>
  <div class="alert alert-<?= session()->get('status'); ?> alert-dismissible fade show" role="alert">
    <?= session()->get('message'); ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php endif; ?>

<div class="row mb-3">
  <div class="col-md-4">
    <h4><?= lang('Label.projects.add'); ?></h4>
  </div>
</div>

<div class="row">
  <div class="col">
    <form action="<?= route_to('projects.create'); ?>" method="POST">
      <input type="hidden" name="<?= csrf_token(); ?>" value="<?= csrf_hash(); ?>">

      <div class="mb-3">
        <label for="departure_date" class="form-label"><?= lang('Label.projects.departure_date'); ?></label>
        <input type="date" name="departure_date" class="form-control<?= session()->get('errors.departure_date') ? ' is-invalid' : ''; ?>" id="departure_date" value="<?= old('departure_date', \Carbon\Carbon::now()->format('Y-m-d')); ?>">
        <?php if (session()->get('errors.departure_date')): ?>
          <div class="invalid-feedback">
            <?= session()->get('errors.departure_date'); ?>
          </div>
        <?php endif; ?>
      </div>

      <div class="mb-3">
        <label for="customer" class="form-label"><?= lang('Label.projects.customer'); ?></label>
        <input type="text" name="customer" class="form-control<?= session()->get('errors.customer') ? ' is-invalid' : ''; ?>" id="customer" value="<?= old('customer'); ?>" placeholder="<?= lang('Label.projects.ex_customer'); ?>">
        <?php if (session()->get('errors.customer')): ?>
          <div class="invalid-feedback">
            <?= session()->get('errors.customer'); ?>
          </div>
        <?php endif; ?>
      </div>

      <div class="mb-3">
        <label for="project" class="form-label"><?= lang('Label.projects.project'); ?></label>
        <input type="text" name="project" class="form-control<?= session()->get('errors.project') ? ' is-invalid' : ''; ?>" id="project" value="<?= old('project'); ?>" placeholder="<?= lang('Label.projects.ex_project'); ?>">
        <?php if (session()->get('errors.project')): ?>
          <div class="invalid-feedback">
            <?= session()->get('errors.project'); ?>
          </div>
        <?php endif; ?>
      </div>

      <div class="mb-3">
        <label for="type" class="form-label"><?= lang('Label.projects.type'); ?></label>
        <input type="text" name="type" class="form-control<?= session()->get('errors.type') ? ' is-invalid' : ''; ?>" id="type" value="<?= old('type'); ?>" placeholder="<?= lang('Label.projects.ex_type'); ?>">
        <?php if (session()->get('errors.type')): ?>
          <div class="invalid-feedback">
            <?= session()->get('errors.type'); ?>
          </div>
        <?php endif; ?>
      </div>

      <div class="mb-3">
        <label for="status" class="form-label"><?= lang('Label.projects.status'); ?></label>
        <select name="status" class="form-select<?= session()->get('errors.status') ? ' is-invalid' : ''; ?>" id="status">
          <option<?= ! old('status') ? ' selected' : ''; ?>><?= lang('Label.projects.choose_status'); ?></option>
          <option value="Backlog / TODO"<?= old('status') == 'Backlog / TODO' ? ' selected' : ''; ?>><?= lang('Label.projects.backlog'); ?></option>
          <option value="On Progress"<?= old('status') == 'On Progress' ? ' selected' : ''; ?>><?= lang('Label.projects.on_progress'); ?></option>
          <option value="Done"<?= old('status') == 'Done' ? ' selected' : ''; ?>><?= lang('Label.projects.done'); ?></option>
        </select>
        <?php if (session()->get('errors.status')): ?>
          <div class="invalid-feedback">
            <?= session()->get('errors.status'); ?>
          </div>
        <?php endif; ?>
      </div>

      <hr class="my-4">

      <button class="w-100 btn btn-primary btn-lg" type="submit"><?= lang('Label.projects.add'); ?></button>
    </form>
  </div>
</div>
<?= $this->endSection() ?>
