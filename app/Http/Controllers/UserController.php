<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::whereIn('role', ['admin', 'faculty'])
            ->with('facultyProfile')
            ->withCount('news')
            ->orderBy('name')
            ->get();

        return inertia('Admin/Users/Index', [
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Admin/Users/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'bio' => ['nullable', 'string', 'max:1000'],
            'specialization' => ['nullable', 'string', 'max:255'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'faculty',
        ]);

        Faculty::create([
            'user_id' => $user->id,
            'bio' => $request->bio,
            'specialization' => $request->specialization,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $this->authorize('view', $user);

        $user->load('facultyProfile', 'news');

        return inertia('Admin/Users/Show', [
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $this->authorize('update', $user);

        $user->load('facultyProfile');

        return inertia('Admin/Users/Edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $this->authorize('update', $user);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email,'.$user->id],
            'bio' => ['nullable', 'string', 'max:1000'],
            'specialization' => ['nullable', 'string', 'max:255'],
            'password' => ['nullable', 'confirmed', 'min:8'],
            'status' => ['sometimes', 'required', 'in:active,inactive'],
            'role' => ['sometimes', 'required', 'in:admin,faculty'],
        ]);

        // Update user data
        $userData = [
            'name' => $validated['name'],
            'email' => $validated['email'],
        ];

        // Only update role if it's provided and user is admin
        if (auth()->user()->role === 'admin' && isset($validated['role'])) {
            $userData['role'] = $validated['role'];
        }

        // Only update password if it's provided
        if (!empty($validated['password'])) {
            $userData['password'] = bcrypt($validated['password']);
        }

        $user->update($userData);

        // Update or create faculty profile
        $facultyProfileData = [
            'bio' => $validated['bio'] ?? null,
            'specialization' => $validated['specialization'] ?? null,
        ];

        // Only update status if it's provided (for admin)
        if (isset($validated['status'])) {
            $facultyProfileData['status'] = $validated['status'];
        }

        if ($user->facultyProfile) {
            $user->facultyProfile()->update($facultyProfileData);
        } else {
            $user->facultyProfile()->create($facultyProfileData);
        }

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $this->authorize('deleteUser', $user);

        // Delete faculty profile
        $user->facultyProfile()->delete();

        // Delete user (this will cascade delete their news due to foreign key constraint)
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully!');
    }

    /**
     * Toggle user status.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function toggleStatus(User $user)
    {
        $this->authorize('update', $user);
        
        // Check if faculty profile exists, if not create one
        if (!$user->facultyProfile) {
            $user->facultyProfile()->create([
                'status' => 'active', // Default status
                'bio' => '',
                'specialization' => '',
            ]);
            
            return redirect()->back()->with('success', 'Faculty profile created and set to active!');
        }
        
        // Toggle the status
        $newStatus = $user->facultyProfile->status === 'active' ? 'inactive' : 'active';
        
        $user->facultyProfile()->update([
            'status' => $newStatus,
        ]);
        
        return redirect()->back()->with('success', 'User status updated successfully!');
    }
}
