<?php

namespace App\Support;

use App\Models\Agent;

class NotificationMessageResolver
{
    public static function resolve(Agent $agent): string
    {
        return match ($agent->state) {
            'R' => match ($agent->type) {
                'traffic_light' => '🚨 Stop! Red light ahead.',
                'checkpoint' => '🛑 Checkpoint active. Prepare to stop.',
                'accident' => '⚠️ Accident ahead. Proceed with caution. Or take alternate route.',
                default => '🚨 Danger detected. Slow down immediately.',
            },
            'Y' => match ($agent->type) {
                'traffic_light' => '🟡 Yellow light. Prepare to stop.',
                'checkpoint' => '⚠️ Slow down. Checkpoint nearby.',
                default => '⚠️ Be cautious. Yellow alert zone.',
            },
            'G' => match ($agent->type) {
                'traffic_light' => '✅ Green light. Safe to go.',
                default => '✅ All clear.',
            },
            default => 'ℹ️ Unknown state. Proceed carefully.',
        };
    }

    public static function resolveRandom(): string
    {
        $addAccident = rand(0, 1) > 0.5;

        if ($addAccident) {
            return ' ⚠️ Accident ahead. Proceed with caution.';
        }

        $messages = [
            '🛑 Checkpoint active. Prepare to stop.',
            '🚨 Danger detected. Slow down immediately.',
            '⚠️ Accident ahead. Proceed with caution. Or take alternate route.',
            '🟡 Yellow light. Prepare to stop.',
            '✅ Green light. Safe to go.',
            'ℹ️ Unknown state. Proceed carefully.',
            '🚦 Traffic light ahead. Follow the signals.',
            '🚧 Road construction ahead. Slow down and be cautious.',
            '🚧 Road closed ahead. Find an alternate route.',
            '🚧 Road work ahead. Expect delays.',
            '🚧 Detour ahead. Follow the signs.',
            '🚧 Road maintenance in progress. Drive carefully.',
            '🚧 Road repair ahead. Expect delays.',
            // police checkpoint
            '🚔 Police checkpoint ahead. Prepare to stop.',
            '🚔 Police activity ahead. Slow down and be cautious.',
        ];

        return $messages[array_rand($messages)];
    }
}
