<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SebastianBergmann\CodeCoverage\StaticAnalysis\FileAnalyser;

class Package extends Model
{
    use HasFactory;

    protected $table = 'package';

    protected $fillable = [
        'package_name',
        'user_id',
        'configuration_id',
        'period',
        'bandwidth',
        'date_to_expire',
        'expiration_month_spread',
        'is_expired',
    ];
}
