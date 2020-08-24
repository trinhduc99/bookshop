<?php

namespace App\Policies;

use App\Product;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @return mixed
     */
    public function view(User $user)
    {
        if (!empty($user->role)) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return mixed
     */
    public function create(User $user)
    {
        if (!empty($user->role)) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param $id
     * @return mixed
     */
    public function update(User $user, $id)
    {
        $product = Product::find($id);
        if ($user->role === 'admin') {
            return true;
        }
        if ($user->id === $product->user_id) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can show the model.
     *
     * @param User $user
     * @param $id
     * @return mixed
     */
    public function deleteView(User $user)
    {
        if ($user->role === 'admin') {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param $id
     * @return mixed
     */
    public function delete(User $user, $id)
    {
        $product = Product::find($id);
        if ($user->role === 'admin') {
            return true;
        }
        if ($user->id === $product->user_id) {
            return true;
        }
        return false;
    }

}
