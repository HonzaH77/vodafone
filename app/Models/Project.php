<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;

class Project extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function task()
    {
        return $this->hasMany(Task::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function attachment()
    {
        return $this->hasMany(Attachment::class);
    }

    public function notification()
    {
        return $this->hasMany(Notification::class);
    }

    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false)
        {
            $query
                ->where('name', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%');
        }
    }

    public function counter($state, $type)
    {
        return Task::where('state', $state)->where('type', $type)->where('project_id', $this->id)->count();
    }
}
