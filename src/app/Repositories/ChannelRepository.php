<?php

namespace App\Repositories;

use App\Models\Chennel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ChannelRepository
{
    /**
     * @param Request $request
     */
    public function create(Request $request): void
    {
        Chennel::created([
            'slug' => Str::slug($request->name),
            'name' => $request->name
        ]);
    }
}
