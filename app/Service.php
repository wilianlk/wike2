<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function getCostAttribute($original)
    {
        return '$'.number_format($original);
    }
}
