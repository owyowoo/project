<?php

class Theme
{
	private $data = array();
	private $cache = ture;
	private $html = '';

	public function __construct($data = array(),$action, $cache)
	{
		$this->data = $data;
		$this->html = $this->$action();
		if($cache) {
			//将html区块存到缓存
		}
		return $this->html;
	}


	public function nav($active_id = 0)
	{

		$str = '';
        if(!isset($this->data['nav']) || empty($this->data['nav'])) return $str;
        
        $str .= '<ul>';
        $str .= '<li><a class="category" value="0" href="/">首页</a></li>';

        foreach ($this->data['nav'] as $key => $category) {
            $active = $active_id == $category->id ? 'active' : '';
            $str .= '<li><a class="category ' . $active . '" value="' . $category->id . '" href="/category/' . $category->id . '">' . $category->name . '</a></li>';
        }

        $str .= '</ul>'; 

        return $str;
	}

	public function tags($active_id = 0)
	{
		$str = '';
        if(!isset($this->data['tags']) || empty($this->data['tags'])) return $str;



	}

	public function section($article)
	{
		
        $str .= '<div class="section">';
              
        //title
        $str .= '<div class="title">' . $article->title  .'</div>';

        //intro || img
        if(!empty($article->intro)) {
            $str .= '<div class="intro">' . $article->intro . '&nbsp;&nbsp;&nbsp;&nbsp;<a href="/show/' . $article->id . '">查看全文</a></div>';
        }
        else {
            $str .= '<div class="img"><a href="/show/' . $article->id . ' "><img src="' .$article->img . '?imageMogr2/thumbnail/300x' . '"alt="pic" /></a></div>';
        }

        //tags
        if(!empty($article->tags)) {
            $tag_str = '';

            foreach($article->tags as $tag) {
                $tag_str .= '<span>' . $tag->name . '</span>';
            }

            $str .= '<div class="tags">' . $tag_str . '</div>';
        }

        $str .= '</div>';
         
	}

	public function flows()
	{
		$str = '';
        if(!isset($this->data['articles']) || empty($this->data['articles'])) return $str;

        $flows = array('','','');
        foreach ($this->data['articles'] as $key => $article) {
        	$num = $key % 3;
        	if($num == 0) $flows[0]  .= $this->section($article);
            if($num == 1) $flows[1]  .= $this->section($article);
            if($num == 2) $flows[2]  .= $this->section($article);
        }

        foreach ($flows as $key => $flow) {
            $str .= '<div class="flow">';
            $str .= $flow;
            $str .= '</div>';
        }

        return $str;
	}

	public function article() 
	{
		$str = '';
        if(!isset($this->data['article']) || empty($this->data['article'])) return $str;

        $str .= '<div class="title">' . $data->title . '</div>';
        $str .= '<div class="content">' . $data->content . '</div>';
        
        return $str;
	}



}