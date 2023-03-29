<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Get the users for the area.
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    /**
     * Get the ulps for the area.
     */
    public function ulps()
    {
        return $this->hasMany(Ulp::class);
    }
}
