<?php

namespace App\Interfaces\Http\Controllers\Feedback;

use App\Domain\Feedback\Factory\FeedbackFactory;
use App\Domain\Feedback\Repository\Contract\FeedbackRepositoryContract;
use App\Interfaces\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{

    private $feedbackRepository;

    public function __construct(FeedbackRepositoryContract $feedbackRepository){
        $this->feedbackRepository = $feedbackRepository;
    }

    public function index(Request $request){

        $feedback = $this->feedbackRepository->specific($request);
        return view('feedback.index', compact('feedback'));

    }

    public function store(Request $request){

        if($request->has('storage')){
            $feedback = FeedbackFactory::create($request->storage);
            return $feedback->make($this->validateRequest($request));
        }

        return false;

    }

    protected function validateRequest($request){
        return $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'message' => 'required|string',
        ]);
    }

}
