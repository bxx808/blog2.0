<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Models\Category;
use App\Services\Category\CategoryStoreService;
use Illuminate\Support\Str;
use Exception;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    private CategoryStoreService $categoryStoreService;

    public function __construct(CategoryStoreService $categoryStoreService)
    {
        $this->categoryStoreService = $categoryStoreService;
    }


    public function index()
    {
        return view('admin.category.index', [
            'categories' => Category::all()
        ]);
    }

    public function store(StoreRequest $request)
    {
        try {
            $data = $request->validated();
            $this->categoryStoreService->execute($data['category']);
            return redirect()->route('admin.category.index')->with('success', 'Категория успешно добавлена.');
        } catch (Exception $e) {
            $uuid = Str::uuid();
            Log::error($uuid, [
                'message' => $e->getMessage(),
                'code' => $e->getCode(),
                'method' => $request->getMethod(),
                'url' => $request->fullUrl(),
                'line' => $e->getLine(),
                'stack_trace' => $e->getTraceAsString(),
            ]);
            return redirect()->route('admin.category.index')->with('error', $e->getMessage() . 'Код ошибки: ' . $uuid);
        }
    }
}
