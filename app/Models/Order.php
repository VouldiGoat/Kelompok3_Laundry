<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $primaryKey = 'orders_id';

    protected $fillable = [
    'services_id',
    'nama_pemesan',
    'addresses',
    'pickup_date',
    'satuan',
    'pickup_time',
    'delivery_date',
    'subtotal',
    'delivery_fee',
    'total',
    'notes',
    'orders_status',
    'order_detail_dok',
    ];

    protected $casts = [
        'pickup_date' => 'date',
        'delivery_date' => 'date',
        'subtotal' => 'decimal:2',
        'delivery_fee' => 'decimal:2',
        'total' => 'decimal:2',
    ];
}
