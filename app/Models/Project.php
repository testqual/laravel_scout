<?php

namespace App\Models;

use Binafy\LaravelUserMonitoring\Traits\Actionable;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use Actionable;
    use Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'description',
        'start_date',
        'end_date',
        'status',
    ];

    /**
     * Get the index name for the model.
     */
    public function searchableAs(): string
    {
        return 'projects_index';  // Customize if needed
    }

    /**
     * Get the indexable data array for the model.
     */
    public function toSearchableArray(): array
    {
        $array = $this->toArray();

        // Customize data (e.g., add relations or cast types)
        // For Meilisearch/Typesense, ensure types are correct:
        return [
            'id' => (int) $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'status' => $this->status,
        ];
    }
}
