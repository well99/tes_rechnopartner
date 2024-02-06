<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TransaksiResource extends JsonResource
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
            'id' => $this->id,
            'description' => $this->description,
            'date' => $this->date,
            'qty' => $this->qty,
            'cost' => $this->cost,
            'price' => $this->price,
            'total_cost' => $this->total_cost,
            'qty_balance' => $this->qty_balance,
            'value_balance' => $this->value_balance,
            'hpp' => $this->hpp,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
