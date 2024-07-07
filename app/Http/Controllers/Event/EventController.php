<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Http\Requests\Event\StoreRequest;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        foreach ($events as $event) {
            $event->users;
        }
        return response()->json($events);
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        Event::create($data);

        return response()->json([
            'message' => 'Event created',
        ]);
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return response()->json('Event deleted');
    }

    public function update(Event $event)
    {
        auth()->user()->events()->toggle($event);
        return response()->json(['message' => 'Operation done']);
    }
}
