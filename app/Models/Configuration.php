<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    use HasFactory;

    protected $table="configuration";

    public $fillable =[
        'configuration_name',
        'configuration_description',
    ];
}
