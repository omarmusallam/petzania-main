<?php

namespace Modules\Petcare\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AppSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'image_path',
        'text',
        'description',
        'link_path',
        'link_text',
        'link_type',
    ];
}
