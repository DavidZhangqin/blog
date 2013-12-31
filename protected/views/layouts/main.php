<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="language" content="en" />

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css" />

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/prettify.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/flat-ui.css" />

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/code.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/blog.css" />

	<link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.ico" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div class="demo-sidebar">
        <div class="avatar">
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/exaple-image.jpg" class="">
        </div>
        <div class="title">
            <h1><a href="/"><?php echo Yii::app()->name; ?></a></h1>
            <p class="subtitle">Subtitle It Is</p>
        </div>
        <ul>
            <li><a href="/">Blog</a></li>
            <li><a href="/archives">Archives</a></li>
            <li><a href="#">Categories</a></li>
            <li><a href="#">Tags</a></li>
        </ul>
    </div>

    <div class="main-content">
        <div class="blog-container">
            
        	<?php echo $content; ?>

        </div>
        <div class="blog-footer">
            <p>Copyright &copy; <?php echo date('Y'); ?> by Zhang Qin. All Rights Reserved.</p>
        </div>
    </div>

</div><!-- page -->

<script src="/js/jquery-2.0.3.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/prettify.js"></script>
<script src="/js/common.js"></script>

<script type="text/javascript">
    /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
    var disqus_shortname = 'blogofdavid'; // required: replace example with your forum shortname

    /* * * DON'T EDIT BELOW THIS LINE * * */
    (function () {
        var s = document.createElement('script'); s.async = true;
        s.type = 'text/javascript';
        s.src = '//' + disqus_shortname + '.disqus.com/count.js';
        (document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
    }());
</script>
</body>
</html>
