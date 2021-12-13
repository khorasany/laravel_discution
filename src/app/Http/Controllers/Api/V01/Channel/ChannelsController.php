<?php

namespace App\Http\Controllers\Api\V01\Channel;

use App\Http\Controllers\Controller;
use App\Models\Chennel;
use App\Repositories\ChannelRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class ChannelsController extends Controller
{
    public function getAllChannelsList()
    {
        $allChannel = resolve(ChannelRepository::class)->all();
        return response()->json($allChannel, Response::HTTP_OK);
    }

    public function createNewChannel(Request $request)
    {
        $request->validate([
            'name' => ['required']
        ]);

        resolve(ChannelRepository::class)->create($request);

        return response()->json([
            'message' => 'channel created successfully'
        ], Response::HTTP_CREATED);
    }

    public function editChannel(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'id' => ['required']
        ]);

        if (!empty($request)) {
            $newChannel = resolve(ChannelRepository::class)->update($request->id, $request->name);

            return response()->json($newChannel, Response::HTTP_OK);
        }

        throw ValidationException::withMessages([
            'message' => 'id & name of channel not exist'
        ]);
    }
}
