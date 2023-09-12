<?php

namespace Modules\Petcare\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'logo_image',
        'icon',
        'email',
        'phone',
        'telepoh',
        'facebook',
        'tnstagram',
        'tnapchat',
        'twitter',
        'copy_right',
    ];
}
