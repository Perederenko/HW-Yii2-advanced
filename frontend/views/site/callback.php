<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\CallbackForm */
/* @var $form ActiveForm */

$this->title = 'Callback';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-callback">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        Please fill out the following form and we call back you. Thank you.
    </p>
    <div class="row">
        <div class="col-lg-5">

            <?php $form = ActiveForm::begin(); ?>
                <?= $form->field($model, 'name') ?>
                <?= $form->field($model, 'phone') ?>

                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div><!-- site-callback -->
