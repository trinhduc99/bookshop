<?php

namespace App\Policies;

use App\Category;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

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
        if (($user->role === 'admin')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @return mixed
     */
    public function update(User $user)
    {
        if (($user->role === 'admin')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @return mixed
     */
    public function show(User $user)
    {
        if (($user->role === 'admin')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @return mixed
     */
    public function delete(User $user)
    {
        if (($user->role === 'admin')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param Category $category
     * @return mixed
     */
    public function restore(User $user, Category $category)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param Category $category
     * @return mixed
     */
    public function forceDelete(User $user, Category $category)
    {
        //
    }
}
