<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CKEditor\CKEditorRequest;
use Exception;
use Illuminate\Support\Facades\Storage;

class CKEditorController extends Controller
{
    public function upload(CKEditorRequest $request)
    {
        try {
            $file = $request->validated();
            $path = Storage::put('upload', $file['upload']);
            return response()->json([
                'url' => asset('storage/' . $path),
                'uploaded' => true
            ]);
        }catch (Exception $e){
            return response()->json([
                'uploaded' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
