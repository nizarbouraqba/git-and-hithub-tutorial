<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index() { $feedbacks = Feedback::all(); return view('feedback.index', compact('feedbacks')); }
    public function create() { return view('feedback.create'); }
    public function store(Request $request) { $feedback = Feedback::create($request->all()); return redirect()->route('feedback.index'); }
    public function show($id) { $feedback = Feedback::findOrFail($id); return view('feedback.show', compact('feedback')); }
    public function edit($id) { $feedback = Feedback::findOrFail($id); return view('feedback.edit', compact('feedback')); }
    public function update(Request $request, $id) { $feedback = Feedback::findOrFail($id); $feedback->update($request->all()); return redirect()->route('feedback.index'); }
    public function destroy($id) { $feedback = Feedback::findOrFail($id); $feedback->delete(); return redirect()->route('feedback.index'); }
}
