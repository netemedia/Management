<?php

namespace App;

use App\Interfaces\DurationInterface;
use App\Interfaces\LinkInterface;
use App\Interfaces\MomentInterface;
use App\Support\Time;
use App\Traits\UsesUuid;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Task extends Model implements MomentInterface
{
    use UsesUuid;
    protected $fillable = [
        'title',
        'url',
        'estimation',
        'day',
        'project_id',
        'resource_id',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function resource()
    {
        return $this->belongsTo(Resource::class);
    }

    public function getMomentAttribute() : string
    {
        if ( ! $this->day ) {
            return '-';
        }

        return Carbon::createFromFormat('Y-m-d', $this->day)->locale('fr_FR')->isoFormat('dddd DD MMMM');
    }
}
