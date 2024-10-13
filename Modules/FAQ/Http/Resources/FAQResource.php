<?php

namespace Modules\FAQ\Http\Resources;

use Illuminate\Support\Facades\Route;

class FAQResource extends BaseResource
{
    public function toArray($request)
    {
        $arr = [
            'id' => $this->id,
            'title' => $this['question_' . lang()],
            'desc' => $this['answer_' . lang()],
        ];
    
        return $arr;
    }
}