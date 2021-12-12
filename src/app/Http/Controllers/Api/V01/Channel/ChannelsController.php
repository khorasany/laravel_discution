<?php

namespace App\Http\Controllers\Api\V01\Channel;

use App\Http\Controllers\Controller;
use App\Models\Chennel;
use App\Repositories\ChannelRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class ChannelsController extends Controller
{
    public function getAllChannelsList()
    {
        return response()->json(Chennel::all(), 200);
    }

    public function createNewChannel(Request $request)
    {
        $request->validate([
            'name' => ['required']
        ]);

        resolve(ChannelRepository::class)->create($request);

        return response()->json([
            'message' => 'channel created successfully'
        ], 201);
    }
}
