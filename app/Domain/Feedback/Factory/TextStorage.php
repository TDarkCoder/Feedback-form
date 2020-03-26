<?php

namespace App\Domain\Feedback\Factory;

use App\Domain\Feedback\Contract\FeedbackContract;
use Illuminate\Support\Facades\Storage;

class TextStorage implements FeedbackContract
{

    public function make($data){

        $storage = 'feedback/feedback.txt';

        if(file_exists('storage/'.$storage)){
            return Storage::append('public/'.$storage, json_encode($data));
        }

        return Storage::put('public/'.$storage, json_encode($data));

    }

}
