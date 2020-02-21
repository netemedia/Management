<?php

namespace App\Traits;

use App\Note;

trait Notable
{
    /**
     * Get the model's note.
     */
    public function note()
    {
        return $this->morphTo(Note::class, 'notable');
    }
}