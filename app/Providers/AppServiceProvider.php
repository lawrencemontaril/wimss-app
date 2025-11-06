<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use App\Models\Course;
use App\Models\Dean;
use App\Models\Faculty;
use App\Models\Guardian;
use App\Models\Hei;
use App\Models\Hte;
use App\Models\Student;
use Illuminate\Support\Number;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useTailwind();

        /* -------------------------------- */
        // Custom Directives
        /* -------------------------------- */

        Blade::if('role', function ($roles, $user = null)
        {
            /** @var \App\Models\User */
            $user = $user ?? Auth::user();

            if (!$user) {
                return false;
            }

            $userRole = $user->role;

            $roles = is_array($roles) ? $roles : [$roles];

            return in_array($userRole, $roles);
        });

        Blade::if('notrole', function ($roles, $user = null)
        {
            /** @var \App\Models\User */
            $user = $user ?? Auth::user();

            if (!$user) {
                return false;
            }

            $userRole = $user->role;

            $roles = is_array($roles) ? $roles : [$roles];

            return ! in_array($userRole, $roles);
        });

        Blade::if('cans', function ($abilities, $abilityMatch = 'one', $models, $modelMatch = 'one')
        {
            /** @var \App\Models\User */
            $user = Auth::user();

            if (!is_array($abilities)) {
                $abilities = [$abilities];
            }

            if (!is_array($models)) {
                $models = [$models];
            }

            if ($modelMatch === 'all') {
                foreach ($models as $model) {
                    $modelCan = ($abilityMatch === 'all');
                    foreach ($abilities as $ability) {
                        if ($abilityMatch === 'all' && !$user->can($ability, $model)) {
                            return false;
                        } elseif ($abilityMatch === 'one' && $user->can($ability, $model)) {
                            $modelCan = true;
                        }
                    }
                    if ($abilityMatch === 'all' && !$modelCan) {
                        return false;
                    } elseif ($abilityMatch === 'one' && $modelCan) {
                        return true;
                    }
                }
                return $abilityMatch === 'all';
            } elseif ($modelMatch === 'one') {
                foreach ($models as $model) {
                    foreach ($abilities as $ability) {
                        if ($user->can($ability, $model)) {
                            return true;
                        }
                    }
                }
                return false;
            }

            return false;
        });

        /* -------------------------------- */
        // View Data Caching
        /* -------------------------------- */

        View::composer('partials.sidebar', function ($view)
        {
            /** @var App\Models\User */
            $user = Auth::user();

            $sidebarData = Cache::remember("sidebar_counts_{$user->id}", now()->addMinutes(2), function () use ($user) {
                $data = [
                    'course_count' => Number::abbreviate(Course::count()),
                    'hei_count' => Number::abbreviate(Hei::count()),
                ];

                if ($user->isAdmin()) {
                    $data['dean_count'] = Number::abbreviate(Dean::count());
                    $data['faculty_count'] = Number::abbreviate(Faculty::count());
                    $data['hte_count'] = Number::abbreviate(Hte::count());
                    $data['student_count'] = Number::abbreviate(Student::count());
                    $data['guardian_count'] = Number::abbreviate(Guardian::count());
                }

                if ($user->isDean()) {
                    $data['dean_count'] = Number::abbreviate($user->profile->deans()->count());
                    $data['faculty_count'] = Number::abbreviate($user->profile->faculties()->count());
                    $data['hte_count'] = Number::abbreviate($user->profile->htes()->count());
                    $data['student_count'] = Number::abbreviate($user->profile->students()->count());
                    $data['guardian_count'] = Number::abbreviate($user->profile->guardians()->count());
                }

                if ($user->isFaculty()) {
                    $data['hte_count'] = Number::abbreviate($user->profile->htes()->count());
                    $data['student_count'] = Number::abbreviate($user->profile->students()->count());
                    $data['guardian_count'] = Number::abbreviate($user->profile->guardians()->count());
                }

                if ($user->isHte()) {
                    $data['student_count'] = Number::abbreviate($user->profile->students()->count());
                    $data['guardian_count'] = Number::abbreviate($user->profile->guardians()->count());
                }

                return $data;
            });

            $view->with('sidebarData', $sidebarData);
        });
    }
}
