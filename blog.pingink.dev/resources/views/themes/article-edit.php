<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Simditor</title>
    <link media="all" rel="stylesheet" type="text/css" href="/themes/css/style.css">
    <link media="all" rel="stylesheet" type="text/css" href="/themes/simditor/styles/simditor.css">
    <link rel="stylesheet" href="/themes/qn-js-sdk/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="/themes/qn-js-sdk/main.css">
    <link rel="stylesheet" href="/themes/qn-js-sdk/js/highlight/highlight.css">
    <script type="text/javascript" src="/themes/simditor/scripts/jquery.min.js"></script>
</head>
<body>

<div class="wrapper page-article-editor">
    <header>
        <h1><a href="#">Simditor</a></h1>
    </header>
    <nav>

    </nav>

    <section>
        <form action="save" method="post">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <input type="hidden" name="article_id" value="<?php if(isset($article->id)) echo $article->id; ?>">
            <div class="title">
                <input type="text" name="title" placeholder="Title" <?php if(isset($article->title)) echo 'value="'. $article->title.'"' ?> >
            </div>
            <div class="tags">
                <input type="text" name="tags" placeholder="php" <?php if(isset($article->tags)) echo 'value="'. $article->tags.'"' ?> >
            </div>
            <div class="img">
                <input type="text" name="imgurl" placeholder="url" <?php if(isset($article->url)) echo 'value="'. $article->url.'"' ?> >
            </div>
            <textarea id="editor" placeholder="Balabala" autofocus name="content"><?php if(isset($article->content)) echo  $article->content ?></textarea>
            <div class="cls">
                <label>Servant</label>
                <input type="radio" name="cls" value="1" <?php if(isset($article->cls_id) && $article->cls_id == 1) echo  'checked="checked"' ?> >
                <label>苦境人生</label>
                <input type="radio" name="cls" value="2" <?php if(isset($article->cls_id) && $article->cls_id == 2) echo  'checked="checked"' ?> >
                <label>异度魔界</label>
                <input type="radio" name="cls" value="3" <?php if(isset($article->cls_id) && $article->cls_id == 3) echo  'checked="checked"' ?> >
                <label>音乐之声</label>
                <input type="radio" name="cls" value="4" <?php if(isset($article->cls_id) && $article->cls_id == 4) echo  'checked="checked"' ?> >
                <label>灯火可亲</label>
                <input type="radio" name="cls" value="5" <?php if(isset($article->cls_id) && $article->cls_id == 5) echo  'checked="checked"' ?> >
            </div>
            <div class="container">
                <div class="text-left col-md-12 wrapper">

                    <input type="hidden" id="domain" value="http://7xoo31.com1.z0.glb.clouddn.com/">
                    <input type="hidden" id="uptoken_url" value="<?php echo $token; ?>">

                </div>
                <div class="body">
                    <div class="col-md-12">
                        <div id="container">
                            <a class="btn btn-default btn-lg " id="pickfiles" href="#" >
                                <i class="glyphicon glyphicon-plus"></i>
                                <span>选择文件</span>
                            </a>
                        </div>
                    </div>

                    <div style="display:none" id="success" class="col-md-12">
                        <div class="alert-success">
                            队列全部文件处理完毕
                        </div>
                    </div>
                    <div class="col-md-12 ">
                        <table class="table table-striped table-hover text-left"   style="margin-top:40px;display:none">
                            <thead>
                            <tr>
                                <th class="col-md-4">Filename</th>
                                <th class="col-md-2">Size</th>
                                <th class="col-md-6">Detail</th>
                            </tr>
                            </thead>
                            <tbody id="fsUploadProgress">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="submit">
                <input type="submit" value="提交">
            </div>

        </form>
    </section>


    <footer>
        © <a href="http://tower.im">彩程设计</a>
    </footer>

</div>

</body>
<script type="text/javascript" src="/themes/simditor/scripts/module.js"></script>
<script type="text/javascript" src="/themes/simditor/scripts/uploader.js"></script>
<script type="text/javascript" src="/themes/simditor/scripts/hotkeys.js"></script>
<script type="text/javascript" src="/themes/simditor/scripts/simditor.js"></script>


<script type="text/javascript" src="/themes/qn-js-sdk/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/themes/qn-js-sdk/js/plupload/plupload.full.min.js"></script>
<script type="text/javascript" src="/themes/qn-js-sdk/js/plupload/i18n/zh_CN.js"></script>
<script type="text/javascript" src="/themes/qn-js-sdk/js/ui.js"></script>
<script type="text/javascript" src="/themes/qn-js-sdk/js/qiniu.js"></script>
<script type="text/javascript" src="/themes/qn-js-sdk/js/highlight/highlight.js"></script>
<script type="text/javascript" src="/themes/qn-js-sdk/js/main.js"></script>
<script type="text/javascript">
    $(function(){
        var editor = new Simditor({
            textarea: $('#editor'),
            placeholder: 'Balabala',
            defaultImage: 'images/image.png',
            params: {},
            upload: false,
            tabIndent: true,
            toolbar: ['title','bold','italic','underline','strikethrough','color','ol','ul','blockquote','code','table','link','image','hr','indent','outdent','alignment'],
            toolbarFloat: true,
            toolbarFloatOffset: 0,
            toolbarHidden: false,
            pasteImage: false
        });
    });
</script>




</html>

