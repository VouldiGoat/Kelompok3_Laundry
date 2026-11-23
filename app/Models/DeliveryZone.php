<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DeliveryZone extends Model
{
    protected $table = 'delivery_zones';

    protected $primaryKey = 'delivery_zones_id';

    protected $fillable = [
        'zone_name',
        'description',
        'delivery_fee',
        'is_active',
    ];

    protected $casts = [
        'delivery_fee' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    // Satu zona bisa digunakan banyak pesanan
    public function orders(): HasMany
    {
        return $this->hasMany(
            Order::class,
            'delivery_zone_id',
            'delivery_zones_id'
        );
    }
}
