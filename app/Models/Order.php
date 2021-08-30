<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'currency_purchased',
        'exchange_rate',
        'surcharge',
        'amount_purchased',
        'zar_amount_paid',
        'surcharge_amount',
    ];
}
