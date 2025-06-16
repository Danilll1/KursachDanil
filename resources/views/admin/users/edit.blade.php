@extends('admin.layout')

@section('content')
    <div class="container mt-4"  style="padding-top: 100px;">
        <h2>Редактировать Пользователя</h2>
        <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="mt-4">
            @csrf
            <div class="form-group">
                <label for="name">ИМЯ</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
            </div>

            <div class="form-group">
                <label for="email">ПОЧТА</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
            </div>

            <div class="form-group">
                <label for="password">ПАРОЛЬ</label>
                <input type="password" name="password" class="form-control" placeholder="Оставьте пустым, чтобы не менять">
            </div>

            <div class="form-group">
                <label for="is_admin">РОЛЬ</label>
                <input type="text" name="is_admin" class="form-control" value="{{ old('is_admin', $user->is_admin) }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Сохранить изменения</button>
            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Назад к списку</a>
        </form>
    </div>
@endsection
