<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Carbon\Carbon;
use Exception;

class EventController extends Controller
{
    /**
     * Parse Carbon format to ignore seconds.
     */
    public function parseDate($dateString, $formats, $outputFormat)
    {
        foreach ($formats as $format) {
            try {
                $data = Carbon::createFromFormat($format, $dateString);
                if ($data) {
                    return $data->format($outputFormat);
                }
            } catch (Exception $e) {
                // Ignore the exception and try the next format
            }
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all();
        $headers = [
            'ID',
            'Name',
            'Date',
            'Description'
        ];
        return view('events.index', compact('events','headers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'description' => 'nullable|string|max:500',
        ]);

        $data = $request->all();
        // $data['date'] = Carbon::createFromFormat('Y-m-d\TH:i', $request->date)->format('Y-m-d H:i:s');
        $data['date'] = $this->parseDate($request->date, ['Y-m-d\TH:i', 'Y-m-d\TH:i:s'], 'Y-m-d H:i:s');
        Event::create($data);

        return redirect()
            ->route('events.index')
            ->with('success', 'Event created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event = Event::findOrFail($id);
        return view('events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // session(['redirect_to' => url()->previous()]);
        if (!session('redirect_to')) {
            session(['redirect_to' => url()->previous()]);
        }
        $event = Event::findOrFail($id);
        return view('events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'description' => 'required|string|max:500',
        ]);

        $data = $request->all();
        // dump($data);
        // $data['date'] = Carbon::createFromFormat('Y-m-d\TH:i', $request->date)->format('Y-m-d H:i:s');
        $data['date'] = $this->parseDate($request->date, ['Y-m-d\TH:i', 'Y-m-d\TH:i:s'], 'Y-m-d H:i:s');
        // dump($data);
        $event = Event::findOrFail($id);
        // dump($event->toArray());
        $event->update($data);
        // dd($event->toArray());

        // $redirectTo = session('redirect_to', route('events.index'));
        if (session('redirect_to')) {
            $redirectTo = session('redirect_to');
            session()->forget('redirect_to');
        } else {
            $redirectTo = route('events.index');
        }

        return redirect()
            // ->route('events.index')
            ->to($redirectTo)
            ->with('success', 'Event updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()
            ->route('events.index')
            ->with('success', 'Event deleted successfully.');
    }
}
