<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="<?= base_url()?>/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="<?= base_url()?>/font-awesome/v5/css/all.min.css"  />
    <link rel="stylesheet" type="text/css" href="<?= base_url()?>/css/datatables.min.css"/>
    <title>SPTB - <?= $title ?? '' ?></title>
</head>

<body>
    <?= $this->include('layouts/header') ?>
    <main class="container p-3">
        <?= $this->renderSection('content') ?>
    </main>
    <?= $this->include('layouts/footer') ?>
</body>

</html>