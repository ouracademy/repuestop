<?php namespace App\Http\Controllers\Samples;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Repository\PostRepository ;
use App\Manager\PostManager;

use App\Entities\samples\Post ;
use App\Entities\samples\Comment;

class PostController extends Controller{
    private $repository;
    private $manager;
    public function   __construct(PostManager $manager,PostRepository $repo)
    {
        $this->repository= $repo;
        $this->manager=$manager;
    }
    public function create()
    {
        //TODO : No instance Post here , instead instance in service provider
        $post = new Post('tile 2','este title es ok');
        $post->addComment(new Comment('diana','estoy aprejjjjndiendo'));
        $this->manager->create($post);
    }
    public function index()
    {
        dd( $this->repository->findAll());
    }
}
