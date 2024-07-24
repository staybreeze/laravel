<?php

namespace App\Presenters;

use App\Models\Good;

class GoodsPresenter
{
    protected $good;

    public function __construct(Good $good)
    {
        $this->good = $good;
    }

}