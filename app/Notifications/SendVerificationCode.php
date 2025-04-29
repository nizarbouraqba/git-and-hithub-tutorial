<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Str;

class SendVerificationCode extends Notification
{
    protected $code;

    public function __construct()
    {
        // توليد كود التفعيل عشوائي
        $this->code = Str::random(6); // كود مكون من 6 أحرف
    }

    public function via($notifiable)
    {
        return ['mail']; // إرسال عبر البريد الإلكتروني فقط
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('شكراً لتسجيلك في موقعنا.')
            ->line('كود التفعيل الخاص بك هو: ' . $this->code)
            ->line('يرجى إدخال هذا الكود لتفعيل حسابك.');
    }
}

