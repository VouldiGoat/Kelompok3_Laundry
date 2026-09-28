<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'reviews';

    protected $primaryKey = 'reviews_id';

    public $timestamps = false;

    protected $fillable = [
        'nama_pemesan',
        'rating',
        'comment',
    ];

    protected $casts = [
        'rating' => 'integer',
    ];
}
