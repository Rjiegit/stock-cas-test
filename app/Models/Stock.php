<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function addStock1()
    {
        return $this
            ->where('id', '=', $this->id)
            ->where('count', '>', 0)
            ->decrement('count', 1);
    }

    public function addStock2()
    {
        return $this
            ->where('id', '=', $this->id)
            ->where('updated_at', '=', $this->updated_at)
            ->where('count', '>', 0)
            ->decrement('count', 1);
    }
}
