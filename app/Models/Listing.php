<?php

namespace App\Models;

use App\Traits\Multitenancy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory, Multitenancy;
    protected $fillable = ['title', 'company', 'website', 'email', 'tags', 'location', 'description', 'logo'];

    public function scopeFilter($query, array $filters)
    {
        if ($filters['tag'] ?? false) {
            $query->where('tags', 'like', '%' .  request('tag') . '%');
        }

        if ($filters['search'] ?? false) {
            $query->where('title', 'like', '%' .  request('search') . '%')
                ->orWhere('description', 'like', '%' .  request('search') . '%')
                ->orWhere('tags', 'like', '%' .  request('search') . '%');
        }
    }


    // Relationship to user in the database
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
