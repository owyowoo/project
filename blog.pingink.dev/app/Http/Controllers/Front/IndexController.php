<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App;
use DB;

class IndexController extends Controller 
{
    protected $render;
    protected $store;
    protected $fetch;
    //protected $help;

    public function __construct(FetchContract $fetch, RenderContract $render, StoreContract $store)
    {
        $this->fetch = $fetch;
        $this->render = $render;
        $this->store = $store;
    }
 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {

        

        //$data['nav'] =  $this->render->html('nav', $flows);
        $data['flows'] = $this->render->html('flows', $flows);
        return view('themes.index', $data);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) 
    {
       
        //article
       
        $sql = "SELECT title, content, created, changed, cls_id FROM article  WHERE id = {$id}";
        $article = DB::select($sql);
   
        $data['article'] = $article;
       
        return view('themes.article-show', $data);
    }


   /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) 
    {

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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) 
    {

       
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function del($id) 
    {

    }




}