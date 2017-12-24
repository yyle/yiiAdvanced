<?php

namespace api\controller;

use yii\rest\ActiveController;

class ArticleController extends ActiveController {
    public $modelClass = 'common\models\article';
}