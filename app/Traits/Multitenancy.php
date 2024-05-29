<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

trait Multitenancy
{

    protected static function bootMultitenancy()
    {
        if (Auth::check()) {
            static::creating(function ($model) {
                $model->user_id = Auth::id();
            });

            static::addGlobalScope('user_id', function (Builder $builder) {
                $builder->where('user_id', Auth::id());
            });
        }
    }
}
