<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\UserStoreRequest;
use App\Http\Requests\Admin\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;


class UserController extends Controller
{
    public function index(): View
    {
        $users = User::all();

        return  view('admin.users.index', [
            'users' => $users
        ]);
    }


    public function create(): View
    {
        return view('admin.users.create');
    }


    public function store(UserStoreRequest $request): RedirectResponse
    {
        User::create($request->validated());

        return to_route('admin.users.index');
    }


    public function show(User $user): View
    {
        return view('admin.users.show', [
            'user' => $user
        ]);
    }


    public function edit(User $user): View
    {
        return view('admin.users.edit', [
            'user' => $user
        ]);
    }


    public function update(UserUpdateRequest $request, User $user): RedirectResponse
    {
        $user->update($request->validated());

        return to_route('admin.users.index');
    }


    public function delete(User $user): RedirectResponse
    {
        $user->delete();

        return to_route('admin.users.index');
    }
}
