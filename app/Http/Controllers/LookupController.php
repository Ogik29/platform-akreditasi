<?php

namespace App\Http\Controllers;

use App\Models\Supervisor;
use App\Models\ProjectType;
use App\Models\TechField;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LookupController extends Controller
{
    /**
     * Return all dynamic options for project forms.
     */
    public function options(Request $request): JsonResponse
    {
        $supervisors = Supervisor::orderBy('code', 'asc')
            ->get(['id', 'code', 'name']);

        $projectTypes = ProjectType::orderBy('id', 'asc')
            ->get(['id', 'name']);

        $techFields = TechField::orderBy('id', 'asc')
            ->get(['id', 'name', 'color_code']);

        return response()->json([
            'supervisors' => $supervisors,
            'project_types' => $projectTypes,
            'tech_fields' => $techFields,
        ]);
    }
}
