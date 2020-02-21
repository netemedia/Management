<?php

namespace App;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use UsesUuid;

    /**
     * Get the owning notable model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function notable()
    {
        return $this->morphTo();
    }
}
