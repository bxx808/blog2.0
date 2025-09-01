<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tag\StoreRequest as TagStoreRequest;
use App\Models\Tag;
use DomainException;
use Exception;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class TagController extends Controller
{
    public function index()
    {
        return view('admin.tag.index', [
            'tags' => Tag::all(),
        ]);
    }

    public function trash()
    {
        return view('admin.tag.trash', [
            'tags' => Tag::onlyTrashed()->get(),
        ]);
    }

    public function store(TagStoreRequest $request)
    {
        try {
            $data = $request->validated();
            Tag::create($data);
            return redirect()->route('admin.tag.index');
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
            return redirect()->route('admin.tag.index')->with('error', 'Такой тег уже существует, Код ошибки: ' . $uuid);
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
            return redirect()->route('admin.tag.index')->with('error', $e->getMessage() . 'Код ошибки: ' . $uuid);
        }
    }

    public function delete(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('admin.tag.index');
    }

    public function recover(int $tagId, Request $request)
    {
        try {
            $fineTags = Tag::onlyTrashed()->find($tagId);
            if ($fineTags === null) {
                throw new DomainException('Тег не найден');
            }
            $fineTags->restore();
            return redirect()->route('admin.tag.index');
        } catch (Exception $e) {
            return redirect()->route('admin.tag.index')->with('error', $e->getMessage());
        }
    }

    public function edit()
    {

    }
}
