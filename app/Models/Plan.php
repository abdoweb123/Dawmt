<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Plan extends BaseModel
{
    protected $fillable = ['title_ar', 'title_en', 'desc_ar', 'desc_en', 'arrangement', 'most_popular', 'status'];

    protected $table = 'plans';


    /*** Start Relations ***/
    public function features(): BelongsToMany
    {
        return $this->belongsToMany(Feature::class, 'plan_features','plan_id','feature_id');
    }

} //end of class
