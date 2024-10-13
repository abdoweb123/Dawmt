<?php

namespace Modules\Product\Entities;

use App\Models\BaseModel;
use Modules\Category\Entities\Model as Category;
use Modules\Brand\Entities\Model as Brand;
use Modules\Client\Entities\Model as Client;
use Modules\Product\Entities\ModelReview ;

class Model extends BaseModel
{
    protected $guarded = [];

    protected $appends = ['IsFav','rate'];
    
    protected $table = 'products';


    public function Categories()
    {
        return $this->belongsToMany(Category::class, 'product_categories','product_id','category_id');
    }

    public function Brand()
    {
        return $this->belongsTo(Brand::class,'brand_id');
    }
    
    public function Images()
    {
        return $this->hasMany(ModelImage::class,'product_id');
    }

    public function Items()
    {
        return $this->hasMany(ModelItem::class,'product_id');
    }

    public static function boot()
    {
        parent::boot();
        static::created(function ($model) {
            $model->arrangement = $model->id;
            $model->save();
        });
    }
    
    
    public function HasDiscount()
    {
        return $this->discount && $this->from <= now() && $this->to >= now();
    }


    public function Rates()
    {
        return $this->hasMany(ModelReview::class,'product_id');
    }

    public function getRateAttribute()
    {
        if(isset($this->Rates)){
            return $this->Rates->whereNotNull('rate')->where('rate','>=',0)->avg('rate');
        }else{
            return 0;
        }
    }
    public function getIsFavAttribute()
    {
        if (auth('sanctum')->id() || auth('client')->id()) {
            return $this->belongsToMany(Client::class, 'product_favourites','product_id','client_id')->wherePivot('client_id',auth('sanctum')->id() ?? auth('client')->id())->count() > 0;
        }else{
            return false;
        }
    }

}
