<?php
/* @var $this ArticleController */
?>


<div class="artile-list">
    <?php foreach ($articles as $article): ?>
    <div class="article-summary">
        <div class="meta">
            <div class="category">
                <span class="glyphicon glyphicon-star"></span>
                <a href="#"><?php echo $article->category->name; ?></a>
            </div>
            <div class="views">
                <span class="fui-eye"></span>
                <?php echo $article->read_count; ?> views
            </div>
        </div>
        <h1 class="article-title"><a href="#"><?php echo $article->title; ?></a></h1>
        <div class="post-info">
            <div class="tags">
                <span class="glyphicon glyphicon-tags"></span>
                <?php foreach ($article->tags as $tag): ?>
                    <a href="#"><?php echo $tag->name; ?></a> 
                <?php endforeach; ?>
            </div>
            <div class="date">
                <span class="fui-calendar-solid"></span>
                <?php echo date('M dS, Y', strtotime($article->add_time)); ?>
            </div>
        </div>
        <div class="post-content">
            <?php echo $article->content; ?>
        </div>
        <p class="morelink">
            <a href="#" class="more-link">Read on &gt;&gt;</a>
        </p>
    </div>
    <?php endforeach; ?>
    
    <div class="article-summary">
        <div class="meta">
            <div class="category">
                <span class="glyphicon glyphicon-star"></span>
                <a href="#">分类</a>
            </div>
            <div class="views">
                <span class="fui-eye"></span>
                10 views
            </div>
        </div>
        <h1 class="article-title"><a href="#">Standard Markdown</a></h1>
        <div class="post-info">
            <div class="tags">
                <span class="glyphicon glyphicon-tags"></span>
                <a href="#">Mysql</a>, 
                <a href="#">PHP</a>, 
                <a href="#">Yii</a>
            </div>
            <div class="date">
                <span class="fui-calendar-solid"></span>
                Dec 23rd, 2013
            </div>
        </div>
        <div class="post-content">
            <p>随着移动设备的普及，网站也会迎来越来越多移动设备的访问。用适应PC的页面，很多时候对手机用户不友好，那么有些时候，我们需要判断用户是否用手机访问，如果是手机的话，就跳转到指定的手机友好页面。这里就介绍一下，如何判断用户是否用手机访问。</p>
            <pre><code>*emphasize*   **strong**
            _emphasize_   __strong__</code></pre>
        </div>
        <p class="morelink">
            <a href="#" class="more-link">Read on &gt;&gt;</a>
        </p>
    </div>
</div>
<div class="pagenavi">
    <?php if($page > 1): ?>
        <a href="#" class="prev">&lt; Prev</a>
    <?php endif; ?>
    <?php if($page * 10 < $totalCount): ?>
        <a href="#" class="next">Next &gt;</a>
    <?php endif; ?>
    <div class="center">
        <a href="#">Blog Archives</a>
    </div>
</div>