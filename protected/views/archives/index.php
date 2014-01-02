<?php
/* @var $this ArchivesController */
$this->pageTitle = "Blog Archives-" . Yii::app()->name;
?>


<div class="archives">
    <?php foreach ($archives as $year => $articles): ?>
    <div class="year-block">
        <h2 class="year"><?php echo $year; ?></h2>
        <?php foreach ($articles as $article): ?>
        <div class="article-summary">
            <h4 class="article-title">
                <span class="month-day"><?php echo date('M dS', strtotime($article->add_time)); ?></span>
                <a href="http://blog.com/article/view/<?php echo $article->article_id; ?>"><?php echo $article->title; ?></a>
            </h4>
            <div class="post-info">
                <div class="tags">
                    <span class="glyphicon glyphicon-tags"></span>
                    <?php foreach ($article->tags as $tag): ?>
                        <a class="<?php echo ($tagSelected !== null && $tagSelected == $tag->tag_id) ? 'active' : ''; ?>" href="/archives/index/tag/<?php echo $tag->tag_id; ?>"><?php echo $tag->name; ?></a> 
                    <?php endforeach; ?>
                    <span class="glyphicon glyphicon-star ml40"></span>
                    <a class="<?php echo ($cateSelected !== null && $cateSelected == $article->category->category_id) ? 'active' : ''; ?>" href="/archives/index/cate/<?php echo $article->category->category_id; ?>"><?php echo $article->category->name; ?></a>
                </div>
                <div class="date">
                    <span class="fui-eye"></span>
                    <?php echo $article->read_count; ?> views, <a href="http://blog.com/article/view/<?php echo $article->article_id; ?>#disqus_thread">Link</a>
                </div>
            </div>
        </div>    
        <?php endforeach; ?>
    </div>
    <?php endforeach; ?>
</div>