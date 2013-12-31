<?php
/* @var $this ArticleController */
$this->pageTitle = $article->title;
?>


<div class="artile-list">
    <div class="article-summary">
        <!-- <div class="meta">
            <div class="category">
                <span class="glyphicon glyphicon-star"></span>
                <a href="#"><?php echo $article->category->name; ?></a>
            </div>
            <div class="views">
                <span class="fui-eye"></span>
                <?php echo $article->read_count; ?> views
            </div>
        </div> -->
        <h1 class="article-title"><a href="#"><?php echo $article->title; ?></a></h1>
        <div class="post-info">
            <div class="tags">
                <span class="glyphicon glyphicon-tags"></span>
                <?php foreach ($article->tags as $tag): ?>
                    <a href="#"><?php echo $tag->name; ?></a> 
                <?php endforeach; ?>
                <span class="glyphicon glyphicon-star ml40"></span>
                <a href="#"><?php echo $article->category->name; ?></a>
            </div>
            <div class="date">
                <span class="fui-calendar-solid"></span>
                <?php echo date('M dS, Y', strtotime($article->add_time)); ?>
            </div>
        </div>
        <div class="post-content">
            <?php echo $article->content; ?>
        </div>
    </div>
    <div class="comments">
        <div id="disqus_thread"></div>
        <script type="text/javascript">
            /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
            var disqus_shortname = 'blogofdavid'; // required: replace example with your forum shortname

            /* * * DON'T EDIT BELOW THIS LINE * * */
            (function() {
                var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
            })();
        </script>
        <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
        <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
    </div>
</div>