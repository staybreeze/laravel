<?php

namespace App\Presenters;

use App\Models\User;

class OrdersPresenter
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * 獲取並按 product_id 排序用戶的訂單。
     *
     * @return \Illuminate\Support\Collection
     */
    public function getSortedOrders()
    {
        return $this->user->orders()->orderBy('product_id')->get();
    }
}