<?php

namespace App\Support;

use App\Models\Agent;

class NotificationMessageResolver
{
    // Green light
    private static array $happyMessages = [
        '✅ Green light. Safe to go.',
        '✅ All clear. Proceed with confidence.',
        '✅ No obstacles detected. You are good to go.',
        '✅ All systems normal. Continue your journey.',
        '✅ Green light. No issues detected.',
        '✅ Green light. You are clear to proceed.',
        '✅ Green light. No problems detected.',
        '✅ Green light. All systems are go.',
        '✅ Green light. You are clear to go.',
        // '🚦 Traffic light ahead. Follow the signals.',
    ];

    // Red light and yellow light
    private static array $edgeCaseMessages = [
        '🛑 Checkpoint active. Prepare to stop.',
        '🚨 Danger detected. Slow down immediately.',
        '⚠️ Accident ahead. Proceed with caution. Or take alternate route.',
        '🟡 Yellow light. Prepare to stop.',
        'ℹ️ Unknown state. Proceed carefully.',
        '🚔 Police checkpoint ahead. Prepare to stop.',
        '🚔 Police activity ahead. Slow down and be cautious.',
    ];

    // Blue light
    private array $blueLightMessages = [
        '🔵 Blue light. Proceed with caution.',
        '🔵 Emergency vehicle ahead. Give way.',
        '🔵 Emergency vehicle approaching. Clear the way.',
        '🔵 Emergency vehicle in the area. Stay alert.',
        '🔵 Emergency vehicle nearby. Be cautious.',
    ];

    // Orange light
    private array $orangeLightMessages = [
        '🟠 Orange light. Proceed with caution.',
        '🟠 Caution ahead. Slow down and be alert.',
        '🟠 Caution! Potential hazard ahead.',
        '🟠 Caution! Be prepared for unexpected events.',
        '🟠 Caution! Stay alert for any changes.',

        '🚧 Road construction ahead. Slow down and be cautious.',
        '🚧 Road closed ahead. Find an alternate route.',
        '🚧 Road work ahead. Expect delays.',
        '🚧 Detour ahead. Follow the signs.',
        '🚧 Road maintenance in progress. Drive carefully.',
        '🚧 Road repair ahead. Expect delays.',
    ];

    public static function resolve(Agent $agent): string
    {
        return match ($agent->state) {
            'G' => self::$happyMessages[array_rand(self::$happyMessages)],
            'R' => self::$edgeCaseMessages[array_rand(self::$edgeCaseMessages)],
            'B' => self::$blueLightMessages[array_rand(self::$blueLightMessages)],
            'O' => self::$orangeLightMessages[array_rand(self::$orangeLightMessages)],
            'Y' => self::$orangeLightMessages[array_rand(self::$orangeLightMessages)],

            default => 'ℹ️ Unknown state. Proceed carefully.',
        };
    }
}
