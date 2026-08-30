<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Supervisor;
use App\Models\ProjectType;
use App\Models\TechField;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

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
        $allowedTypes = array_values(array_unique(array_merge(
            ProjectType::pluck('name')->all(),
            ['web', 'mobile', 'hardware', 'Web-Based', 'Mobile-Based', 'Hardware-Based']
        )));

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'supervisor' => ['nullable', 'string', 'max:255', Rule::exists('supervisors', 'code')],
            'type' => ['required', 'string', Rule::in($allowedTypes)],
            'tagline' => 'nullable|string|max:500',
            'description' => 'nullable|string',
            'tech_field' => 'nullable|string|max:255',
            'prestasi_level' => 'nullable|string|max:255',
            'external_url' => 'nullable',
            'video_url' => 'nullable|string|max:500',
            'logo_file' => 'nullable|file|image|max:5120', // max 10MB
            'pdf_report_file' => 'nullable|file|mimes:pdf|max:10240', // max 10MB
        ]);

        $supervisor = Supervisor::where('code', $request->input('supervisor'))->first();
        $projectType = ProjectType::where('name', $validated['type'])->first();
        $techField = TechField::where('name', $request->input('tech_field'))->first();

        $projectData = [
            'name' => $validated['name'],
            'supervisor_id' => $supervisor ? $supervisor->id : null,
            'project_type_id' => $projectType ? $projectType->id : null,
            'tech_field_id' => $techField ? $techField->id : null,
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
        $projectData['logo_mitra'] = $this->processPartnerLogos($request, $this->parseArrayInput($request->input('logo_mitra')));
        $teamMembersRaw = $this->parseArrayInput($request->input('team_members'));
        $projectData['team_members'] = $this->processTeamMembers($request, $teamMembersRaw, $validated['name']);
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

        $allowedTypes = array_values(array_unique(array_merge(
            ProjectType::pluck('name')->all(),
            ['web', 'mobile', 'hardware', 'Web-Based', 'Mobile-Based', 'Hardware-Based']
        )));

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'supervisor' => ['nullable', 'string', 'max:255', Rule::exists('supervisors', 'code')],
            'type' => ['required', 'string', Rule::in($allowedTypes)],
            'tagline' => 'nullable|string|max:500',
            'description' => 'nullable|string',
            'tech_field' => 'nullable|string|max:255',
            'prestasi_level' => 'nullable|string|max:255',
            'external_url' => 'nullable',
            'video_url' => 'nullable|string|max:500',
            'logo_file' => 'nullable|file|image|max:5120',
            'pdf_report_file' => 'nullable|file|mimes:pdf|max:10240',
        ]);

        $supervisor = Supervisor::where('code', $request->input('supervisor'))->first();
        $projectType = ProjectType::where('name', $validated['type'])->first();
        $techField = TechField::where('name', $request->input('tech_field'))->first();

        $projectData = [
            'name' => $validated['name'],
            'supervisor_id' => $supervisor ? $supervisor->id : null,
            'project_type_id' => $projectType ? $projectType->id : null,
            'tech_field_id' => $techField ? $techField->id : null,
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
        $projectData['logo_mitra'] = $this->processPartnerLogos($request, $this->parseArrayInput($request->input('logo_mitra')));
        $teamMembersRaw = $this->parseArrayInput($request->input('team_members'));
        $projectData['team_members'] = $this->processTeamMembers($request, $teamMembersRaw, $validated['name']);
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
        if ($request->boolean('delete_pdf')) {
            if ($project->pdf_report && str_contains($project->pdf_report, '/docs/uploads/')) {
                $path = public_path(ltrim($project->pdf_report, '/'));
                if (File::exists($path)) {
                    File::delete($path);
                }
            }

            $projectData['pdf_report'] = null;
        } else if ($request->hasFile('pdf_report_file')) {
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
     * Upload partner logo files and replace matching entries in the partner logo array.
     */
    private function processPartnerLogos(Request $request, array $existingLogos): array
    {
        $result = $existingLogos;

        if (!$request->hasFile('partner_logo_files')) {
            return $result;
        }

        foreach ($request->file('partner_logo_files') as $idx => $file) {
            $filename = time() . '_partner_' . $idx . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/partners'), $filename);

            $uploadedLogo = '/uploads/partners/' . $filename;
            if (isset($result[$idx])) {
                $result[$idx] = $uploadedLogo;
            } else {
                $result[] = $uploadedLogo;
            }
        }

        return $result;
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

    /**
     * Helper method to process team members array, upload photo files, and sync social media structure.
     */
    private function processTeamMembers(Request $request, array $teamMembers, string $projectName): array
    {
        if (!is_array($teamMembers)) {
            return [];
        }

        foreach ($teamMembers as $idx => &$member) {
            if (!is_array($member)) {
                continue;
            }

            // Upload Team Member Photo if file is provided for this index
            if ($request->hasFile("team_photo_file_{$idx}")) {
                $file = $request->file("team_photo_file_{$idx}");
                $filename = time() . '_team_' . $idx . '_' . Str::slug($projectName) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/team'), $filename);
                $member['photo'] = '/uploads/team/' . $filename;
            }

            // Synchronize name & fullname
            if (empty($member['fullname']) && !empty($member['name'])) {
                $member['fullname'] = $member['name'];
            }
            if (empty($member['name']) && !empty($member['fullname'])) {
                $member['name'] = $member['fullname'];
            }

            // Sync instagram into social_media object for showcase compatibility
            if (!empty($member['instagram'])) {
                if (!isset($member['social_media']) || !is_array($member['social_media'])) {
                    $member['social_media'] = [];
                }
                $member['social_media']['instagram'] = $member['instagram'];
            }
        }

        return $teamMembers;
    }
}
