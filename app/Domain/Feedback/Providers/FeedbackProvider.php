<?php

namespace App\Domain\Feedback\Providers;

use App\Domain\Feedback\Repository\Contract\FeedbackRepositoryContract;
use App\Domain\Feedback\Repository\FeedbackRepository;
use Illuminate\Support\ServiceProvider;

class FeedbackProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(FeedbackRepositoryContract::class, FeedbackRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
