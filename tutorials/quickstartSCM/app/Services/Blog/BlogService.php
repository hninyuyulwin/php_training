<?php

namespace App\Services\Blog;

use App\Contracts\Dao\Blog\BlogDaoInterface;
use App\Contracts\Services\Blog\BlogServiceInterface;
use Illuminate\Http\Request;

/**
 * Service class for post.
 */
class BlogService implements BlogServiceInterface
{
  private $blogDao;
 
  public function __construct(BlogDaoInterface $blogDao)
  {
    $this->blogDao = $blogDao;
  }
  public function showall(){
    return $this->blogDao->showall();
  }
  
  public function storeBlog(Request $request){
    return $this->blogDao->storeBlog($request);
  }

  public function showBlog($id){    
    return $this->blogDao->showBlog($id);
  }

  public function editBlog($id){
    return $this->blogDao->editBlog($id);
  }
  public function updateBlog(Request $request,$id){
    return $this->blogDao->updateBlog($request,$id);    
  }
  public function deleteBlog($id){
    return $this->blogDao->deleteBlog($id);
  }
}
