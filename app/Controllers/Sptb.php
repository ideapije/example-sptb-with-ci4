<?php

namespace App\Controllers;

class Sptb extends BaseController
{
    public function sptbDatatable()
    {
        $this->load->model('sptb_model', 'sptb');

        return $this->sptb->getSptbDatatable();
    }
}