<?php

namespace App\Jobs;

use App\Models\Intervention;
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
                $message = "Intervention {$intervention->id} is late";
                $user = $intervention->apiary->user;
                SendNotification::dispatch($message, $user);
            });
    }
}
