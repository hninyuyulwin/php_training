<?php

namespace App\Contracts\Dao\Blog;

use Illuminate\Http\Request;

/**
 * Interface for Data Accessing Object of Post
 */
interface BlogDaoInterface
{
  public function showall();

  public function storeBlog(Request $request);

  public function showBlog($id);

  public function editBlog($id);

  public function updateBlog(Request $request,$id);

  public function deleteBlog($id);

}
