<?php

class ArticleController extends Controller
{
	public $defaultAction = 'page';

	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionPage($id = 1) {
		$model = new Article;
		$tag = null;
		$cate = null;
		if(isset($_REQUEST['cate']) && !empty($_REQUEST['cate'])) {
			$cate = intval($_REQUEST['cate']);
		}
		if(isset($_REQUEST['tag']) && !empty($_REQUEST['tag'])) {
			$tag = intval($_REQUEST['tag']);
		}
		$data = $model->getArticleList($id, $cate, $tag);
		if(empty($data['articles'])) {
			$this->redirect('/');
		}
		$articles = array();
		foreach ($data['articles'] as $key => $value) {
			$articles[$key] = $this->loadModel($value['article_id']);
			$content = $articles[$key]->content;
			$content = strstr($content, "\n", true);
			$articles[$key]->content = Parsedown::instance()->parse($content);
		}
		$renderData = array(
			'articles' => $articles,
			'totalCount' => $data['total_count'],
			'page' => $id,
			'tagSelected' => $tag,
		);
		$this->render('page', $renderData);
	}

	public function actionView($id) {
		$article = $this->loadModel($id);

		//利用session 记录文章访问次数
		if(!isset(Yii::app()->session['read_'.$id]) || Yii::app()->session['read_'.$id] !== true) {
			$article->read_count += 1;
			$article->save();
			Yii::app()->session['read_'.$id] = true;
		}

		$article->content = Parsedown::instance()->parse($article->content);

		$this->render('view', array('article'=>$article));
	}

	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	public function loadModel($id)
	{
		$model=Article::model()->findByPk($id, "is_post=:is_post", array(':is_post'=>1));
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}