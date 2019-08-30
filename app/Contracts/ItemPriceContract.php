<?php

namespace App\Contracts;

interface ItemPriceContract
{
    public function getItemPrice($position_id, $delivery_date, $order_date);
}