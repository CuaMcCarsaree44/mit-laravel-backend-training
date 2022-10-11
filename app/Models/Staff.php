<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $table = 'staff';
    public $primaryKey = 'staff_id';
    public $timestamps = false;

    protected $hidden = ['picture'];
}
