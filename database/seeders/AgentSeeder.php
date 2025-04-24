<?php

namespace Database\Seeders;

use App\Models\Agent;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AgentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $agents = [
            // ['name' => 'UTD Campus Entrance', 'code' => 'utd-campus-entrance', 'type' => 'checkpoint', 'latitude' => 32.9858, 'longitude' => -96.7496],
            // ['name' => 'Campbell Rd & Coit Rd', 'code' => 'campbell-rd-coit-rd', 'type' => 'intersection', 'latitude' => 32.9755, 'longitude' => -96.7704],
            // ['name' => 'US-75 & I-635 Interchange', 'code' => 'us-75-i-635-interchange', 'type' => 'highway_point', 'latitude' => 32.9224, 'longitude' => -96.7602],
            // ['name' => 'I-635 & Marsh Ln', 'code' => 'i-635-marsh-ln', 'type' => 'traffic_light', 'latitude' => 32.9110, 'longitude' => -96.8601],
            // ['name' => 'Belt Line Rd & Webb Chapel', 'code' => 'belt-line-webb-chapel', 'type' => 'intersection', 'latitude' => 32.9217, 'longitude' => -96.8785],
            // ['name' => 'TX-114 & Loop 12', 'code' => 'tx-114-loop-12', 'type' => 'highway_point', 'latitude' => 32.8653, 'longitude' => -96.9221],
            // ['name' => 'International Pkwy Toll', 'code' => 'intl-pkwy-toll', 'type' => 'checkpoint', 'latitude' => 32.9016, 'longitude' => -97.0404],
            // ['name' => 'DFW Airport Terminal A', 'code' => 'dfw-airport-terminal-a', 'type' => 'checkpoint', 'latitude' => 32.8998, 'longitude' => -97.0403],
            // ['name' => 'I-35E & I-30 Interchange', 'code' => 'i-35e-i-30-interchange', 'type' => 'highway_point', 'latitude' => 32.7758, 'longitude' => -96.7969],
            // ['name' => 'Dallas North Tollway & I-635', 'code' => 'dnt-i-635', 'type' => 'intersection', 'latitude' => 32.9115, 'longitude' => -96.8260],
            // ['name' => 'George Bush Turnpike & I-35E', 'code' => 'gbt-i-35e', 'type' => 'traffic_light', 'latitude' => 32.9081, 'longitude' => -96.8922],
            // ['name' => 'Driver Waiting Area', 'code' => 'driver-waiting-area', 'type' => 'checkpoint', 'latitude' => 32.9500, 'longitude' => -96.8000],
            // ['name' => 'Alternate Parking Lot', 'code' => 'alternate-parking-lot', 'type' => 'checkpoint', 'latitude' => 32.8980, 'longitude' => -97.0450],
            // ['name' => 'Reroute via Arapaho Rd', 'code' => 'reroute-via-arapaho-rd', 'type' => 'intersection', 'latitude' => 32.9675, 'longitude' => -96.7500],

            // ['name' => 'DFW Terminal A', 'code' => 'dfw-terminal-a', 'type' => 'checkpoint', 'latitude' => 32.90499459590296, 'longitude' => -97.03632986050778],
            // ['name' => 'DFW Terminal B', 'code' => 'dfw-terminal-b', 'type' => 'checkpoint', 'latitude' => 32.90534203342366, 'longitude' => -97.04491644516602],
            // ['name' => 'DFW Terminal C', 'code' => 'dfw-terminal-c', 'type' => 'checkpoint', 'latitude' => 32.89774624126012, 'longitude' => -97.03576044516623],
            // ['name' => 'DFW Terminal D', 'code' => 'dfw-terminal-d', 'type' => 'checkpoint', 'latitude' => 32.89824196997102, 'longitude' => -97.04478174516632],
            // ['name' => 'DFW Terminal E', 'code' => 'dfw-terminal-e', 'type' => 'checkpoint', 'latitude' => 32.890938252888326, 'longitude' => -97.03569488515262],

            // //  Happy Path
            // ['name' => 'Happy Path A', 'code' => 'happy-path-a', 'type' => 'checkpoint', 'latitude' => 33.000692, 'longitude' => -96.747541],
            // ['name' => 'Happy Path B', 'code' => 'happy-path-b', 'type' => 'checkpoint', 'latitude' => 33.012847, 'longitude' => -96.824757],
            // ['name' => 'Happy Path C', 'code' => 'happy-path-c', 'type' => 'checkpoint', 'latitude' => 32.992168, 'longitude' => -96.829309],
            // ['name' => 'Happy Path D', 'code' => 'happy-path-d', 'type' => 'checkpoint', 'latitude' => 32.985173, 'longitude' => -96.865798],
            // ['name' => 'Happy Path E', 'code' => 'happy-path-e', 'type' => 'checkpoint', 'latitude' => 32.983132, 'longitude' => -96.917765],
            // ['name' => 'Happy Path F', 'code' => 'happy-path-f', 'type' => 'checkpoint', 'latitude' => 32.995021, 'longitude' => -96.951026],
            // ['name' => 'Happy Path G', 'code' => 'happy-path-g', 'type' => 'checkpoint', 'latitude' => 32.986574, 'longitude' => -96.987402],

            // "DFW Terminal A (32.90499459590296, -97.03632986050778)"
            // "DFW Terminal B (32.90534203342366, -97.04491644516602)",
            // "DFW Terminal C (32.89774624126012, -97.03576044516623)",
            // "DFW Terminal D (32.89824196997102, -97.04478174516632)",
            // "DFW Terminal E (32.890938252888326, -97.03569488515262)",

            // Happy Path:

            // A: 33.000692, -96.747541
            // B: 33.012847, -96.824757
            // C: 32.992168, -96.829309
            // D: 32.985173, -96.865798
            // E: 32.983132, -96.917765
            // F: 32.995021, -96.951026
            // G: 32.986574, -96.987402

            ['name' => 'DFW Terminal A', 'code' => 'dfw-terminal-a', 'type' => 'checkpoint', 'latitude' => 32.90499459590296, 'longitude' => -97.03632986050778],
            ['name' => 'DFW Terminal B', 'code' => 'dfw-terminal-b', 'type' => 'checkpoint', 'latitude' => 32.90534203342366, 'longitude' => -97.04491644516602],
            ['name' => 'DFW Terminal C', 'code' => 'dfw-terminal-c', 'type' => 'checkpoint', 'latitude' => 32.89774624126012, 'longitude' => -97.03576044516623],
            ['name' => 'DFW Terminal D', 'code' => 'dfw-terminal-d', 'type' => 'checkpoint', 'latitude' => 32.89824196997102, 'longitude' => -97.04478174516632],
            ['name' => 'DFW Terminal E', 'code' => 'dfw-terminal-e', 'type' => 'checkpoint', 'latitude' => 32.890938252888326, 'longitude' => -97.03569488515262],
            ['name' => 'Garland - N Garland Ave & W Campbell Rd', 'code' => 'garland-n-garland-ave-w-campbell-rd', 'type' => 'checkpoint', 'latitude' => 33.000692, 'longitude' => -96.747541],
            ['name' => 'Plano - W Parker Rd & Independence Pkwy', 'code' => 'plano-w-parker-rd-independence-pkwy', 'type' => 'checkpoint', 'latitude' => 33.012847, 'longitude' => -96.824757],
            ['name' => 'Plano - W Park Blvd & Alma Dr', 'code' => 'plano-w-park-blvd-alma-dr', 'type' => 'checkpoint', 'latitude' => 32.992168, 'longitude' => -96.829309],
            ['name' => 'Plano - W Park Blvd & Coit Rd', 'code' => 'plano-w-park-blvd-coit-rd', 'type' => 'checkpoint', 'latitude' => 32.985173, 'longitude' => -96.865798],
            ['name' => 'Carrollton - E Hebron Pkwy & Marsh Ridge Rd', 'code' => 'carrollton-e-hebron-pkwy-marsh-ridge-rd', 'type' => 'checkpoint', 'latitude' => 32.983132, 'longitude' => -96.917765],
            ['name' => 'Carrollton - E Hebron Pkwy & Josey Ln', 'code' => 'carrollton-e-hebron-pkwy-josey-ln', 'type' => 'checkpoint', 'latitude' => 32.995021, 'longitude' => -96.951026],
            ['name' => 'Carrollton - E Hebron Pkwy & Old Denton Rd', 'code' => 'carrollton-e-hebron-pkwy-old-denton-rd', 'type' => 'checkpoint', 'latitude' => 32.986574, 'longitude' => -96.987402],
        ];

        // properly transform the data with map (not array_walk)
        $agents = collect($agents)->map(function ($agent) {
            return array_merge($agent, [
                // 'state' => collect(['R', 'G', 'B', 'Y'])->random(),
                'state' => 'G', // Default to green
                'code' => Str::slug($agent['name']),
            ]);
        })->toArray();

        Agent::upsert($agents, ['code'], [
            'name',
            'type',
            'state',
            'latitude',
            'longitude',
        ]);
    }
}
