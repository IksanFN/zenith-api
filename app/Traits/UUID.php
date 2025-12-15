<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait UUID
{
    /**
     * Boot the trait.
     * @return void
     * @throws \Exception
     */
    protected static function boot()
    {
        parent::boot();

        /**
         * Set the primary key to a UUID.
         */
        static::creating(function ($model) {
            if ($model->getKey() === null) {
                $model->setAttribute($model->getKeyName(), Str::uuid()->toString());
            }
        });
    }

    /**
     * Get the incrementing value for the model.
     *
     * @return bool
     */
    public function getIncrementing()
    {
        return false;
    }

    /**
     * Get the type of the primary key.
     *
     * @return string
     */
    public function getKeyType()
    {
        return 'string';
    }
}
