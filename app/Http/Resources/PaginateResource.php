<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PaginateResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'current_page' => $this->currentPage(),
            'per_page' => $this->perPage(),
            'from' => $this->firstItem(),
            'to' => $this->lastItem(),
            'first_page_url' => $this->url(1),
            'prev_page_url' => $this->previousPageUrl(),
            'next_page_url' => $this->nextPageUrl(),
            'items' => $this->items(),
        ];
    }
}
