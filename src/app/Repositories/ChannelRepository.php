<?php

namespace App\Repositories;

use App\Models\Chennel;
use Illuminate\Broadcasting\Channel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ChannelRepository
{
    public function all()
    {
        return Chennel::all();
    }

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

    public function update($id, $name)
    {
        $editedChannel = ['name' => $name, 'slug' => Str::slug($name)];
        Chennel::query()->find($id)->update($editedChannel);
        return Chennel::query()->find($id);
    }
}
