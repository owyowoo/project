<?php
namespace App\Services; 
use App\Contracts\RenderContract; 
class IndexRenderService implements RenderContract 
{ 
    private $data;

    public function html($action, $data)
    {
        $this->data = $data;
        return $this->$action();
    }



    public function cls()
    {
        $data = $this->data;
        $str = '<ul>';
        foreach ($data->clses as $key => $cls) {
            $cls_active = '';
            if($cls->id == $data->cls_active) {
                 $cls_active = 'cls_active';
            }

            $str .= '<li><a class="cls ' . $cls_active . '" value="1" href="/?cls_id=' . $cls->id . '">' .$cls->name. '</a></li>';
        }
        $str = '</ul>'
    }

    public function flows() 
    { 
        $str = '';
        $flows = $this->data;
        foreach ($flows as $key => $flow) {
            $str .= '<div class="flow">';
                foreach ($flow as  $article) {
                    $str .= '<article>';

                    //title
                    $edit = '<a href="index.php/edit?article_id= ' . $article->id. '"></a>';
                    $str .= '<div class="title">' . $article->title . $edit .'</div>';

                    //intro || img
                    if(isset($article->intro)) {
                        $str .= '<div class="intro">' . $article->intro . '</div>';
                    }
                    else {
                        $str .= '<div class="img"><a href="/index.php/article?article_id=' . $article->id . ' "><img src="' .$article->url . '?imageMogr2/thumbnail/300x' . '"alt="pic" /></a></div>';
                    }

                    //tags
                    if($article->tags) {
                        $tag_str = '';
                        foreach($article->tags as $tag) {
                            $tag_str .= '<span>' . $tag->title . '</span>';
                        }

                        $str .= '<div class="tags">' . $tag_str . '</div>';
                    }


                    $str .= '</article>';
                }
            $str .= '</div>'
        }

        return $str;
    } 
}