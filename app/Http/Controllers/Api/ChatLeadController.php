<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ChatLead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ChatLeadController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'  => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $validated = $validator->validated();

        ChatLead::updateOrCreate(
            ['email' => $validated['email']],          // match on email
            [
                'name'       => $validated['name'],    // update name in case it changed
                'source'     => 'ai_chat',
                'ip_address' => $request->ip(),
            ]
        );

        return response()->json(['success' => true], 201);
    }
}
