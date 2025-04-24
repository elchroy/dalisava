<?php

namespace App\Http\Controllers\Api;

use App\DataTransferObjects\NotificationDTO;
use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\NotificationLog;
use App\Support\NotificationMessageResolver;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    public function index()
    {
        return Agent::all();
    }

    public function notifications(Agent $agent)
    {
        return NotificationLog::where('agent_id', $agent->id)->latest()->get();
    }

    public function notifyNextAgents(Request $request)
    {
        $lat = $request->input('latitude');
        $lng = $request->input('longitude');
        // $agentCode = $request->input('next_agent_code'); // next node in path

        // if (! $agentCode || ! $lat || ! $lng) {
        //     return response()->json(['error' => 'Missing required data'], 422);
        // }

        // $agent = Agent::where('code', $agentCode)->first();
        // $agent = Agent::first();

        // Get random agent
        $agent = Agent::inRandomOrder()->first();

        if (! $agent) {
            return response()->json(['error' => 'Agent not found'], 404);
        }

        // $withinRadius = $this->isWithinRadius($lat, $lng, $agent->latitude, $agent->longitude, 50); // 50m radius
        // dump($withinRadius);
        $messageData = NotificationMessageResolver::resolve($agent);

        // if (! $withinRadius) {
        //     return response()->json([
        //         'status' => 'ok',
        //         'near' => false,
        //         'agent_code' => $agent->code,
        //         'agent_type' => $agent->type,
        //         'agent_state' => $agent->state,
        //         'notification_type' => 'KEEP_DRIVING',
        //         'message' => $messageData['text'],
        //     ]);
        // }

        // $dto = new NotificationDTO(
        //     agent_id: $agent->id,
        //     agent_type: $agent->type,
        //     notification_type: $messageData['type'],
        //     message: $messageData['text']
        // );

        return response()->json([
            'status' => 'ok',
            'near' => true,
            'agent_code' => $agent->code,
            'agent_type' => $agent->type,
            'agent_state' => $agent->state,
            'notification_type' => data_get($messageData, 'type'),
            // 'message' => data_get($messageData, 'text',),
            // 'message' => '⚠️ Accident ahead. Proceed with caution. Or take alternate route.',
            // 'message' => '🚨 Danger detected. Slow down immediately.',
            'message' => NotificationMessageResolver::resolveRandom(),
        ]);
    }

    private function isWithinRadius($lat1, $lng1, $lat2, $lng2, float $radius)
    {
        $earthRadius = 6371000; // meters

        $dLat = deg2rad($lat2 - $lat1);
        $dLng = deg2rad($lng2 - $lng1);

        $a = sin($dLat / 2) * sin($dLat / 2) +
             cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
             sin($dLng / 2) * sin($dLng / 2);

        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        $distance = $earthRadius * $c;

        return $distance <= $radius;
    }
}
