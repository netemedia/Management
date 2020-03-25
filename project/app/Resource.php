<?php

namespace App;

use App\Interfaces\LinkInterface;
use App\Traits\Notable;
use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model implements LinkInterface
{
    use Notable, UsesUuid;
    protected $fillable = [ 'first_name', 'last_name' ];
    protected $withCount = [ 'projects', 'tasks' ];

    /**
     * Get resource's related projects.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function projects()
    {
        return $this->belongsToMany(Project::class)->using(ProjectResource::class)->withPivot([ 'position' ]);
    }

    /**
     * Get resource's related tasks.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function getNameAttribute()
    {
        return "$this->first_name $this->last_name";
    }

    public function getLinkAttribute() : string
    {
        return "/resources/$this->id";
    }

    public function getCompletedTasksCountAttribute() : int
    {
        return $this->completedTasks()->count();
    }

    public function getCompletedTasksTotalHoursAttribute() : int
    {
        return $this->completedTasks()->sum('estimation');
    }

    public function getTasksTotalHoursAttribute() : int
    {
        return $this->tasks->sum('estimation');
    }

    protected function completedTasks()
    {
        return $this->tasks->where('done', true);
    }

    public function getCompletedHoursAttribute() : int
    {
        return $this->tasks->where('done', true)->sum('estimation');
    }

    public function getHoursAttribute() : int
    {
        return $this->tasks->sum('estimation');
    }

    public function getPercentCompleteAttribute() : ?float
    {
        if($this->completed_hours === 0 ) {
            return null;
        }
        return round($this->completed_hours / $this->hours * 100, 2);
    }

}
