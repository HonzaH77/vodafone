<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function history()
    {
        return $this->hasMany(History::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false)
        {
            $query->whereHas('project', function ($query) use ($filters) {
                $query->where('name', 'like', '%' . request('search') . '%');
            });

        }
        if ($filters['state'] ?? false)
        {
            $query
                ->where('state', 'like', request('state'));
        }
        if ($filters['type'] ?? false)
        {
            $query
                ->where('type', 'like', request('type'));
        }


    }
}
