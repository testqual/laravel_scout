<?php

namespace App\Http\Controllers;

use App\Models\VisitMonitoring;
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    public function index()
    {
        // Visits per year
        $visitFacets = VisitMonitoring::search('')  // Empty query = all records
            ->facet('visit_year')
            ->facets()['visit_year'] ?? [];  // Safe access

        // Example output: ['2023' => 5000, '2024' => 6000, '2025' => 12000]

        // You can do the same for other models (User, Project, etc.)
        // $userFacets = User::search('')->facet('created_year')->facets()['created_year'];

        return view('analytics.dashboard', compact('visitFacets'));
    }
}