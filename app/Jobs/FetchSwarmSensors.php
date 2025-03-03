<?php

namespace App\Jobs;

use App\Models\Swarm;
use App\Models\SwarmState;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class FetchSwarmSensors implements ShouldQueue
{
    use Queueable;

    public function handle(): void
    {
         Swarm::originalAll()->each(function (Swarm $swarm) {
            $state = SwarmState::factory()->create([
                'swarm_id' => $swarm->id,
            ]);

            if ($state->alert) {
                $message = "Swarm {$swarm->name} needs attention, go see its state";
                $user = $swarm->hive->apiary->user;
                SendNotification::dispatch($message, $user);
            }
         });
    }
}
