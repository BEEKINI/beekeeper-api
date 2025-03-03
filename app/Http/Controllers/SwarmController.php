<?php

namespace App\Http\Controllers;

use App\Http\Requests\SwarmRequest;
use App\Models\Swarm;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class SwarmController extends Controller
{
    use AuthorizesRequests;

    public function show(Swarm $swarm): JsonResponse
    {
        $this->authorize('view', $swarm);

        return response()->json($swarm->load('states'));
    }

    public function index(): JsonResponse
    {
        return response()->json(Swarm::all()->flatten());
    }

    public function store(SwarmRequest $request): JsonResponse
    {
        $swarm = Swarm::create($request->validated());

        return response()->json($swarm, Response::HTTP_CREATED);
    }

    public function update(SwarmRequest $request, Swarm $swarm): JsonResponse
    {
        $this->authorize('update', $swarm);

        $swarm->update($request->validated());

        return response()->json($swarm);
    }

    public function destroy(Swarm $swarm): JsonResponse
    {
        $this->authorize('delete', $swarm);

        $swarm->delete();

        return response()->json('', Response::HTTP_NO_CONTENT);
    }

    /**
     * Clone a swarm
     *
     * @param int $swarmOriginID
     * @param swarmRequest $request
     * @return JsonResponse
     */
    public function cloneSwarm(int $swarmOriginID, SwarmRequest $request): JsonResponse
    {
        $swarmOriginID = Swarm::findOrFail($swarmOriginID);
        $this->authorize('view', $swarmOriginID);
        $newSwarm = Swarm::cloneSwarm($swarmOriginID, $request->validated());
        return response()->json($newSwarm, Response::HTTP_CREATED);
    }

    /**
     * List of ascending swarms
     * @param Swarm $swarm
     * @return JsonResponse
     */
    public function ascendantSwarm(Swarm $swarm): JsonResponse
    {
        $this->authorize('view', $swarm);
        $ascendantSwarm = $swarm->ascendantSwarm();
        return response()->json($ascendantSwarm);
    }

}
