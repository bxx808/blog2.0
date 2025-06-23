<?php

namespace App\Services\Category;

use App\Models\Category;
use DomainException;

class CategoryStoreService
{
    public function execute(string $name)
    {
        $exists = Category::where('name', $name)->exists();
        if ($exists) {
            throw new  DomainException('Категория уже существует.');
        }
        Category::create([
            'name' => $name,
        ]);
    }
}
