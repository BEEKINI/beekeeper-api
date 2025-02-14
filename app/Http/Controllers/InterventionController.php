<?php

namespace App\Http\Controllers;

use App\Http\Requests\InterventionRequest;
use App\Models\Intervention;
use Illuminate\Http\JsonResponse;

class InterventionController extends Controller
{
    /**
     * List all interventions for a given apiary
     *
     * @param int $apiaryId
     * @return jsonResponse
     */
    public function index(int $apiaryId): JsonResponse
    {
        return response()->json([
            'interventions' => Intervention::where('apiary_id', $apiaryId)->get()->flatten() ?? []
        ]);
    }


    /**
     * Show a specific intervention
     *
     * @param int $interventionID
     * @return jsonResponse
     */
    public function show(int $interventionID): JsonResponse
    {
        return response()->json([
            'intervention' => Intervention::findOrFail($interventionID)
        ]);
    }

    /**
     * Store a new intervention
     *
     * @param InterventionRequest $request
     * @return jsonResponse
     */
    public function store(InterventionRequest $request): JsonResponse
    {
        Intervention::create($request->validated());
        return response()->json([
            'message' => 'Intervention created',
            'intervention' => Intervention::latest()->first()
        ], 201);
    }

    /**
     * Update an intervention
     *
     * @param int $interventionID
     * @param InterventionRequest $request
     * @return jsonResponse
     */
    public function update(int $interventionID, InterventionRequest $request): JsonResponse
    {
        $intervention = Intervention::findOrFail($interventionID);
        $intervention->update($request->validated());
        return response()->json([
            'message' => 'Intervention updated',
            'intervention' => $intervention
        ]);
    }

    /**
     * Delete an intervention
     *
     * @param int $interventionID
     * @return jsonResponse
     */
    public function destroy(int $interventionID): JsonResponse
    {
        Intervention::destroy($interventionID);
        return response()->json([
            'message' => 'Intervention deleted'
        ], 204);
    }
}
