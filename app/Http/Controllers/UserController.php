<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function show()
    {
        $user = auth()->user();

        $vacancies = $user->vacancies()->paginate(6);

        return view('users.show')
            ->with([
                'user' => $user,
                'vacancies' => $vacancies
            ]);
    }

    public function edit()
    {
        $user = auth()->user();
        $this->authorize('update', $user);

        return view('users.edit')->with('user', $user);
    }

    public function update(UserRequest $request)
    {
        $user = auth()->user();
        $user->fill($request->validated());
        $changed = false;

        if ($user->isDirty()) {
            $user->save();
            $changed = $user->wasChanged();
        }


        return back()->with('toast', [
            'type' => $changed ? 'success' : 'info',
            'message' => $changed
                ? 'Profile updated successfully'
                : 'No changes were made'
        ]);
    }

    public function destroy()
    {
        $user = auth()->user();
        $this->authorize('delete', $user);

        auth()->logout();
        $user->delete();

        return redirect()
            ->route('vacancies.index')
            ->with('toast', [
                'type' => "success",
                'message' => "Account deleted"
            ]);
    }
}
