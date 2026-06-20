<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\SiteAlert;
use Illuminate\Auth\Access\HandlesAuthorization;

class SiteAlertPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:SiteAlert');
    }

    public function view(AuthUser $authUser, SiteAlert $siteAlert): bool
    {
        return $authUser->can('View:SiteAlert');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:SiteAlert');
    }

    public function update(AuthUser $authUser, SiteAlert $siteAlert): bool
    {
        return $authUser->can('Update:SiteAlert');
    }

    public function delete(AuthUser $authUser, SiteAlert $siteAlert): bool
    {
        return $authUser->can('Delete:SiteAlert');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:SiteAlert');
    }

    public function restore(AuthUser $authUser, SiteAlert $siteAlert): bool
    {
        return $authUser->can('Restore:SiteAlert');
    }

    public function forceDelete(AuthUser $authUser, SiteAlert $siteAlert): bool
    {
        return $authUser->can('ForceDelete:SiteAlert');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:SiteAlert');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:SiteAlert');
    }

    public function replicate(AuthUser $authUser, SiteAlert $siteAlert): bool
    {
        return $authUser->can('Replicate:SiteAlert');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:SiteAlert');
    }

}