<?php

namespace Modules\Petcare\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['name','price','views','featured'];
    
    protected static function newFactory()
    {
        return \Modules\Petcare\Database\factories\ServiceFactory::new();
    }
}
