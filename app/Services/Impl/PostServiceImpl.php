<?php


namespace App\Services\Impl;


use App\Post;
use App\Repositories\PostRepository;
use App\Services\PostService;
use Illuminate\Support\Facades\Storage;

class PostServiceImpl implements PostService
{
    protected $postRepository;
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function getAll()
    {
        return $this->postRepository ->getAll();
    }

    public function findById($id)
    {
        return $this->postRepository->findById($id);
    }

    public function create($request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->tag = $request->tag;
        $post->status = $request->status;
        if ($request->hasfile('image')) {
            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $post->image = $path;
        }
        $this->postRepository->create($post);
    }

    public function update($request, $id)
    {
        $post = $this->postRepository->findById($id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->tag = $request->tag;
        $post->status = $request->status;
//        $post->user_id = $request->user_id;
        if ($request->hasFile('image')) {
            $currentImg = $post->image;
            if ($currentImg) {
                Storage::delete('/public/' . $currentImg);
            }
            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $post->image = $path;
        }

        $this->postRepository->update($post);
    }

    public function destroy($id)
    {
        $profile = $this->postRepository->findById($id);
        $image = $profile->image;
        if ($image){
            Storage::delete('/public/'.$image);
        }
        $this->postRepository->destroy($profile);
    }
}
