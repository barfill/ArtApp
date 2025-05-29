<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Speaker;
use Illuminate\Support\Facades\Log;

class SpeakerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $speakers = Speaker::all();
        $headers = [
            'ID',
            'First Name',
            'Last Name',
            'Email',
            'Actions',
        ];
        return view('speakers.index', compact('speakers','headers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('speakers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:speakers,email',
        ]);

        Speaker::create($request->all());

        return redirect()
            ->route('speakers.index')
            ->with('success', 'Speaker created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Log::info('SHOW - Redirect URL: ' . session('redirect_to'));
        $speaker = Speaker::findOrFail($id);
        $speakerEventsCount = $speaker->events()->count();
        return view('speakers.show', compact('speaker', 'speakerEventsCount'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (!session('redirect_to')) {
            session(['redirect_to' => url()->previous()]);
        }
        // dd(session('redirect_to'));
        // Log::info('EDIT - Redirect URL: ' . session('redirect_to'));
        $speaker = Speaker::findOrFail($id);
        return view('speakers.edit', compact('speaker'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $speaker = Speaker::findOrFail($id);
        // dump(session('redirect_to'));

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:speakers,email,' . $speaker->id,
        ]);
        // dump(session('redirect_to'));

        $speaker->update($request->all());

        // $redirectTo = session('redirect_to', route('events.index'));
        // dump(session('redirect_to'));

        // session()->forget('redirect_to');
        // dd(session('redirect_to'));
        if (session('redirect_to')) {
            $redirectTo = session('redirect_to');
            session()->forget('redirect_to');
        } else {
            $redirectTo = route('speakers.index');
        }

        return redirect()
            // ->route('speakers.index')
            ->to($redirectTo)
            ->with('success', 'Speaker updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $speaker = Speaker::findOrFail($id);
        $speaker->delete();

        return redirect()
            ->route('speakers.index')
            ->with('success', 'Speaker deleted successfully.');
    }
}
