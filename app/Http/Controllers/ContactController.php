<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
         // Валидация данных
    $request->validate([
        'name' => 'required|string|max:255',
        'phone' => 'required|string|max:20',
        'email' => 'required|email|max:255',
    ]);

    // Подготовленное сообщение с именем пользователя
    $messageContent = "Здравствуйте, {$request->name}!\n\n" .
                      "Ваше сообщение успешно отправлено. Мы свяжемся с вами по номеру {$request->phone}, который вы указали в ближайшее время.\n" .
                      "Если у вас есть дополнительные вопросы, не стесняйтесь обращаться к нам.\n\n" .
                      "С уважением,\nКоманда поддержки.";

    try {
        Mail::raw($messageContent, function ($message) use ($request) {
            $message->to($request->email) // Используем адрес из инпута формы
                    ->subject('Новая заявка на подбор яхт'); // Устанавливаем тему письма
        });

        return back()->with('success', 'Ваше сообщение отправлено успешно!');
    } catch (Exception $e) {
        return back()->with('error', 'Ошибка отправки сообщения: ' . $e->getMessage());
    }
        // Mail::raw('test text', fn ($mail)=> $mail->to('project.laravel@yandex.ru'));
    }
}
