<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Category;
use App\Http\Requests\LessonRequest;
use App\Models\Level;
use Inertia\Inertia;
class LessonController extends Controller
{
    const NUMBER_OF_LESSONS = 25;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $number = self::NUMBER_OF_LESSONS;
        $lessons = Lesson::paginate($number);
        return inertia('Lessons/Index', [
            'lessons' => $lessons
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $levels = Level::all();
        return Inertia('Lessons/Create', [
            'categories' => $categories,
            'levels' => $levels
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LessonRequest $request)
    {
        Lesson::create($request->validated());
        return redirect()->route('lessons.index')->with('success', 'Lesson created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lesson $lesson)
    {
        return inertia('Lessons/Edit', [
            'lesson' => $lesson
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LessonRequest $request, Lesson $lesson)
    {
        if($lesson->update($request->validated())){
            return redirect()->route('lessons.index')->with('success', 'Lesson updated successfully.');
        }
        return back()->with('error', 'Failed to update lesson.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lesson $lesson)
    {
        if($lesson->delete()){
            return redirect()->route('lessons.index')->with('success', 'Lesson deleted successfully.');
        }
        return back()->with('error', 'Failed to delete lesson.');
    }
}
