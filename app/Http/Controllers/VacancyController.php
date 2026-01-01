<?php

namespace App\Http\Controllers;

use App\Http\Requests\VacancyRequest;
use App\Models\Vacancy;
use Illuminate\Http\Request;

class VacancyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

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

    public function create()
    {
        return view('vacancies.create');
    }

    public function store(VacancyRequest $request)
    {
        $vacancy = Vacancy::create($request->validated());

        return redirect()
            ->route('vacancies.show', [
                'id' => $vacancy->id,
                'slug' => $vacancy->slug
            ])->with('toast', [
                'type' => "success",
                'message' => "Vacancy created successfully"
            ]);
    }

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

    public function edit(int $id, string $slug)
    {
        $vacancy = Vacancy::findOrFail($id);
        $this->authorize('update', $vacancy);

        if ($vacancy->slug !== $slug) {
            return redirect()->route('vacancies.edit', [
                'id' => $vacancy->id,
                'slug' => $vacancy->slug
            ]);
        }

        return view('vacancies.edit')->with('vacancy', $vacancy);
    }

    public function update(VacancyRequest $request, Vacancy $vacancy)
    {
        $this->authorize('update', $vacancy);

        $vacancy->fill($request->validated());
        $changed = false;

        $route = ['id' => $vacancy->id, 'slug' => $vacancy->slug];

        if ($vacancy->isDirty()) {
            $vacancy->save();
            $changed = $vacancy->wasChanged();
        }

        return redirect()
            ->route('vacancies.show', $route)
            ->with('toast', [
                'type' => $changed ? 'success' : 'info',
                'message' => $changed
                    ? 'Vacancy updated successfully'
                    : 'No changes were made',
            ]);
    }

    public function destroy(Vacancy $vacancy)
    {
        $this->authorize('delete', $vacancy);
        $vacancy->delete();
        return redirect()
            ->route('vacancies.index')
            ->with('toast', [
                'type' => "success",
                'message' => "Vacancy deleted successfully"
            ]);
    }
}
