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
		$data = $model->getArticleList($id);
		if(empty($data['articles'])) {
			$this->redirect('/');
		}
		$articles = array();
		foreach ($data['articles'] as $value) {
			$articles[] = $this->loadModel($value['article_id']);
		}
		$renderData = array(
			'articles' => $articles,
			'totalCount' => $data['total_count'],
			'page' => $id,
		);
		$this->render('page', $renderData);
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
		$model=Article::model()->findByPk($id);
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