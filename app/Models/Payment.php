<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Payment extends Model
{
    protected $table = 'payments';

    protected $primaryKey = 'payment_id';

    // Migration payments lu menggunakan created_at saja,
    // bukan pasangan created_at dan updated_at.
    public $timestamps = false;

    protected $fillable = [
        'order_id',
        'payment_method',
        'amount',
        'payment_proof',
        'payment_status',
        'paid_at',
        'created_at',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'paid_at' => 'datetime',
        'created_at' => 'datetime',
    ];

    // Satu pembayaran dimiliki oleh satu pesanan
    public function order(): BelongsTo
    {
        return $this->belongsTo(
            Order::class,
            'order_id',
            'orders_id'
        );
    }
}
