<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Job extends BaseModel
{
    protected $fillable = [
        'title_ar',
        'title_en',
        'general_desc_ar',
        'general_desc_en',
        'desc_ar',
        'desc_en',
        'employment_type_ar',
        'employment_type_en',
        'work_place_type_ar',
        'work_place_type_en',
        'salary_ar',
        'salary_en',
        'experience_required_ar',
        'experience_required_en',
        'location_ar',
        'location_en',
        'status',
    ];

    protected $table = 'jobs';


    /***  Relations ***/

    public function skills(): belongsToMany
    {
        return $this->belongsToMany(Skill::class,'job_skills','job_id','skill_id');
    }


} //end of class









