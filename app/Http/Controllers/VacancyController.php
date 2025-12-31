<?php

namespace App\Http\Controllers;

use App\Http\Requests\VacancyRequest;
use App\Models\Vacancy;
use Illuminate\Http\Request;

class VacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');
        $vacancies = Vacancy::query()
            ->where('title', 'ILIKE', "%{$search}%")
            ->orderByDesc('created_at')
            ->paginate(6)
            ->withQueryString();

        return view('index')->with('vacancies', $vacancies);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vacancies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VacancyRequest $request)
    {
        $vacancy = Vacancy::create(
            $request->validated() + ['user_id' => 1]
        );

        return redirect()
            ->route('vacancies.show', [
                'id' => $vacancy->id,
                'slug' => $vacancy->slug
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id, string $slug)
    {
        $vacancy = Vacancy::findOrFail($id);

        if ($vacancy->slug !== $slug) {
            return redirect()->route('vacancies.show', [
                'id' => $vacancy->id,
                'slug' => $vacancy->slug
            ]);
        }

        $vacancy->loadMissing('user');
        return view('vacancies.show')->with('vacancy', $vacancy);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, int $id, string $slug)
    {
        $vacancy = Vacancy::findOrFail($id);

        if ($vacancy->slug !== $slug) {
            return redirect()->route('vacancies.edit', [
                'id' => $vacancy->id,
                'slug' => $vacancy->slug
            ]);
        }

        return view('vacancies.edit')->with('vacancy', $vacancy);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VacancyRequest $request, Vacancy $vacancy)
    {
        $vacancy->update($request->validated());

        return redirect()
            ->route('vacancies.show', [
                'id' => $vacancy->id,
                'slug' => $vacancy->slug
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vacancy $vacancy)
    {
        $vacancy->delete();
        return redirect()->route('vacancies.index');
    }
}
