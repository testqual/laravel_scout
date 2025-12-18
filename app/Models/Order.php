<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Order extends Model
{
    use Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'description',
        'order_date',
        'order_number',
        'customer_name',
        'tax_amount',
        'total_amount'
    ];

    /**
     * Get the index name for the model.
     */
    public function searchableAs(): string
    {
        return 'orders_index';  // Customize if needed
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
            'order_number' => $this->order_number,
            'customer_name' => $this->customer_name,
            'total_amount' => (float) $this->total_amount,
        ];
    }
}
