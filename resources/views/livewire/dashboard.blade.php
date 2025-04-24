<div wire:poll.1s>
    <h2 class="text-xl font-bold mb-4">🚦 Live Traffic Agents</h2>

    <div class="mb-4 flex gap-2">
        <button wire:click="setScenario('happy')"
            class="px-4 py-2 bg-green-500 text-black font-bold rounded cursor-pointer">
            Happy Path
        </button>

        <button wire:click="setScenario('edge-accident')"
            class="px-4 py-2 bg-red-500 text-black font-bold rounded cursor-pointer">
            Accident Case
        </button>

        {{-- <button wire:click="setScenario('edge-delay')"
            class="px-4 py-2 bg-yellow-500 text-black font-bold rounded cursor-pointer">
            Package Delay
        </button>

        <button wire:click="setScenario('edge-parking')"
            class="px-4 py-2 bg-indigo-500 text-black font-bold rounded cursor-pointer">
            No Parking
        </button> --}}
    </div>

    <div class="text-sm text-white mb-2">
        Current scenario: <strong>{{ $currentScenario ?: 'None' }}</strong>
    </div>

    <div class="flex gap-4">
        <div class="w-full">
            <table class="table-auto w-full border-collapse border border-gray-300">
                <thead class="">
                    <tr>
                        <th class="border px-4 py-2 text-left"></th>
                        {{-- <th class="border px-4 py-2 text-left">Type</th> --}}
                        {{-- <th class="border px-4 py-2 text-left">State</th> --}}
                        <th class="border px-4 py-2 text-left">Coordinates</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($agents as $agent)
                                        @php
                                            $backgroundColor = match ($agent->state) {
                                                'R' => '#f56565',
                                                'G' => '#68d391',
                                                'B' => '#63b3ed',
                                                'Y' => '#f6e05e',
                                                default => '#edf2f7',
                                            };

                                            $textColor = match ($agent->state) {
                                                'R' => 'black',
                                                'G' => 'black',
                                                'B' => 'black',
                                                'Y' => 'black',
                                                default => 'black',
                                            };

                                            $stateText = match ($agent->state) {
                                                'R' => 'Red',
                                                'G' => 'Green',
                                                'B' => 'Blue',
                                                'Y' => 'Yellow',
                                                default => 'Unknown',
                                            };
                                        @endphp
                                        <tr style="background-color: {{ $backgroundColor }}; color: {{ $textColor }};">
                                            <td class="border px-4 py-2">{{ $agent->name }}</td>
                                            {{-- <td class="border px-4 py-2 capitalize">{{ $agent->type }}</td> --}}
                                            {{-- <td class="border px-4 py-2">
                                                <span class="inline-block w-4 h-4 rounded-full mr-2 align-middle"></span> {{ $stateText }}
                                            </td> --}}
                                            <td class="border px-4 py-2">
                                                <span>📍 {{ $agent->longitude }}</span>, <span> {{ $agent->latitude }}</span>
                                            </td>
                                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>