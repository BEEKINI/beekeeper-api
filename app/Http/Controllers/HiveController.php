<?php

namespace App\Http\Controllers;

use App\Models\Hive;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\HiveRequest;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class HiveController extends Controller
{
    use AuthorizesRequests;

    public function show(Hive $hive): JsonResponse
    {
        return response()->json($hive);
    }

    public function index(): JsonResponse
    {
        return response()->json(Hive::all());
    }

    public function store(HiveRequest $request): JsonResponse
    {
        $hive = Hive::create($request->validated());

        return response()->json($hive, Response::HTTP_CREATED);
    }

    public function update(HiveRequest $request, Hive $hive): JsonResponse
    {
        $this->authorize('update', $hive);

        $hive->update($request->validated());

        return response()->json($hive);
    }

    public function destroy(Hive $hive): JsonResponse
    {
        $this->authorize('delete', $hive);

        $hive->delete();

        return response()->json('', Response::HTTP_NO_CONTENT);
    }
}
