<?php

namespace App\Models;

use Binafy\LaravelUserMonitoring\Models\VisitMonitoring as BaseVisitMonitoring;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VisitMonitoring extends BaseVisitMonitoring
{
    use Searchable;
    use HasFactory;  // Add Searchable here

    /**
     * Get the indexable data array for the model.
     */
    public function toSearchableArray(): array
    {
        return [
            'id' => $this->id,
            'visit_year' => (int) $this->created_at->format('Y'),  // For yearly grouping
            // Add other fields if needed for filtering/searching visits
            'url' => $this->url,
            'user_id' => $this->user_id,
            // etc.
        ];
    }

    /**
     * Customize index name if desired.
     */
    public function searchableAs(): string
    {
        return 'visits_index';
    }
}
