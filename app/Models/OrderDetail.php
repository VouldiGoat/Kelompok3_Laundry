<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'order_details';

    protected $primaryKey = 'order_detail_id';

    public $timestamps = false;

    protected $fillable = [
        'orders_id',
        'services_id',
        'orders_status',
        'order_detail_dok',
    ];
}
