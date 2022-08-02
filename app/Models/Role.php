<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    const ADMIN_ROLE = 'admin';
    const USER_ROLE = 'user';

    protected $fillable = [
        'name'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function hasAdminRole()
    {
        return $this->name === self::ADMIN_ROLE;
    }

    public function hasUserRole()
    {
        return $this->name === self::USER_ROLE;
    }
}
