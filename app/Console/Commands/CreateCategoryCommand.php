<?php

namespace App\Console\Commands;

use App\Services\Category\CategoryStoreService;
use DomainException;
use Illuminate\Console\Command;

class CreateCategoryCommand extends Command
{
    protected $signature = 'admin:create-category {name}';


    protected $description = 'Создать категорию';

    private CategoryStoreService $categoryStoreService;

    /**
     * @param CategoryStoreService $categoryStoreService
     */
    public function __construct(CategoryStoreService $categoryStoreService)
    {
        parent::__construct();
        $this->categoryStoreService = $categoryStoreService;
    }


    public function handle()
    {
        try {
            $name = $this->argument('name');
            $this->categoryStoreService->execute($name);
            $this->info('Категория добавлена');
        } catch (DomainException $e) {
            $this->error($e->getMessage());
        }
    }
}
