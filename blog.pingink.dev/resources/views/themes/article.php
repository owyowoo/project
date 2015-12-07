<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="/themes/css/style.css">
    <link media="all" rel="stylesheet" type="text/css" href="/themes/simditor/styles/simditor.css">
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
    <div class="main page-article">
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
            <div class="title">
                <?php echo $article->title; ?>
            </div>
            <div class="content">
                <?php echo $article->content; ?>
            </div>
            <div class="tags">
              
            </div>
        </div>
    </div>

</div>
</body>
</html>