<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Stock;
use Exception;
use Illuminate\Support\Facades\DB;

class StockController extends Controller
{
    /**
     * @var Stock
     */
    private $stock;
    /**
     * @var Order
     */
    private $order;

    /**
     * TestController constructor.
     * @param  Stock  $stock
     */
    public function __construct(Stock $stock, Order $order)
    {
        $this->stock = $stock;
        $this->order = $order;
    }

    public function addStock1()
    {
        try {
            DB::beginTransaction();
            if ($this->stock->find(1)->addStock1() <= 0) {
                throw new Exception();
            }
            $this->stock->find(1)->orders()->create(['name' => 'test']);
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }

        return response()->json(true);
    }

    public function addStock2()
    {
        try {
            DB::beginTransaction();
            if ($this->stock->find(2)->addStock2() <= 0) {
                throw new Exception();
            }
            $this->stock->find(2)->orders()->create(['name' => 'test']);
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
        return response()->json(true);
    }
}
