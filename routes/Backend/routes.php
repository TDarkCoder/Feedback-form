<?php

use \Illuminate\Support\Facades\Route;

Route::post('feedback/store', 'Feedback\FeedbackController@store');
