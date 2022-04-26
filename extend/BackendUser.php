<?php namespace RainLab\Api\Extend;

use Backend\Models\User;
use RainLab\Api\Behaviors\HasApiTokens;

class BackendUser
{
    public function subscribe()
    {
        User::extend(function ($user) {
            $user->implementClassWith(HasApiTokens::class);

            $user->addDynamicMethod('can', function ($scope) use ($user) {
                $groups = $user->groups()
                    ->pluck('code')
                    ->toArray();

                if (str_contains($scope, 'group-')) {
                    return in_array(str_replace('group-', '', $scope), $groups);
                }

                return false;
            });
        });
    }
}