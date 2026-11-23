<?php

namespace App\Models;

use App\Models\Service;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $primaryKey = 'orders_id';

    protected $fillable = [
        'services_id',
        'delivery_zone_id',
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

        // Relasi pesanan dengan layanan
    public function service(): BelongsTo
    {
        return $this->belongsTo(
            Service::class,
            'services_id',
            'services_id'
        );
    }

        // Satu pesanan memiliki data pembayaran
    public function payments(): HasMany
    {
        return $this->hasMany(
            Payment::class,
            'order_id',
            'orders_id'
        );
    }

        // Pesanan memiliki satu zona pengiriman
    public function deliveryZone(): BelongsTo
    {
        return $this->belongsTo(
            DeliveryZone::class,
            'delivery_zone_id',
            'delivery_zones_id'
        );
    }
}