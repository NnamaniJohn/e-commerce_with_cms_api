<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Base\SluggableModel;

class Banner extends SluggableModel
{
    use HasFactory;

    protected $guarded = [];
}
