<?php

namespace App\Services\BlogServiceManagement;

use App\Models\Blog;

class BlogManagementModelProxy
{
    public function __construct()
    {
    }

    function getAll() {
        // select * from blogs
        return Blog::all();
    }
}
