<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'title'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function syncPermissions($request) {

        $permissions = new Collection($request);

        $permissions = $permissions->map(function ($permis) {
            return [
                'role_id'       => $this->id,
                'permission_id' => $permis,
            ];
        });

        return DB::table('permission_role')->insert($permissions->toArray());
    }
}
