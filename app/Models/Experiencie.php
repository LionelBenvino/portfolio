<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experiencie extends Model
{
    use HasFactory;

     protected $fillable = [
        "role",
        "start_date",
        "end_date",
        "company",
        "company_url",
        "job_type",
    ];

    /**
     * Get all of the tasks for the Experience
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tasks(): HasMany
    {
        return $this->hasMany(ExperienceTask::class);
    }

}
