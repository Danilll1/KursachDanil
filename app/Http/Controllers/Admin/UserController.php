<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id) {
        // dd($request->all());
        $request->validate([
            'email' => 'required|email',
            'password' => 'nullable|min:8',
            'name' => 'required|string|max:255',
            'is_admin' => auth()->user()->is_admin ? 'required|boolean' : 'nullable|boolean',
        ]);
    
        $user = User::findOrFail($id);
    
        if (auth()->user()->is_admin || auth()->id() === $user->id) {
            $user->email = $request->email;
            $user->name = $request->name;
    
            // Изменяем права пользователя только для администраторов
            if (auth()->user()->is_admin) {
                $user->is_admin = $request->is_admin; // Изменение прав может требовать отмены булевого логического значения
            }
    
            // Обновление пароля, если указано
            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
            }
    
            $user->save();
    
            return redirect()->route('home')->with('success', 'Пользователь успешно обновлен!');
        } else {
            return response()->json(['error' => 'У вас нет прав для выполнения этого действия.'], 403);
        }
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'Пользователь удалён успешно!');
    }

    // public function index()
    // {
    //     // Получаем всех пользователей с пагинацией (параметр 10 - количество пользователей на странице)
    //     $users = User::paginate(10);
        
    //     // Возвращаем представление с переданными пользователями
    //     return view('admin.user.index', compact('users'));
    // }

}
