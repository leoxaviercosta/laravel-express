<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Post;
use App\Tag;
use Illuminate\Support\Facades\Auth;

class PostAdminController extends Controller
{

    /**
     * @var Post
     */
    private $post;

    // injetando o PostController no construtor
    public function __construct(Post $post) {
        $this->post = $post;
    }

    public function index() {
        $posts = $this->post->paginate(5);
        return view('admin.posts.index', compact('posts'));
    }

    public function create() {
        return view('admin.posts.create');
    }

    public function store(PostRequest $request) {
        $post = $this->post->create($request->all());
        $post->tags()->sync($this->getTagsIds($request->tags));

        //$this->post->create($request->all()); // all() retona todos os dados enviados via post
        return redirect()->route('admin.posts.index'); // redireciona após requisição
    }

    public function edit($id) {
        $post = $this->post->find($id);
        return view('admin.posts.edit', compact('post'));
    }

    public function update($id, PostRequest $request){
        $this->post->find($id)->update($request->all());
        $post = $this->post->find($id);
        $post->tags()->sync($this->getTagsIds($request->tags));

        //$this->post->find($id)->update($request->all());
        return redirect()->route('admin.posts.index'); // redireciona após requisição
    }

    public function destroy($id) {
        $this->post->find($id)->delete();
        return redirect()->route('admin.posts.index'); // redireciona após requisição
    }

    private function getTagsIds($tags) {
        $tagList = array_filter(array_map('trim', explode(',', $tags)));

        $tagsIds = array();
        foreach($tagList as $tagName) {
            $tagsIds[] = Tag::firstOrCreate(['name' => $tagName])->id; // pesquisa pelo nome retornando o id, senão encontrar cria automaticamente
        }

        return $tagsIds;
    }

}
