<?php

namespace App\Http\Controllers;

use App\Models\Swarm;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\SwarmRequest;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class SwarmController extends Controller
{
    use AuthorizesRequests;

    public function show(Swarm $swarm): JsonResponse
    {
        $this->authorize('view', $swarm);

        return response()->json($swarm);
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
}
