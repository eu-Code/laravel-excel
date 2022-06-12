<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    /**
     * Mass assinables
     */
    protected $fillable = [
        'program_name',
        'vendor',
        'day',
        'date',
        'remark',
        'duration',
        'hour',
        'campaign'
    ];
}
