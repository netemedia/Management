<?php

namespace App;

use App\Traits\UsesUuid;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use UsesUuid;

    protected $fillable = [
        'debut',
        'fin',
        'todo',
        'doing',
        'done',
        'observations',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function getPeriodAttribute()
    {
        $debut = Carbon::createFromFormat('Y-m-d', $this->debut)
            ->locale('fr_FR')
            ->isoFormat('dddd DD MMMM');

        $fin = Carbon::createFromFormat('Y-m-d', $this->fin)
            ->locale('fr_FR')
            ->isoFormat('dddd DD MMMM');

        return "du $debut au $fin";
    }
}
