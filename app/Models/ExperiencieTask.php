<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExperiencieTask extends Model
{
    use HasFactory;

    protected $fillable = [

        "title",
        "task",
        "experience_id",
    ];

    /**
     * Get the experience that owns the ExperienceTask
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function experience(): BelongsTo
    {
        return $this->belongsTo(Experience::class);
    }
}
