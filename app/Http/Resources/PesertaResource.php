<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PesertaResource extends JsonResource
{

    public $status;
    public $message;

    public function __construct($status, $message, $resource){
        parent::__construct($resource);
        $this->status = $status;
        $this->message = $message;
    }


    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */


    public function toArray(Request $request): array
    {
        //return parent::toArray($request);
        return[
            'Seccess'=>$this->status,
            'Message'=>$this->message,
            'Data'=>$this->resource
        ];
    }
}
