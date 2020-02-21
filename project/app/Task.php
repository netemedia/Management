<?php

namespace App;

use App\Interfaces\DurationInterface;
use App\Interfaces\LinkInterface;
use App\Interfaces\MomentInterface;
use App\Support\Time;
use App\Traits\UsesUuid;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Task extends Model implements DurationInterface, MomentInterface
{
    use UsesUuid;
    protected $fillable = [
        'title',
        'url',
        'effort',
        'estimation',
        'start_date',
        'start_hour',
        'limit_date',
        'project_id',
        'resource_id',
        'task_id',
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
        if ( ! $this->start_date ) {
            return '-';
        }

        return Carbon::createFromFormat('Y-m-d', $this->start_date)->locale('fr_FR')->isoFormat('dddd DD MMMM');
    }

    public function getHumanReadableDurationAttribute() : string
    {
        return Time::fromInt($this->estimation);
    }

    public function getHumanReadableStartTimeAttribute() : string
    {
        return Time::fromInt($this->start_hour, 9);
    }

    public function getHumanReadableEndTimeAttribute() : string
    {
        $end_hour = $this->start_hour + $this->estimation;

        return Time::fromInt($end_hour, 9);
    }
}
