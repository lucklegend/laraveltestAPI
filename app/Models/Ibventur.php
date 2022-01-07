<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ibventur extends Model
{
    use HasFactory;
    protected $table = 'ibventur';
    protected $fillable = [
        'sector',
        'email',
        'aveturnover',
        'growingincome',
        'ebitda',
        'avenetincome',
        'pos_result',
        'netfindebt',
        'fixedassets',
        'companypercent',
        'perturncustomer',
        'audited',
        'pur_operations',
        'sell_company',
    ];
}
