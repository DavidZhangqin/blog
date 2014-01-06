<?php

class ArchivesController extends Controller
{

    public function actionIndex() {
        $model = new Article;
        $tag = null;
        $cate = null;
        if(isset($_REQUEST['cate']) && !empty($_REQUEST['cate'])) {
            $cate = intval($_REQUEST['cate']);
        }
        if(isset($_REQUEST['tag']) && !empty($_REQUEST['tag'])) {
            $tag = intval($_REQUEST['tag']);
        }
        $data = $model->getArticleList(null, $cate, $tag, null);
        if(empty($data['articles'])) {
			throw new CHttpException(404,'The requested page does not exist.');
            $this->redirect('/archives');
        }
        $archives = array();
        foreach ($data['articles'] as $key => $value) {
            $article = $this->loadModel($value['article_id']);
            $year = date('Y', strtotime($article->add_time));
            $archives[$year][] = $article;
        }
        $renderData = array(
            'archives' => $archives,
            'tagSelected' => $tag,
            'cateSelected' => $cate,
        );
        $this->render('index', $renderData);
    }

    public function loadModel($id)
    {
        $model=Article::model()->findByPk($id, "is_post=:is_post", array(':is_post'=>1));
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }
}
