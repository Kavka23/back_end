<?php

namespace App\Http\Controllers;

use App\Http\Requests\JenisRequest;
use Exception;
use Illuminate\Http\Request;
use PDOException;
use App\Models\jenis;

class JenisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $data = jenis::get();
            return Response()->json(['status' => true, 'message' => 'success', 'data' => $data]);
        } catch (Exception | PDOException $e) {
            return Response()->json(['status' => false, 'message' => 'gagal menampilkan data']);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(jenisRequest $request)
    {
        try {
            $data = jenis::create($request->all());
            return response()->json(['status' => true, 'message' => 'input success', 'data' => $data]);
        } catch (Exception | PDOException $e) {
            return response()->json(['status' => false, 'message' => 'gagal input data']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JenisRequest $request, Jenis $jeni)
    {
        try {
            $validated  = $request->validated();
            $data = $jeni->update($validated);
            return response()->json(['status' => true, 'message' => ' update data sukses', 'data' => $data]);
        } catch (Exception | PDOException $e) {
            return response()->json(['status' => false, 'message' => 'gagal update data', 'error_type' => $e]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jenis $jeni)
    {
        try {
            $data = $jeni->delete();
            return Response()->json(['status' => true, 'message' => 'data has been deleted', 'data' => $data]);
        } catch (Exception | PDOException $e) {
            return Response()->json(['status' => false, 'message' => 'data failed to delete']);
        }
    }
}