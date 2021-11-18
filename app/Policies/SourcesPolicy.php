<?php

namespace App\Policies;

use App\Models\Admin\User;
use App\Models\Crm\Sources;
use Illuminate\Auth\Access\HandlesAuthorization;

class SourcesPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\Admin\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Admin\User  $user
     * @param  \App\Models\Crm\Sources  $sources
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Sources $sources)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Admin\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Admin\User  $user
     * @param  \App\Models\Crm\Sources  $sources
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Sources $sources)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Admin\User  $user
     * @param  \App\Models\Crm\Sources  $sources
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Sources $sources)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Admin\User  $user
     * @param  \App\Models\Crm\Sources  $sources
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Sources $sources)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Admin\User  $user
     * @param  \App\Models\Crm\Sources  $sources
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Sources $sources)
    {
        //
    }
}
