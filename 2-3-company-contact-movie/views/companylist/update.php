<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Companylist */

$this->title = Yii::t('app', 'Company: {name}', [
    'name' => $model->companyname,
]);

?>
<div class="companylist-update">
    <?= $this->render('_form', [
        'model' => $model,
        'id' => $id,
    ]) ?>
</div>
