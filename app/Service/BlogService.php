<?php

namespace App\Service;

use App\Entity\Blog;
use App\Helper\SiteHelper;
use App\Helper\ValidationUtil;
use App\Model\BlogCreateRequest;
use App\Model\BlogCreateResponse;
use App\Repository\BlogRepository;
use Exception;

class BlogService
{
    private BlogRepository $blogRepository;

    public function __construct(BlogRepository $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }

    public function create(BlogCreateRequest $request): BlogCreateResponse
    {
        ValidationUtil::validationReflection($request);

        $blog = new Blog();

        $title = $request->title;

        $blog->userId = uniqid("UID");
        $blog->title = $title;
        $blog->slug = SiteHelper::slug($title);
        $blog->content = $request->content;
        $blog->status = 1;
        $blog->created_at = time();

        try {

            $this->blogRepository->save($blog);

            $response = new BlogCreateResponse();
            $response->blog = $blog;
            return $response;
        } catch (Exception $exception) {
            throw $exception;
        }
    }
}
