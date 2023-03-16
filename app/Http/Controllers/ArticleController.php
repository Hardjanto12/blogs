<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Resources\ArticleResource;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::latest()->get();
        return response()->json([
            'data' => ArticleResource::collection($articles),
            'message' => 'Fetch all articles',
            'success' => true
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
            'title' => 'required|string|max:155',
            'desc' => 'required',
            'text' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => [],
                'message' => $validator->errors(),
                'success' => false
            ]);
        }

        $article = Article::create([
            'category_id' => $request->get('category_id'),
            'user_id' => auth('sanctum')->user()->id,
            'title' => $request->get('title'),
            'desc' => $request->get('desc'),
            'text' => $request->get('text'),
            'status' => $request->get('status'),
            // 'slug' => Str::slug($request->get('title'))
        ]);

        return response()->json([
            'data' => new ArticleResource($article),
            'message' => 'Article created successfully.',
            'success' => true
        ]);
    }
    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return response()->json([
            'data' => new ArticleResource($article),
            'message' => 'Data post found',
            'success' => true
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
            'title' => 'required|string|max:155',
            'desc' => 'required',
            'text' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'data' => [],
                'message' => $validator->errors(),
                'success' => false
            ]);
        }

        $article->update([
            'category_id' => $request->get('category_id'),
            'title' => $request->get('title'),
            'desc' => $request->get('desc'),
            'text' => $request->get('text'),
            // 'slug' => Str::slug($request->get('title'))
        ]);

        return response()->json([
            'data' => new ArticleResource($article),
            'message' => 'Article updated successfully',
            'success' => true
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return response()->json([
            'data' => [],
            'message' => 'Article deleted successfully',
            'success' => true
        ]);
    }
}
