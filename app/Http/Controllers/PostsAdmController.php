<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PostsAdmController extends Controller
{

    protected $post;

    /**
     * @param Post $post
     */
    public function __construct(Post $post){
        $this->post = $post;
    }

    public function index()
    {
        $posts = $this->post->paginate(10);
        return view('post.admin.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post = $this->post->create($request->all());
        $post->tags()->sync($this->getTagsIDs($request->tags));

        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = $this->post->find($id);

        return view('post.admin.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $this->post->find($id)->update($request->all());
        $post = $this->post->find($id);
        $post->tags()->sync($this->getTagsIDs($request->tags));

        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->post->find($id)->delete();
        return redirect()->route('admin.posts.index');
    }

    private function getTagsIDs($tags)
    {
        $tagsList = array_filter(array_map('trim', explode(',', $tags)));
        $tagsIDs = [];
        foreach($tagsList as $tagName)
        {
            $tagsIDs[] = Tag::firstOrCreate(['name'=>$tagName])->id;
        }
        return $tagsIDs;
    }
}
