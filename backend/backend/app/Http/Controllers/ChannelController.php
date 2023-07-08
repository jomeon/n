<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use Illuminate\Http\Request;

class ChannelController extends Controller
{
    public function index()
    {
        $channels = Channel::all();
        return response()->json($channels);
    }

    public function store(Request $request)
    {
        $channel = new Channel();
        $channel->name = $request->input('source');
        $channel->clients = $request->input('customers');
        $channel->save();

        return response()->json($channel, 201);
    }

    public function destroy($id)
    {
        Channel::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
