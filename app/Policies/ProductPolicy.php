<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Product;

class ProductPolicy
{
    public function edit(User $user, Product $product): bool
    {
        return $product->user->is($user);
    }
}
