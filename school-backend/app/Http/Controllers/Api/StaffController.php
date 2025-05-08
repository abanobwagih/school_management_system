<?php

     namespace App\Http\Controllers\Api;

     use App\Http\Controllers\Controller;
     use App\Http\Requests\StoreStaffRequest;
     use App\Http\Requests\UpdateStaffRequest;
     use App\Models\Staff;
     use Illuminate\Http\JsonResponse;

     class StaffController extends Controller
     {
         public function index(): JsonResponse
         {
             $staff = Staff::with(['user', 'department'])->get();
             return response()->json($staff);
         }

         public function store(StoreStaffRequest $request): JsonResponse
         {
             $staff = Staff::create($request->validated());
             return response()->json($staff, 201);
         }

         public function show(Staff $staff): JsonResponse
         {
             $staff->load(['user', 'department']);
             return response()->json($staff);
         }

         public function update(UpdateStaffRequest $request, Staff $staff): JsonResponse
         {
             $staff->update($request->validated());
             return response()->json($staff);
         }

         public function destroy(Staff $staff): JsonResponse
         {
             $staff->delete();
             return response()->json(null, 204);
         }
     }
