<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Services\BlogServiceManagement\BlogManagementService;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    protected $blogManagementService;

    public function __construct(BlogManagementService $blogManagementService)
    {
        $this->blogManagementService = $blogManagementService;
    }


    public function getAll(Request $request){

        $blogs = $this->blogManagementService->getAll();

        return response()->json([
            'message' => 'success',
            'data' => $blogs
        ]);
    }


    public function createBlog(Request $request) {

        $tile = $request->title;
        $content = $request->content;
        $image = $request->image;
        $user_id = $request->user_id;

        $blog = new Blog();
        $blog->title = $tile;
        $blog->content = $content;
        $blog->image = $image;
        $blog->user_id = $user_id;
        $blog->save();

        return response()->json([
            'message' => 'success',
            'data' => $blog
        ]);
    }

    public function updateBlog(Request $request) {
        $id = $request->id;
        $tile = $request->title;
        $content = $request->content;
        $image = $request->image;
        $user_id = $request->user_id;

        $blog = Blog::find($id);
        $blog->title = $tile;
        $blog->content = $content;
        $blog->image = $image;
        $blog->user_id = $user_id;
        $blog->save();

        return response()->json([
            'message' => 'success',
            'data' => $blog
        ]);
    }

    public function deleteBlog(Request $request) {
        $id = $request->id;

        $blog = Blog::find($id);
        $blog->delete();

        return response()->json([
            'message' => 'success',
            'data' => $blog
        ]);
    }

    public function findByUser(Request $request) {
        $user_id = $request->user_id;

        $blogs = Blog::where('user_id', $user_id)->get();

        return response()->json([
            'message' => 'success',
            'data' => $blogs
        ]);
    }

    public function index()
    {
        return response()->json([
            'message' => 'Hello World!'
        ]);
    }
}
