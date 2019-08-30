<?php

namespace App\Http\Controllers;

use App\Contracts\ItemPriceContract;
use App\Http\Requests\GetItemPriceRequest;
use App\ItemPrice;

class ItemPriceController extends Controller
{
    public $itemPriceService;

    public function __construct(ItemPriceContract $itemPriceService)
    {
        $this->itemPriceService = $itemPriceService;
    }

    public function get(GetItemPriceRequest $request)
    {
        return $this->itemPriceService->getItemPrice($request->position_id,
            $request->order_date, $request->delivery_date);
    }
}
