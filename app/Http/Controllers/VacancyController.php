<?php

namespace App\Http\Controllers;

use App\Http\Requests\VacancyRequest;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class VacancyController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [
            new Middleware('auth', except: ['index', 'show']),
        ];
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
        $vacancy->update($request->validated());

        return redirect()
            ->route('vacancies.show', [
                'id' => $vacancy->id,
                'slug' => $vacancy->slug
            ]);
    }

    public function destroy(Vacancy $vacancy)
    {
        $vacancy->delete();
        return redirect()->route('vacancies.index');
    }
}
