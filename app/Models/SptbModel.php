<?php

namespace App\Models;

use CodeIgniter\HTTP\Request
use CodeIgniter\Model;

class SptbModel extends Model
{
    protected $table      = 'sptb';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $columnOrder = [
        'id',
        'departure_date',
        'customer',
        'project',
        'type',
        'status'
    ];

    protected $columnSearch = [
        'customer',
        'project'
    ];

    protected $db;
    protected $dt;

    public function __construct()
    {
        $this->db = db_connect();
        $this->dt = $this->db->table($this->table);
    }

    public function getSptbs()
    {
        return $this->findAll();
    }

    public function getSptbDatatable(Request $request)
    {
        // server side here
        $keyword = $request->getPost('search')['value']);
        $orderByCol = $request->getPost('order')['0']['column'];
        $orderByDir = $request->getPost('order')['0']['dir'];

        foreach ($columnSearch as $key => $value) {
            if ($keyword) {
                if ($i == 0) {
                    $this->dt->groupStart();
                    $this->dt->like($item, $keyword);
                }else{
                    $this->dt->orLike($item, $keyword);
                }

                if (count($this->columnSearch) - 1 == $i) {
                    $this->dt->groupEnd();
                }
            }

            $i++;
        }

        if ($request->getPost('order')) {
            $this->dt->orderBy($this->columnOrder[$orderByCol], $orderByDir);
        }

        if ($request->getPost('length') != -1) {
            $this->dt->limit($request->getPost('length'), $request->getPost('start'));
        }
        
        $query = $this->dt->get();
        $data['data'] = $query->getResult();
        $data['countFiltered'] = $this->dt->countAllResults();
        $data['countAll'] = $this->db->table($this->table)->countAllResults();
        
        return $data;

    }
}