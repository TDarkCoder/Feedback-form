<?php

namespace App\Domain\Feedback\Factory;

use Illuminate\Support\Str;
use App\Domain\Feedback\Factory\DatabaseStorage;

class FeedbackFactory{

    public static function create($model){
        $model = __NAMESPACE__ .'\\'.Str::ucfirst($model).'Storage';
        return new $model();
    }

}
