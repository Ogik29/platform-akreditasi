<?php

namespace App\Http\Controllers;

use App\Models\Supervisor;
use App\Models\ProjectType;
use App\Models\TechField;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LookupManagementController extends Controller
{
    // ==========================================
    // SUPERVISORS CRUD
    // ==========================================
    public function indexSupervisors()
    {
        return response()->json(Supervisor::orderBy('code', 'asc')->get());
    }

    public function storeSupervisor(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required|string|max:20|unique:supervisors,code',
            'name' => 'required|string|max:255',
        ]);

        $supervisor = Supervisor::create($validated);

        return response()->json([
            'message' => 'Dosen Pembimbing berhasil ditambahkan.',
            'data' => $supervisor,
        ], 201);
    }

    public function updateSupervisor(Request $request, $id)
    {
        $supervisor = Supervisor::findOrFail($id);

        $validated = $request->validate([
            'code' => ['required', 'string', 'max:20', Rule::unique('supervisors', 'code')->ignore($supervisor->id)],
            'name' => 'required|string|max:255',
        ]);

        $supervisor->update($validated);

        return response()->json([
            'message' => 'Dosen Pembimbing berhasil diperbarui.',
            'data' => $supervisor,
        ]);
    }

    public function destroySupervisor($id)
    {
        $supervisor = Supervisor::findOrFail($id);
        $supervisor->delete();

        return response()->json([
            'message' => 'Dosen Pembimbing berhasil dihapus.',
        ]);
    }

    // ==========================================
    // PROJECT TYPES CRUD
    // ==========================================
    public function indexProjectTypes()
    {
        return response()->json(ProjectType::orderBy('id', 'asc')->get());
    }

    public function storeProjectType(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:project_types,name',
        ]);

        $type = ProjectType::create($validated);

        return response()->json([
            'message' => 'Tipe Proyek berhasil ditambahkan.',
            'data' => $type,
        ], 201);
    }

    public function updateProjectType(Request $request, $id)
    {
        $type = ProjectType::findOrFail($id);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('project_types', 'name')->ignore($type->id)],
        ]);

        $type->update($validated);

        return response()->json([
            'message' => 'Tipe Proyek berhasil diperbarui.',
            'data' => $type,
        ]);
    }

    public function destroyProjectType($id)
    {
        $type = ProjectType::findOrFail($id);
        $type->delete();

        return response()->json([
            'message' => 'Tipe Proyek berhasil dihapus.',
        ]);
    }

    // ==========================================
    // TECH FIELDS CRUD
    // ==========================================
    public function indexTechFields()
    {
        return response()->json(TechField::orderBy('id', 'asc')->get());
    }

    public function storeTechField(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:tech_fields,name',
            'color_code' => 'nullable|string|max:20',
        ]);

        if (empty($validated['color_code'])) {
            $validated['color_code'] = '#38bdf8';
        }

        $field = TechField::create($validated);

        return response()->json([
            'message' => 'Bidang Teknologi berhasil ditambahkan.',
            'data' => $field,
        ], 201);
    }

    public function updateTechField(Request $request, $id)
    {
        $field = TechField::findOrFail($id);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('tech_fields', 'name')->ignore($field->id)],
            'color_code' => 'nullable|string|max:20',
        ]);

        $field->update($validated);

        return response()->json([
            'message' => 'Bidang Teknologi berhasil diperbarui.',
            'data' => $field,
        ]);
    }

    public function destroyTechField($id)
    {
        $field = TechField::findOrFail($id);
        $field->delete();

        return response()->json([
            'message' => 'Bidang Teknologi berhasil dihapus.',
        ]);
    }
}
