<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        Gate::authorize('browse-event');
        $events = Event::latest('id');
        if ($request->search) {
            $events = $events->where('name', 'LIKE', '%' . $request->search . '%');
        }
        $events = $events->paginate(10);
        return view('backend.pages.event.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('add-event');
        return view('backend.pages.event.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('add-event');
        return $request;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        Gate::authorize('read-event');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        Gate::authorize('edit-event');

    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Gate::authorize('edit-event');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Gate::authorize('delete-event');
    }
}
// $table->string('name');
// $table->string('slug');
// $table->text('short_description');
// $table->text('description');
// $table->string('featured_photo')->default('default-event.png');
// $table->string('email')->nullable();
// $table->string('phone');
// $table->string('date');
// $table->string('time');
// $table->string('location');
// $table->text('map')->nullable();
// $table->integer('price')->nullable();
// $table->integer('total_seat')->nullable();
// $table->integer('booked_seat')->nullable();