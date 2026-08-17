<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class AdminProjectController extends Controller
{
    /**
     * Display a listing of projects for admin.
     */
    public function index()
    {
        $projects = Project::orderBy('id', 'desc')->get();
        return response()->json($projects);
    }

    /**
     * Store a newly created project in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'supervisor' => 'nullable|string|max:255',
            'type' => 'required|string|in:web,mobile,hardware',
            'tagline' => 'nullable|string|max:500',
            'description' => 'nullable|string',
            'tech_field' => 'nullable|string|max:255',
            'prestasi_level' => 'nullable|string|max:255',
            'external_url' => 'nullable',
            'video_url' => 'nullable|string|max:500',
            'logo_file' => 'nullable|file|image|max:10240', // max 10MB
            'pdf_report_file' => 'nullable|file|mimes:pdf|max:30720', // max 30MB
        ]);

        $projectData = [
            'name' => $validated['name'],
            'supervisor' => $request->input('supervisor'),
            'type' => $validated['type'],
            'tagline' => $request->input('tagline'),
            'description' => $request->input('description'),
            'tech_field' => $request->input('tech_field'),
            'prestasi_level' => $request->input('prestasi_level'),
            'external_url' => $request->input('external_url'),
            'video_url' => $request->input('video_url'),
        ];

        // Process array fields (JSON or Array from Request)
        $projectData['features'] = $this->parseArrayInput($request->input('features'));
        $projectData['funding_awards'] = $this->parseArrayInput($request->input('funding_awards'));
        $projectData['partners'] = $this->parseArrayInput($request->input('partners'));
        $projectData['logo_mitra'] = $this->parseArrayInput($request->input('logo_mitra'));
        $projectData['team_members'] = $this->parseArrayInput($request->input('team_members'));
        $projectData['screenshots'] = $this->parseArrayInput($request->input('screenshots'));
        $projectData['documentations'] = $this->parseArrayInput($request->input('documentations'));

        // Upload Logo if provided
        if ($request->hasFile('logo_file')) {
            $file = $request->file('logo_file');
            $filename = time() . '_' . Str::slug($validated['name']) . '_logo.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/logos'), $filename);
            $projectData['logo'] = '/uploads/logos/' . $filename;
        } else if ($request->filled('logo')) {
            $projectData['logo'] = $request->input('logo');
        }

        // Upload PDF Report if provided
        if ($request->hasFile('pdf_report_file')) {
            $file = $request->file('pdf_report_file');
            $filename = time() . '_' . Str::slug($validated['name']) . '_report.' . $file->getClientOriginalExtension();
            $file->move(public_path('docs/uploads'), $filename);
            $projectData['pdf_report'] = '/docs/uploads/' . $filename;
        } else if ($request->filled('pdf_report')) {
            $projectData['pdf_report'] = $request->input('pdf_report');
        }

        // Upload Multiple Screenshots if provided
        if ($request->hasFile('screenshot_files')) {
            $uploadedScreenshots = [];
            foreach ($request->file('screenshot_files') as $idx => $file) {
                $filename = time() . '_' . $idx . '_' . Str::slug($validated['name']) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/screenshots'), $filename);
                $uploadedScreenshots[] = '/uploads/screenshots/' . $filename;
            }
            $projectData['screenshots'] = array_merge($projectData['screenshots'] ?? [], $uploadedScreenshots);
        }

        // Upload Multiple Documentations if provided
        if ($request->hasFile('documentation_files')) {
            $uploadedDocumentations = [];
            foreach ($request->file('documentation_files') as $idx => $file) {
                $filename = time() . '_' . $idx . '_' . Str::slug($validated['name']) . '_doc.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/documentations'), $filename);
                $uploadedDocumentations[] = '/uploads/documentations/' . $filename;
            }
            $projectData['documentations'] = array_merge($projectData['documentations'] ?? [], $uploadedDocumentations);
        }

        $project = Project::create($projectData);

        return response()->json([
            'message' => 'Proyek berhasil ditambahkan.',
            'project' => $project
        ], 201);
    }

    /**
     * Display the specified project.
     */
    public function show($id)
    {
        $project = Project::findOrFail($id);
        return response()->json($project);
    }

    /**
     * Update the specified project in storage.
     */
    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'supervisor' => 'nullable|string|max:255',
            'type' => 'required|string|in:web,mobile,hardware',
            'tagline' => 'nullable|string|max:500',
            'description' => 'nullable|string',
            'tech_field' => 'nullable|string|max:255',
            'prestasi_level' => 'nullable|string|max:255',
            'external_url' => 'nullable',
            'video_url' => 'nullable|string|max:500',
            'logo_file' => 'nullable|file|image|max:10240',
            'pdf_report_file' => 'nullable|file|mimes:pdf|max:30720',
        ]);

        $projectData = [
            'name' => $validated['name'],
            'supervisor' => $request->input('supervisor'),
            'type' => $validated['type'],
            'tagline' => $request->input('tagline'),
            'description' => $request->input('description'),
            'tech_field' => $request->input('tech_field'),
            'prestasi_level' => $request->input('prestasi_level'),
            'external_url' => $request->input('external_url'),
            'video_url' => $request->input('video_url'),
        ];

        // Process array fields
        $projectData['features'] = $this->parseArrayInput($request->input('features'));
        $projectData['funding_awards'] = $this->parseArrayInput($request->input('funding_awards'));
        $projectData['partners'] = $this->parseArrayInput($request->input('partners'));
        $projectData['logo_mitra'] = $this->parseArrayInput($request->input('logo_mitra'));
        $projectData['team_members'] = $this->parseArrayInput($request->input('team_members'));
        $projectData['screenshots'] = $this->parseArrayInput($request->input('screenshots'));
        $projectData['documentations'] = $this->parseArrayInput($request->input('documentations'));

        // Handle Logo Update
        if ($request->hasFile('logo_file')) {
            $file = $request->file('logo_file');
            $filename = time() . '_' . Str::slug($validated['name']) . '_logo.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/logos'), $filename);
            $projectData['logo'] = '/uploads/logos/' . $filename;
        } else if ($request->has('logo')) {
            $projectData['logo'] = $request->input('logo');
        }

        // Handle PDF Report Update
        if ($request->hasFile('pdf_report_file')) {
            $file = $request->file('pdf_report_file');
            $filename = time() . '_' . Str::slug($validated['name']) . '_report.' . $file->getClientOriginalExtension();
            $file->move(public_path('docs/uploads'), $filename);
            $projectData['pdf_report'] = '/docs/uploads/' . $filename;
        } else if ($request->has('pdf_report')) {
            $projectData['pdf_report'] = $request->input('pdf_report');
        }

        // Handle Screenshot files
        if ($request->hasFile('screenshot_files')) {
            $uploadedScreenshots = [];
            foreach ($request->file('screenshot_files') as $idx => $file) {
                $filename = time() . '_' . $idx . '_' . Str::slug($validated['name']) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/screenshots'), $filename);
                $uploadedScreenshots[] = '/uploads/screenshots/' . $filename;
            }
            $projectData['screenshots'] = array_merge($projectData['screenshots'] ?? [], $uploadedScreenshots);
        }

        // Handle Documentation files
        if ($request->hasFile('documentation_files')) {
            $uploadedDocumentations = [];
            foreach ($request->file('documentation_files') as $idx => $file) {
                $filename = time() . '_' . $idx . '_' . Str::slug($validated['name']) . '_doc.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/documentations'), $filename);
                $uploadedDocumentations[] = '/uploads/documentations/' . $filename;
            }
            $projectData['documentations'] = array_merge($projectData['documentations'] ?? [], $uploadedDocumentations);
        }

        $project->update($projectData);

        return response()->json([
            'message' => 'Proyek berhasil diperbarui.',
            'project' => $project
        ]);
    }

    /**
     * Remove the specified project from storage.
     */
    public function destroy($id)
    {
        $project = Project::findOrFail($id);

        // Delete uploaded files if they are in uploads directory
        if ($project->logo && str_contains($project->logo, '/uploads/')) {
            $path = public_path(ltrim($project->logo, '/'));
            if (File::exists($path)) {
                File::delete($path);
            }
        }

        if ($project->pdf_report && str_contains($project->pdf_report, '/docs/uploads/')) {
            $path = public_path(ltrim($project->pdf_report, '/'));
            if (File::exists($path)) {
                File::delete($path);
            }
        }

        $project->delete();

        return response()->json([
            'message' => 'Proyek berhasil dihapus.'
        ]);
    }

    /**
     * Helper method to parse input into array (supports JSON string or array).
     */
    private function parseArrayInput($input): array
    {
        if (empty($input)) {
            return [];
        }

        if (is_array($input)) {
            return $input;
        }

        if (is_string($input)) {
            $decoded = json_decode($input, true);
            if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                return $decoded;
            }
        }

        return [];
    }
}
