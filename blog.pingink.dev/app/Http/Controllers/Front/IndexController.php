<?php
namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use Illuminate\Routing\Redirector;
use DB;
use Cookie;
use Qiniu\Auth;
use Qiniu\Storage\BucketManager;

class IndexController extends Controller 
{
    public function __construct(RenderContract $IndexRender, StoreContract $IndexStore)
    {
        $this->render = $IndexRender;
        $this->store = $IndexStore;
    }
    //
    public function index() {

        $sql = "SELECT id, title, intro, img_url FROM articles WHERE state = 1";

        $cls_id = 0;
        if (Request::has('cls_id')) {
            $cls_id = Request::input('cls_id');
            $sql .= " AND cls_id = {$cls_id}";
        }

        $articles = DB::select($sql);
        if($articles) {
            $flows = array();
            foreach($articles as  $key => $article) {
                $sql = "SELECT t.name FROM articles_tags AS a ";
                $sql .= " LEFT JOIN tags AS t ON a.tag_id = t.id";
                $sql .= " WHERE a.article_id = {$article->id}";

                $tags = DB::select($sql);

                $article->tags = $tags;

                $num = $key % 3;
                if($num == 0) $flows[0][] = $article;
                if($num == 1) $flows[1][] = $article;
                if($num == 2) $flows[2][] = $article;
            }
           
        }


        //$data['nav'] =  $this->render->html('nav', $flows);
        $data['flows'] = $this->render->html('flows', $flows);
        return view('themes.index', $data);

    }

    //
    public function show($id) {
       
        //article
       
        $sql = "SELECT title, content, created, changed, cls_id FROM article  WHERE id = {$id}";
        $article = DB::select($sql);
   
        $data['article'] = $article;
       
        return view('themes.article-show', $data);
    }

    //
    public function edit($id) {

        if($id) {
        
            //article_tags
            $sql = "SELECT t.title FROM articles_tags AS ag";
            $sql .= " LEFT JOIN tags AS t ON ag.tag_id = t.id";
            $sql .= " WHERE ag.article_id = {$id}";
            $article_tags = DB::select($sql);
            
            $tags = '';
            if($article_tags) {
                foreach ($article_tags as $key => $tag) {
                    $tags[] = $tag->title;
                }
                $tags = implode(',', $tags);
            }

            //article
            $sql = "SELECT id, title, content, cls_id, img_url FROM articles  WHERE id = {$id}";
            $article = DB::select($sql);
            $article[0]->tags = $tags;
            $data['article'] = $article[0];
        }

       
      

        //qn-token
        //$key = Request::input('key');
        //$expires = 3600;
        // $ak = 'Kyn8EC4Lgts7ndYEasp08uzi1W2xxOQnBQvMIRMk';
        // $sk = 'ZrBTazUhNZdSI2LBKDXSPdzmAy6Q2HLEGmjoSzyc';
        // $bucket = 'imges';
        // $auth = new Auth($ak, $sk);
        // $token = $auth->uploadToken($bucket);
        // $data['token'] = $token;

        return view('themes.article-edit', $data);
    }

    //
    public function store(Request $request) {

       
        $title = $request->input('title');
        $content = $request->input('content');
        $cls_id = $request->input('cls_id');
        $img_url = $request->input('img_url');
        $tags =$request->input('tags');

        $article_id = $this->store->db('article', $article);
        $tag_ids = $this->store->db('tags', $tags);
        $this->store->db('articles_tags', ['article_id' => $article_id, 'tag_ids' => $tag_ids]);

        return redirect('/')->with('message', '文章创建成功');

    }

    public function del() {

    }




}