<?php

/**
 * This is the model class for table "{{article}}".
 *
 * The followings are the available columns in table '{{article}}':
 * @property integer $article_id
 * @property string $title
 * @property string $content
 * @property integer $read_count
 * @property integer $is_post
 * @property integer $category_id
 * @property string $add_time
 * @property string $update_time
 *
 * The followings are the available model relations:
 * @property Category $category
 */
class Article extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Article the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{article}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title', 'required'),
			array('read_count, is_post, category_id', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>256),
			array('content, add_time, update_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('article_id, title, content, read_count, is_post, category_id, add_time, update_time', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'category' => array(self::BELONGS_TO, 'Category', 'category_id'),
			'tags' => array(self::MANY_MANY, 'Tag', '{{article_tag}}(article_id, tag_id)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'article_id' => 'Article',
			'title' => 'Title',
			'content' => 'Content',
			'read_count' => 'Read Count',
			'is_post' => 'Is Post',
			'category_id' => 'Category',
			'add_time' => 'Add Time',
			'update_time' => 'Update Time',
		);
	}

	public function getArticleList($page=1, $category_id=null, $tag_id=null, $limit=10, $where="") {
		$select = "SELECT a.article_id FROM blog_article a left join blog_article_tag at on a.article_id=at.article_id left join blog_tag t on at.tag_id=t.tag_id left join blog_category c on a.category_id = c.category_id ";
		$where .= " where a.is_post = 1";
		if($tag_id !== null) {
			$where .= $where == "" ? " where t.tag_id = ".$tag_id : " and t.tag_id = ".$tag_id;
		}
		if($category_id !== null) {
			$where .= $where == "" ? " where a.category_id = ".$category_id : " and a.category_id = ".$category_id;
		}
		$order = " order by a.add_time desc ";
		$group = " group by a.article_id ";
		if($page !== null && $limit !== null) {
			$offset = ($page - 1) * $limit;
			$limitWhere = " limit " . $offset . ", " . $limit;
		} else {
			$limitWhere = "";
		}
		$sql = $select . $where . $group . $order . $limitWhere;
		if($tag_id !== null) {
			$sql_count = "SELECT COUNT(1) FROM blog_article a left join blog_article_tag at on a.article_id=at.article_id left join blog_tag t on at.tag_id=t.tag_id ".$where;
		} elseif($category_id !== null) {
			$sql_count = "SELECT COUNT(1) FROM blog_article a left join blog_category c on a.category_id = c.category_id ".$where;
		} else {
			$sql_count = "SELECT COUNT(1) FROM blog_article a where a.is_post=1";
		}
		$data = array(
			'articles' => Yii::app()->db->createCommand($sql)->queryAll(),
			'total_count' => Yii::app()->db->createCommand($sql_count)->queryScalar(),
		);
		return $data;
	}
}