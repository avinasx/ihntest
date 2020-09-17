<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Contacts */

$this->title = Yii::t('app', 'Update Contacts: {name}', [
    'name' => $model->name,
]);

?>
<div class="contacts-update">
    <?= $this->render('_form', [
        'model' => $model,
        'id' => $id,
    ]) ?>
</div>
