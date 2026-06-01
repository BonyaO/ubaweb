<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\Update;
use Illuminate\Auth\Access\HandlesAuthorization;

class UpdatePolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:Update');
    }

    public function view(AuthUser $authUser, Update $update): bool
    {
        return $authUser->can('View:Update');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:Update');
    }

    public function update(AuthUser $authUser, Update $update): bool
    {
        return $authUser->can('Update:Update');
    }

    public function delete(AuthUser $authUser, Update $update): bool
    {
        return $authUser->can('Delete:Update');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:Update');
    }

    public function restore(AuthUser $authUser, Update $update): bool
    {
        return $authUser->can('Restore:Update');
    }

    public function forceDelete(AuthUser $authUser, Update $update): bool
    {
        return $authUser->can('ForceDelete:Update');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:Update');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:Update');
    }

    public function replicate(AuthUser $authUser, Update $update): bool
    {
        return $authUser->can('Replicate:Update');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:Update');
    }

}