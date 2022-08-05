<?php

namespace App\Dao\Blog;

use App\Models\Blog;
use App\Contracts\Dao\Blog\BlogDaoInterface;
use Illuminate\Http\Request;

/**
 * Data accessing object for post
 */
class BlogDao implements BlogDaoInterface
{
  /**
   * To save post
   * @param Request $request request with inputs
   * @return Object $post saved post
   */
  public function showall(){
    $data = Blog::orderBy('id','desc')->get();
    return $data;
  }
  
  public function storeBlog(Request $request){
    $request->validate([
        'title' => 'required',
        'description' => 'required',
    ]);
    $blog = new Blog();
    $blog->title = $request->title;
    $blog->description = $request->description;
    $blog->save();

    return $blog;
  }

  public function showBlog($id){    
    $blog = Blog::findOrFail($id);
    return $blog;
  }

  public function editBlog($id){
    $blog = Blog::findOrFail($id);
    return $blog;
  }
  public function updateBlog($request,$id){
    $request->validate([
      'title' => 'required',
      'description' => 'required',
    ]);
    $blog = Blog::findOrFail($id);
    $blog->title = $request->title;
    $blog->description = $request->description;
    $blog->save();

    return $blog;
  }
  public function deleteBlog($id){
    $blog = Blog::findOrFail($id)->delete();
    return $blog;
  }
}
