<?php

namespace App\Policies;

use App\User;
use App\Projet;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjetPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the projet.
     *
     * @param  \App\User  $user
     * @param  \App\Projet  $projet
     * @return mixed
     */
    public function view(User $user, Projet $projet)
    {
        //
    }

    /**
     * Determine whether the user can create projets.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
         //
    }

    /**
     * Determine whether the user can update the projet.
     *
     * @param  \App\User  $user
     * @param  \App\Projet  $projet
     * @return mixed
     */
    public function update(User $user, Projet $projet)
    {
         return ( $user->role->nom === 'admin');
    }

    /**
     * Determine whether the user can delete the projet.
     *
     * @param  \App\User  $user
     * @param  \App\Projet  $projet
     * @return mixed
     */
    public function delete(User $user, Projet $projet)
    {
         return ( $user->role->nom === 'admin');
    }
}
