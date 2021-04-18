<?php

namespace App\Models;

use CodeIgniter\Model;

class SptbModel extends Model
{
    protected $table      = 'sptb';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'departure_date', 'customer', 'project', 'type', 'status',
    ];

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
}
