<?php

namespace App\Policies;

use App\User;
use App\These;
use Illuminate\Auth\Access\HandlesAuthorization;

class ThesePolicy
{
    use HandlesAuthorization;

    public function before($user , $ability)
    {
        if($user->role_id == '1')
        {
            return true;
        }
       
    }

    /**
     * Determine whether the user can view the these.
     *
     * @param  \App\User  $user
     * @param  \App\These  $these
     * @return mixed
     */
    public function view(User $user, These $these)
    {
        //
    }

    /**
     * Determine whether the user can create theses.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
       //
    }

    /**
     * Determine whether the user can update the these.
     *
     * @param  \App\User  $user
     * @param  \App\These  $these
     * @return mixed
     */
    public function update(User $user, These $these)
    {
        return ($user->id === $these->user_id || $user->role->nom === 'admin');
    }

    /**
     * Determine whether the user can delete the these.
     *
     * @param  \App\User  $user
     * @param  \App\These  $these
     * @return mixed
     */
    public function delete(User $user, These $these)
    {
        return ($user->id === $these->user_id || $user->role->nom === 'admin');
    }
}
