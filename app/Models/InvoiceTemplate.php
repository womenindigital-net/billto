<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceTemplate extends Model
{
    use HasFactory;
    protected $table = 'invoice_templates';
    protected $fillable = [
        'templateName',
        'templateDesignHtml',
        'templateImage',
        'company'
    ];
}
