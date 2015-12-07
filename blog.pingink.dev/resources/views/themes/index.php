<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ping</title>
    <link rel="stylesheet" type="text/css" href="/themes/css/style.css">
</head>
<body>

<div class="wrapper page-index">
    <header>
        <div class="banner">
        </div>
    </header>
    <!--
    <aside>

    </aside>
    -->
    <div class="main">
        <nav>
            <ul>
                <li><a class="cls <?php if($cls == 1) echo 'cls_active';?>" value="1" href="/index.php?cls_id=1">Servant</a></li>
                <li><a class="cls <?php if($cls == 2) echo 'cls_active';?>" value="2" href="/index.php?cls_id=2">苦境人生</a></li>
                <li><a class="cls <?php if($cls == 3) echo 'cls_active';?>" value="3" href="/index.php?cls_id=3">异度魔界</a></li>
                <li><a class="cls <?php if($cls == 4) echo 'cls_active';?>" value="4" href="/index.php?cls_id=4">音乐之声</a></li>
                <li><a class="cls <?php if($cls == 5) echo 'cls_active';?>" value="5" href="/index.php?cls_id=5">灯火可亲</a></li>
            </ul>
        </nav>
        <div class="articles">
            <div class="flow">
                <?php echo html_flow($flow, 0, $master); ?>
            </div>
            <div class="flow">
                <?php echo html_flow($flow, 1, $master); ?>

            </div>
            <div class="flow">
                <?php echo html_flow($flow, 2, $master); ?>
            </div>
        </div>
    </div>

</div>
<footer>

</footer>
</body>
</html>

<?php
function html_flow($flow,$num, $master) {

    $str = '';
    if(!isset($flow[$num])) return $str;
    else $flow = $flow[$num];

    $edit = '';
    foreach($flow AS $article) {
        $str .= '<article>';
        if($master) $edit = '<a href="index.php/edit?article_id= ' . $article->id. '"></a>';
        $str .= '<div class="title">' . $article->title . $edit .'</div>';
        $str .= '<div class="img"><a href="/index.php/article?article_id=' . $article->id . ' "><img src="' .$article->url . '?imageMogr2/thumbnail/300x' . '"alt="pic" /></a></div>';
        if($article->tags) {
            $tag_str = '';
            foreach($article->tags as $tag) {
                $tag_str .= '<span>' . $tag->title . '</span>';
            }

            $str .= '<div class="tags">' . $tag_str . '</div>';
        }
        $str .= '</article>';
    }

    return $str;
}
?>

