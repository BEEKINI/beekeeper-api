<?php

namespace App\Jobs;

use App\Models\Intervention;
use App\Models\Notification;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class CheckLateTasks implements ShouldQueue
{
    use Queueable;

    public function handle(): void
    {
        Intervention::where('date_end', '<', now())
            ->where('is_finished', false)
            ->get()
            ->each(function (Intervention $intervention) {
                $message = "Intervention {$intervention->title} is late";
                $user = $intervention->apiary->user;
                Notification::insert([
                    'user_id' => $user->id,
                    'message' => $message,
                ]);
                SendNotification::dispatch($message, $user);
            });
    }
}
