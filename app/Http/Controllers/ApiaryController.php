<?php

namespace App\Http\Controllers;

use App\Models\Apiary;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\ApiaryRequest;
use Symfony\Component\HttpFoundation\Response;

class ApiaryController extends Controller
{
    public function show(Apiary $apiary): JsonResponse
    {
        return response()->json($apiary);
    }

    public function index(): JsonResponse
    {
        return response()->json(Apiary::all());
    }

    public function store(ApiaryRequest $request): JsonResponse
    {
        $apiary = Apiary::create(array_merge(
            ['user_id' => auth()->id()],
            $request->validated()
        ));

        return response()->json($apiary, Response::HTTP_CREATED);
    }

    public function update(ApiaryRequest $request, Apiary $apiary): JsonResponse
    {
        $this->authorize('update', $apiary);

        $apiary->update(array_merge(
            ['user_id' => auth()->id()],
            $request->validated()
        ));

        return response()->json($apiary);
    }

    public function destroy(Apiary $apiary): JsonResponse
    {
        $this->authorize('delete', $apiary);

        $apiary->delete();

        return response()->json('', Response::HTTP_NO_CONTENT);
    }
}
