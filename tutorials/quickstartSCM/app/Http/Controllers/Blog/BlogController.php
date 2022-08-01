<?php

namespace App\Http\Controllers\Blog;

use App\Contracts\Services\Blog\BlogServiceInterface;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;


class BlogController extends Controller
{
    private $blogInterface;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(BlogServiceInterface $blogServiceInterface){
        $this->blogInterface = $blogServiceInterface;
    }

    public function index()
    {
        $data = $this->blogInterface->showall();
        return view('blog/home',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $blog = $this->blogInterface->storeBlog($request);        
        return redirect('/blogs');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = $this->blogInterface->showBlog($id);
        return view('blog/show',compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = $this->blogInterface->editBlog($id);
        return view('blog/edit',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $blog = $this->blogInterface->updateBlog($request,$id);
        return redirect('/blogs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = $this->blogInterface->deleteBlog($id);
        return redirect('/blogs');
    }
}
