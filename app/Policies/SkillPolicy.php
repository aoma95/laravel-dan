<?php

namespace App\Policies;

use App\Skill;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SkillPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any skills.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the skill.
     *
     * @param  \App\User  $user
     * @param  \App\Skill  $skill
     * @return mixed
     */
    public function view(User $user, Skill $skill)
    {
        //
    }

    /**
     * Determine whether the user can create skills.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //

    }

    /**
     * Determine whether the user can update the skill.
     *
     * @param  \App\User  $user
     * @param  \App\Skill  $skill
     * @return mixed
     */
    public function update(User $user, Skill $skill)
    {

        return auth()->user() === $user;
    }

    /**
     * Determine whether the user can delete the skill.
     *
     * @param  \App\User  $user
     * @param  \App\Skill  $skill
     * @return mixed
     */
    public function delete(User $user)
    {
        //
//        return auth()->user() === $user;
    }

    /**
     * Determine whether the user can restore the skill.
     *
     * @param  \App\User  $user
     * @param  \App\Skill  $skill
     * @return mixed
     */
    public function restore(User $user, Skill $skill)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the skill.
     *
     * @param  \App\User  $user
     * @param  \App\Skill  $skill
     * @return mixed
     */
    public function forceDelete(User $user, Skill $skill)
    {
        //
    }

    public  function edit(User $user){
        return auth()->user() === $user;
    }

//    public  function store(User $user){
//
//        return auth()->user() === $user;
//        return auth()->user();
//    }
}
