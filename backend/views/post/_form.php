<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Poststatus;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

<!--    <?//= $form->field($model, 'content')->textarea(['rows' => 6]) ?>-->

    <?= $form->field($model, 'tags')->textarea(['rows' => 6]) ?>


    <?php
    $psObjs = Poststatus::find()->all();
    $allStatus = ArrayHelper::map($psObjs, 'id', 'name');

    //    $psArray = Yii::$app->db->createCommand('select id,name from poststatus');
    //    $allStatus = ArrayHelper::map($psArray,'id','name');

    //    $allStatus = (new \yii\db\Query())
    //        ->select(['name','id'])
    //        ->from('poststatus')
    //        ->indexBy('id')
    //        ->column();
    //    echo '<pre>';
    //    print_r($allStatus);
    //    echo '</pre>';
    //    exit(0);
    ?>
    <?= $form->field($model, 'status')
        ->dropDownList(Poststatus::find()
            ->select(['name', 'id'])
            ->orderBy('position')
            ->indexBy('id')
            ->column(),
            ['prompt' => '请选择状态']); ?>


    <?= $form->field($model, 'author_id')
        ->dropDownList(\common\models\Adminuser::find()
            ->select(['nickname', 'id'])
            ->indexBy('id')
            ->column(),
            ['prompt' => '请选择作者']); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '创建' : '编辑', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
