<?php

namespace App\Policies;

use App\Models\Newjobs;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class NewjobsPolicy
{
    public function edit(User $user, Newjobs $job): bool
    {
        return $job->user->is($user);
    }
}
