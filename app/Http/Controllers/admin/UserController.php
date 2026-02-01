<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // Fitur Pencarian
        $query = User::query();

        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('username', 'like', '%' . $request->search . '%');
        }

        $users = $query->latest()->paginate(10);

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();
        $data['password'] = bcrypt($data['password']);
        User::create($data);
        return redirect()->route('admin.users.index')->with('success', 'User berhasil ditambahkan.');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
       $data = $request->validated();
        // Hapus password dari array jika tidak diisi agar tidak meng-update password lama menjadi null/empty
        if (empty($data['password'])) {
            unset($data['password']);
        } else {
            $data['password'] = bcrypt($data['password']);
        }
        $user->update($data);

        return redirect()->route('admin.users.index')->with('success', 'User berhasil diperbarui.');
    }

    public function destroy(User $user)
    {
        // Mencegah admin menghapus dirinya sendiri
        if (auth()->id() === $user->id) {
            return back()->with('error', 'Anda tidak dapat menghapus akun sendiri!');
        }

        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User berhasil dihapus.');
    }
}
