<?php
namespace App\Services\BlogServiceManagement;

class BlogManagementService
{

    protected $blogManagementModelProxy;

    public function __construct(BlogManagementModelProxy $blogManagementModelProxy)
    {
        $this->blogManagementModelProxy = $blogManagementModelProxy;
    }

    function getAll() {
        $blogs = $this->blogManagementModelProxy->getAll();

        foreach ($blogs as $blog) {
            $blog->id;
        }

        return $blogs;
    }
}
