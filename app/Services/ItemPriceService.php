<?php

namespace App\Services;

use App\Contracts\ItemPriceContract;
use App\ItemPrice;

class ItemPriceService implements ItemPriceContract
{
    public function getItemPrice($position_id, $delivery_date, $order_date)
    {
        return ItemPrice::where('position_id', $position_id)
            ->where('order_date_from', function ($query) use ($delivery_date, $order_date, $position_id) {
                $query->selectRaw('max(order_date_from)')
                    ->from('item_prices')
                    ->where('delivery_date_from', function($query) use ($delivery_date, $order_date, $position_id){
                        $query->selectRaw('max(delivery_date_from)')
                            ->from('item_prices')
                            ->whereDate('delivery_date_from', '<=', $delivery_date)
                            ->where('position_id', $position_id)
                            ->whereDate('order_date_from', '<=', $order_date);
                    });
            })->get();
    }
}