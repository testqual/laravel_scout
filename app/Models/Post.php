<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Post extends Model
{
    use Searchable;

    /**
     * Get the index name for the model.
     */
    public function searchableAs(): string
    {
        return 'posts_index';  // Customize if needed
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
            'title' => $this->title,
            'content' => $this->content,
            'body' => $this->body,
        ];
    }
}
