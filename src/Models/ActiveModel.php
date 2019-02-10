<?php

namespace IDevCode\Models;


use IDevCode\Models\Scopes\ActiveScope;
use Illuminate\Database\Eloquent\Model;

class ActiveModel extends Model
{

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new ActiveScope());
    }
}