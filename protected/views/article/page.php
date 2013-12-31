<?php
/* @var $this ArticleController */
$this->pageTitle = Yii::app()->name;
?>


<div class="artile-list">
    <?php foreach ($articles as $article): ?>
    <div class="article-summary">
        <div class="meta">
            <div class="category">
                <span class="glyphicon glyphicon-star"></span>
                <a href="/article/page/cate/<?php echo $article->category->category_id; ?>"><?php echo $article->category->name; ?></a>
            </div>
            <div class="views">
                <span class="fui-eye"></span>
                <?php echo $article->read_count; ?> views, <a href="http://blog.com/article/view/<?php echo $article->article_id; ?>#disqus_thread">Link</a>
            </div>
        </div>
        <h1 class="article-title"><a href="<?php echo Yii::app()->createUrl('article/view/'.$article->article_id); ?>"><?php echo $article->title; ?></a></h1>
        <div class="post-info">
            <div class="tags">
                <span class="glyphicon glyphicon-tags"></span>
                <?php foreach ($article->tags as $tag): ?>
                    <a class="<?php echo ($tagSelected !== null && $tagSelected == $tag->tag_id) ? 'active' : ''; ?>" href="/article/page/tag/<?php echo $tag->tag_id; ?>"><?php echo $tag->name; ?></a> 
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
            <a href="<?php echo Yii::app()->createUrl('article/view/'.$article->article_id); ?>" class="more-link">Read on &gt;&gt;</a>
        </p>
    </div>
    <?php endforeach; ?>
</div>
<div class="pagenavi">
    <?php if($page > 1): ?>
        <a href="/article/page/<?php echo ($page - 1); ?>" class="prev">&lt; Prev</a>
    <?php endif; ?>
    <?php if($page * 10 < $totalCount): ?>
        <a href="/article/page/<?php echo ($page + 1); ?>" class="next">Next &gt;</a>
    <?php endif; ?>
    <div class="center">
        <a href="#">Blog Archives</a>
    </div>
</div>