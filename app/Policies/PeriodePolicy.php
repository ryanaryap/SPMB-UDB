<?php
namespace App\Policies;
use App\Models\Periode;
use App\Models\User;
use Illuminate\Auth\Access\Response;
class PeriodePolicy
{
public function viewAny(User $user): bool
{
return $user->hasRole('Admin');
}
public function view(User $user, Periode $periode): bool
{
return $user->hasRole('Admin');
}
public function create(User $user): bool
{
return $user->hasRole('Admin');
}
public function update(User $user, Periode $periode): bool
{
return $user->hasRole('Admin');
}
public function delete(User $user, Periode $periode): bool
{
return $user->hasRole('Admin');
}
public function restore(User $user, Periode $periode): bool
{
return $user->hasRole('Admin');
}
public function forceDelete(User $user, Periode $periode): bool
{
return $user->hasRole('Admin');
}
}