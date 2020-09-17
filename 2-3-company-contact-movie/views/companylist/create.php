<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Companylist */

$this->title = Yii::t('app', 'Create Company List');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Companylists'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="companylist-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
