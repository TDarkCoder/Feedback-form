<?php


namespace App\Domain\Feedback\Repository;

use App\Domain\Feedback\Feedback;
use App\Domain\Feedback\Repository\Contract\FeedbackRepositoryContract;

class FeedbackRepository implements FeedbackRepositoryContract
{

    public function specific($request)
    {

        if($request->has('storage') && $request->storage === 'text'){
            if(file_exists('storage/feedback/feedback.txt')){
                return collect(file('storage/feedback/feedback.txt'))->map(function($file){
                    return json_decode($file);
                });
            }
            return collect([]);
        }

        return Feedback::all();
    }
}
