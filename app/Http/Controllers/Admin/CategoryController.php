<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\EditRequest;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Models\Category;
use App\Services\Category\CategoryStoreService;
use DomainException;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Http\Request;
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

    public function trash()
    {
        return view('admin.category.trash', [
            'categories' => Category::onlyTrashed()->get()
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

    public function edit(EditRequest $request, Category $category)
    {
        try {
            $data = $request->validated();
            $category->update($data);
            return redirect()->route('admin.category.index');
        } catch (UniqueConstraintViolationException $e) {
            $uuid = Str::uuid();
            Log::error($uuid, [
                'message' => $e->getMessage(),
                'code' => $e->getCode(),
                'method' => $request->getMethod(),
                'url' => $request->fullUrl(),
                'line' => $e->getLine(),
                'stack_trace' => $e->getTraceAsString(),
            ]);
            return redirect()->route('admin.category.index')->with('error', 'Такая категория уже существует, Код ошибки: ' . $uuid);
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

    public function delete(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.category.index')->with('success', "Категория «{$category->name}» удалена");
    }

    public function recover(int $category, Request $request)
    {
        try {
            $findCategory = Category::withTrashed()->find($category);
            if ($findCategory === null) {
                throw new DomainException('Категория не найдена');
            }
            $findCategory->restore();
            return redirect()->route('admin.category.index')->with('success', "Категория «{$findCategory->name}» восстановлена");
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

    public function destroy(int $category, Request $request)
    {
        try {
            $findCategory = Category::withTrashed()->find($category);
            if ($findCategory === null) {
                throw new DomainException('Категория не найдена');
            }
            $findCategory->forceDelete();
            return redirect()->route('admin.category.trash')->with('success', "Категория «{$findCategory->name}» успешно удалена");
        }catch (Exception $e) {
            $uuid = Str::uuid();
            Log::error($uuid, [
                'message' => $e->getMessage(),
                'code' => $e->getCode(),
                'method' => $request->getMethod(),
                'url' => $request->fullUrl(),
                'line' => $e->getLine(),
                'stack_trace' => $e->getTraceAsString(),
            ]);
            return redirect()->route('admin.category.trash')->with('error', $e->getMessage() . ', Код ошибки: ' . $uuid);
        }
    }
}
