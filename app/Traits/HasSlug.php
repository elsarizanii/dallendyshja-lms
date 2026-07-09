<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait HasSlug
{
    protected static function bootHasSlug(): void
    {
        static::creating(function ($model) {

            $sourceField = isset($model->titulli) ? 'titulli' : 'emertimi';

            if (empty($model->slug) && isset($model->$sourceField)) {
                $slug = Str::slug($model->$sourceField);
                $originalSlug = $slug;
                $count = 1;

                while (static::where('slug', $slug)->exists()) {
                    $slug = $originalSlug . '-' . $count;
                    $count++;
                }

                $model->slug = $slug;
            }
        });
    }
}