<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\User;
use App\Service\Admin\User\Service;

class UserController extends Controller
{

    protected Service $userService;

    /**
     * Get service
     */

    public function __construct(Service $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Show the user list
     */
    public function index()
    {
        $users = User::paginate(10);
        $rolesUser = User::getRoles();

        return view('admin.user.index', compact('users', 'rolesUser'));
    }

    /**
     * Display the specified user edit form.
     */
    public function edit(User $user)
    {
        $rolesUser = User::getRoles();
        return view('admin.user.edit', compact('user', 'rolesUser'));
    }

    /**
     * Update the specified user in storage.
     */
    public function update(UpdateRequest $request, User $user)
    {
        $data = $request->validated();

        $this->userService->update($data, $user);

        return redirect()->route('admin.user.index');
    }

    public function destroy(User $user)
    {
        /**
         * Remove the specified post from storage.
         */
        $user->delete();
    }

}
