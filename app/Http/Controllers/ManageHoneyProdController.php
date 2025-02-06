<?php

namespace App\Http\Controllers;

use App\Http\Requests\HoneyProdRequest;
use App\Models\HoneyProd;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ManageHoneyProdController extends Controller
{
    use AuthorizesRequests;

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json(['honey_productions' => HoneyProd::all()]);
    }

    /**
     * @return JsonResponse
     */
    public function create()
    {
        return response()->json(['message' => 'Not implemented']);
    }

    /**
     * @param HoneyProdRequest $request
     * @return JsonResponse
     */
    public function store(HoneyProdRequest $request): JsonResponse
    {
        $honeyProd = HoneyProd::create($request->validated());

        return response()->json(['honey_production' => $honeyProd], 201);
    }

    /**
     * @param string $id
     * @return JsonResponse
     */
    public function show(string $id): JsonResponse
    {
        return response()->json(['honey_production' => HoneyProd::findOrFail($id)]);
    }

    /**
     * @param string $id
     * @return JsonResponse
     */
    public function edit(string $id): JsonResponse
    {
        return response()->json(['message' => 'Not implemented']);
    }

    /**
     * @param Request $request
     * @param string $id
     * @return JsonResponse
     */
    public function update(Request $request, string $id): JsonResponse
    {
        $honeyProd = HoneyProd::findOrFail($id);
        $honeyProd->update($request->all());

        return response()->json(['honey_production' => $honeyProd]);
    }

    /**
     * @param string $id
     * @return JsonResponse
     */
    public function destroy(string $id): JsonResponse
    {
        HoneyProd::destroy($id);

        return response()->json(['message' => 'Honey production deleted']);
    }
}
