<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $table = 'store';
    public $primaryKey = 'store_id';
    public $timestamps = false;

    protected $hidden = [
        'manager_staff_id',
        'address_id',
    ];

    // CUSTOM ATTRIBUTE

    protected $appends = [
        'manager_name'
    ];

    public function getManagerNameAttribute(): string {
        return $this->manager->first_name .' '. $this->manager->last_name;
    }

    // EAGER LOADING

    public function inventory(): \Illuminate\Database\Eloquent\Relations\HasMany {

        // store_id yang di parameter 2, adalah milik Inventory
        // store_id yang di parameter 3, adalah milik Store
        return $this->hasMany(Inventory::class, 'store_id', 'store_id');
    }

    public function manager(): \Illuminate\Database\Eloquent\Relations\BelongsTo {

        // store_id yang di parameter 2, adalah milik Store
        // store_id yang di parameter 3, adalah milik Staff
        return $this->belongsTo(Staff::class, 'manager_staff_id', 'staff_id');
    }

    public function address(): \Illuminate\Database\Eloquent\Relations\BelongsTo {
        return $this->belongsTo(Address::class, 'address_id', 'address_id');
    }
}
