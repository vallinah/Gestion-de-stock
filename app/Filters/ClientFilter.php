<?php
namespace App\Filters;

class ClientFilter
{
    public function apply($query, $filters)
    {
        if (!empty($filters['name'])) {
            $query->where(function ($q) use ($filters) {
                $q->where('last_name', 'like', "%{$filters['name']}%")
                  ->orWhere('first_name', 'like', "%{$filters['name']}%");
            });
        }

        if (!empty($filters['email'])) {
            $query->where('email', 'like', "%{$filters['email']}%");
        }

        if (!empty($filters['number'])) {
            $query->where('number', 'like', "%{$filters['number']}%");
        }

        return $query;
    }
}