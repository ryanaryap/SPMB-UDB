<?php
namespace App\Policies;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Auth\Access\Response;
class PermissionPolicy
{
public function viewAny(User $user): bool
{
return $user->hasRole('Admin');
}
public function view(User $user, Permission $permission): bool
{
return $user->hasRole('Admin');
}
public function create(User $user): bool
{
return $user->hasRole('Admin');
}
public function update(User $user, Permission $permission): bool
{
return $user->hasRole('Admin');
}
public function delete(User $user, Permission $permission): bool
{
return $user->hasRole('Admin');
}
public function restore(User $user, Permission $permission): bool
{
return $user->hasRole('Admin');
}
public function forceDelete(User $user, Permission $permission): bool
{
return $user->hasRole('Admin');
}
}