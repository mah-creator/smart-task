<?php

namespace App\Http\Controllers;

use App\Ai\Agents\TaskBreakdownAgent;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function sendMessage(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
        ]);

        $prompt = $request->message;

        $agent = TaskBreakdownAgent::make();
        $response = $agent->prompt($prompt);

        return response()->json([
            'success' => true,
            'message' => (string) $response,
        ]);
    }
}
