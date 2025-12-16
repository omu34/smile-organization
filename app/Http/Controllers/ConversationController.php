<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ConversationController extends Controller
{
    // REMOVED: $this->middleware('auth') from all methods.
    // Ensure you apply the middleware in routes/web.php instead.

    public function create(Request $request)
    {
        // Security check: Ensure user is logged in (double check)
        if (!Auth::check()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $conv = Conversation::create([
            'owner_type' => get_class(Auth::user()),
            'owner_id' => Auth::id(),
            'title' => $request->input('title') ?? 'Conversation',
        ]);

        return response()->json(['conversation' => $conv], 201);
    }

    /**
     * Append a user message and return conversation messages.
     */
    public function postMessage(Request $request, Conversation $conversation)
    {
        if (!Auth::check()) abort(401);

        // ensure ownership
        if ($conversation->owner_id !== Auth::id()) {
            abort(403);
        }

        $v = Validator::make($request->all(), [
            'role' => 'required|in:user,system',
            'content' => 'required|string',
        ]);

        $v->validate();

        $msg = Message::create([
            'conversation_id' => $conversation->id,
            'role' => $request->input('role'),
            'content' => $request->input('content'),
        ]);

        return response()->json(['message' => $msg], 201);
    }

    public function show(Conversation $conversation)
    {
        if (!Auth::check()) abort(401);

        if ($conversation->owner_id !== Auth::id()) abort(403);

        return response()->json(['conversation' => $conversation->load('messages')]);
    }
}
