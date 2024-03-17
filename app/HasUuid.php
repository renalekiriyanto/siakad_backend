<?php

namespace App;
use Illuminate\Support\Str;

trait HasUuid
{
    protected static function booted(): void
    {
        static::creating(function ($model) {
            $model->id = Str::uuid()->toString();
        });
    }
}
