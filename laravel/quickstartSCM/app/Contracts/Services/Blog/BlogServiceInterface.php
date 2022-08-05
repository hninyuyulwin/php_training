<?php

namespace App\Contracts\Services\Blog;

use Illuminate\Http\Request;


/**
 * Interface for post service
 */
interface BlogServiceInterface
{
  public function showall();

  public function storeBlog(Request $request);

  public function showBlog($id);

  public function editBlog($id);

  public function updateBlog(Request $request,$id);

  public function deleteBlog($id);
}
