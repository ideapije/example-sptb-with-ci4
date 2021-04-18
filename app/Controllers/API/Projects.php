<?php

namespace App\Controllers\API;

use Carbon\Carbon;
use CodeIgniter\API\ResponseTrait;
use DataTables;

class Projects extends \CodeIgniter\Controller
{
    use ResponseTrait;

    public function dummy()
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

    public function tables()
    {
        $dbConnection = [
            'host' => env('database.default.hostname'),
            'db' => env('database.default.database'),
            'user' => env('database.default.username'),
            'pass' => env('database.default.password'),
        ];
        $view = \Config\Services::renderer();

        $columns = [
            [
                'db' => 'departure_date',
                'dt' => 0,
                'formatter' => function (string $value, array $row) {
                    return Carbon::parse($value)->format('d/m/Y');
                }
            ],
            ['db' => 'customer', 'dt' => 1],
            ['db' => 'project', 'dt' => 2],
            ['db' => 'type', 'dt' => 3],
            [
                'db' => 'status',
                'dt' => 4,
                'formatter' => function (string $value, array $row) use ($view) {
                    return $view->setVar('status', $value)->render('partials/table-status');
                }
            ],
            [
                'db' => 'id',
                'dt' => 5,
                'formatter' => function (string $value, array $row) use ($view) {
                    return $view->setVar('id', $value)->render('partials/table-action');
                }
            ]
        ];
        return $this->setResponseFormat('json')->respond(
            DataTables::simple(
                $this->request->getVar(),
                $dbConnection,
                $table = 'sptb',
                $primaryKey = 'id',
                $columns = $columns
            )
        );
    }
}
