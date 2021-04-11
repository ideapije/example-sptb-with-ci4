<?php

namespace App\Controllers\API;

use CodeIgniter\API\ResponseTrait;

class Projects extends \CodeIgniter\Controller
{
  use ResponseTrait;

  public function tables()
  {
    $view = \Config\Services::renderer();

    return $this->setResponseFormat('json')->respond([
      "draw" =>  1,
      "recordsTotal" => 2,
      "recordsFiltered" => 2,
      "data" => [
        [
          \Carbon\Carbon::now()->subDays(3)->format('d/m/Y'),
          "WIJAYA KARYA INDUSTRI & KONSTRUKSI, PT",
          "Pemb. Tangki Timbun TBBM Semarang",
          "Pesanan Wilayah/divisi",
          $view->render('partials/table-status'),
          $view->render('partials/table-action'),
        ],
        [
          \Carbon\Carbon::now()->subDays(5)->format('d/m/Y'),
          "ADHI KARYA, PT",
          "Pemb. Jembatan Klawing Purbalingga",
          "Pesanan Wilayah/divisi",
          $view->render('partials/table-status'),
          $view->render('partials/table-action')
        ],
      ]
    ], 201);
  }
}
