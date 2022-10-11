<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $table = 'inventory';
    public $primaryKey = 'inventory_id';
    public $timestamps = false;

    protected $hidden = [
        'film_id',
        'store_id'
    ];

    public function film(): \Illuminate\Database\Eloquent\Relations\BelongsTo {
        return $this->belongsTo(Film::class, 'film_id', 'film_id');
    }

    public function store(): \Illuminate\Database\Eloquent\Relations\BelongsTo {
        return $this->belongsTo(Store::class, 'store_id', 'store_id');
    }
}
