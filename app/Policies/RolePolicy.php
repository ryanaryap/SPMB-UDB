<?php
namespace App\Policies;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\Response;
class RolePolicy
{
public function viewAny(User $user): bool
{
return $user->hasRole('Admin');
}
public function view(User $user, Role $role): bool
{
return $user->hasRole('Admin');
}
public function create(User $user): bool
{
return $user->hasRole('Admin');
}
public function update(User $user, Role $role): bool
{
return $user->hasRole('Admin');
}
public function delete(User $user, Role $role): bool
{
return $user->hasRole('Admin');
}
public function restore(User $user, Role $role): bool
{
return $user->hasRole('Admin');
}
public function forceDelete(User $user, Role $role): bool
{
return $user->hasRole('Admin');
}
}