<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Car extends Model
{
    public function users()
    {
        return $this->BelongsTo('App\User');
    }

    public function photo()
    {
        return $this->hasMany('App\Photo', 'car_id');
    }


    public function label($status)
    {
        if ($status == 'Sold') {
            $label = 'label-danger';
        } elseif ($status == 'Available') {
            $label = 'label-info';
        } elseif ($status == 'Reserved') {
            $label = 'label-warning';
        } else {
            $label = 'label-info';
        }
        return $label;
    }

    public function getChachedPhoto($id)
    {

        $photo = Cache::remember('cachedPhoto' . $id, 1140, function () use ($id) {
            return Photo::where('car_id', $id)->first();
        });

        if ($photo->path == '' || $photo->path == null || empty($photo->path)) {
            $return = 'images/no-foto.jpg';
        } else {
            $return = $photo->path;
        }
        return $return;
    }

    public function options(Car $car)
    {
        $array = explode(',', $car->extras);
        return array_filter(array_map('trim', $array));
    }

}
