<?php

namespace App\Domain\Feedback\Factory;

use App\Domain\Feedback\Contract\FeedbackContract;
use App\Domain\Feedback\Feedback;

class DatabaseStorage implements FeedbackContract
{

    public function make($data){
        return Feedback::create($data);
    }

}
