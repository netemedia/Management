<?php

namespace App;

use App\Interfaces\LinkInterface;
use App\Traits\Notable;
use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;

class Client extends Model implements LinkInterface
{
    use Notable, UsesUuid;
    protected $fillable = [ 'name' ];
    protected $withCount = [ 'projects', 'tasks' ];

    /**
     * Get client's related projects.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    /**
     * Get client's related tasks;
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function tasks()
    {
        return $this->hasManyThrough(Task::class, Project::class);
    }

    public function getLinkAttribute() : string
    {
        return "/clients/{$this->id}";
    }

    public function getIsCompleteAttribute() : bool
    {
        return $this->tasks_count === $this->done_tasks_count;
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
