<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class SendNotification implements ShouldQueue
{
    use Queueable;

    public function __construct(
        private readonly string $message,
        private readonly User $user
    ) {
    }

    public function handle(): void
    {
        Http::post(env('NOTIFICATIONS_URL'), [
            'message' => $this->message,
            'user_id' => $this->user->id,
        ]);
    }
}
