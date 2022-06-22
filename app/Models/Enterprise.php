<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enterprise extends Model
{
    use HasFactory;

    protected $table = "enterprise";

    protected $fillable = [
        'enterprise_name',
        'enterprise_location',
        'enterprise_region',
    ];
}
