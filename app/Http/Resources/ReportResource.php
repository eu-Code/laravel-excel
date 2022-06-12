<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReportResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'program_name'=>$this->program_name,
            'vendor'=>$this->vendor,
            'day'=>$this->day,
            'date'=>$this->date,
            'remark'=>$this->remark,
            'duration'=>$this->duration,
            'hour'=>$this->hour,
            'campagin'=>$this->campaign
        ];
    }
}
