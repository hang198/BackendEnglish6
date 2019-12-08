<?php

namespace App\Providers;

use App\Practice;
use App\Repositories\AnswerRepoInterface;
use App\Repositories\impl\AnswerRepoImpl;
use App\Repositories\impl\LessonRepoImpl;
use App\Repositories\impl\PracticeRepoImpl;
use App\Repositories\impl\QuestionRepoImpl;
use App\Repositories\impl\RoleRepoImpl;
use App\Repositories\impl\UnitRepoImpl;
use App\Repositories\impl\UserRepoImpl;
use App\Repositories\LessonRepoInterface;
use App\Repositories\PracticeRepoInterface;
use App\Repositories\QuestionRepoInterface;
use App\Repositories\RoleRepoInterface;
use App\Repositories\UnitRepoInterface;
use App\Repositories\UserRepoInterface;
use App\services\AnswerServiceInterface;
use App\services\impl\AnswerServiceImpl;
use App\Services\impl\LessonServiceImpl;
use App\services\impl\PracticeServiceImpl;
use App\services\impl\QuestionServiceImpl;
use App\services\impl\RoleServiceImpl;
use App\services\impl\UnitServiceImpl;
use App\services\impl\UserServiceImpl;
use App\Services\LessonServiceInterface;
use App\services\PracticeServiceInterface;
use App\services\QuestionServiceInterface;
use App\services\RoleServiceInterface;
use App\services\UnitServiceInterface;
use App\services\UserServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(UserServiceInterface::class, UserServiceImpl::class);
        $this->app->singleton(UserRepoInterface::class, UserRepoImpl::class);
        $this->app->singleton(RoleServiceInterface::class, RoleServiceImpl::class);
        $this->app->singleton(RoleRepoInterface::class, RoleRepoImpl::class);
        $this->app->singleton(UnitServiceInterface::class, UnitServiceImpl::class);
        $this->app->singleton(UnitRepoInterface::class, UnitRepoImpl::class);
        $this->app->singleton(PracticeServiceInterface::class, PracticeServiceImpl::class);
        $this->app->singleton(PracticeRepoInterface::class, PracticeRepoImpl::class);
        $this->app->singleton(QuestionServiceInterface::class, QuestionServiceImpl::class);
        $this->app->singleton(QuestionRepoInterface::class, QuestionRepoImpl::class);
        $this->app->singleton(AnswerServiceInterface::class, AnswerServiceImpl::class);
        $this->app->singleton(AnswerRepoInterface::class, AnswerRepoImpl::class);
        $this->app->singleton(LessonServiceInterface::class, LessonServiceImpl::class);
        $this->app->singleton(LessonRepoInterface::class, LessonRepoImpl::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
