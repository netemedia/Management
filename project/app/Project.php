<?php

namespace App;

use App\Interfaces\LinkInterface;
use App\Traits\Notable;
use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;

class Project extends Model implements LinkInterface
{
    use Notable, UsesUuid;
    protected $fillable = [ 'name' ];
    protected $withCount = [ 'tasks' ];

    /**
     * Get the project's client;
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * Get project's related resources.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function resources()
    {
        return $this->belongsToMany(Resource::class)->using(ProjectResource::class)->withPivot([ 'position' ]);
    }

    /**
     * Get project's related tasks.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function getLinkAttribute() : string
    {
        return "/projects/{$this->id}";
    }

    /**
     * @param string $position
     *
     * @return ?Resource
     */
    public function getPosition(string $position) : ?Resource
    {
        return $this->resources->where('pivot.position', $position)->first();
    }
}
