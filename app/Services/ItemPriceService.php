<?php

namespace App\Services;

use App\Contracts\ItemPriceContract;
use App\ItemPrice;

class ItemPriceService implements ItemPriceContract
{
    public function getItemPrice($position_id, $order_date, $delivery_date)
    {
        return ItemPrice::where('id', function ($query) use ($delivery_date, $order_date, $position_id) {
            $query->select('id')
                ->from('item_prices')
                ->where('delivery_date_from', function($query) use ($delivery_date, $order_date, $position_id){
                    $query->selectRaw('max(delivery_date_from)')
                        ->from('item_prices')
                        ->whereDate('delivery_date_from', '<=', $delivery_date)
                        ->where('position_id', $position_id)
                        ->whereDate('order_date_from', '<=', $order_date);
                })
                ->whereDate('order_date_from', '<=', $order_date)
                ->where('position_id', $position_id)
                ->orderBy('order_date_from', 'desc')
                ->take(1);
            })->get();
    }
}