<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionPackage extends Model
{
    use HasFactory;
    protected $table = 'subscription_packages';
    protected $fillable = [
        'packageDuration',
        'packageDurationbn',
        'price',
        'templateQuantity',
        'limitInvoiceGenerate'
    ];


}
