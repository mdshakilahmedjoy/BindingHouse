<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'address', 'shopname', 'photo', 'account_holder', 'account_number', 'bank_name', 'branch_name', 'city'
    ];
}
