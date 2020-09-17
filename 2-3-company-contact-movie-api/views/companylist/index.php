<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ComapanylistSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Company List');
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="companylist-index">

        <h2><?= Html::encode($this->title) ?>
            <span class="pull-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add Company</button>
            <?php Html::a(Yii::t('app', 'Create Company'), ['create'], ['class' => 'btn btn-success']) ?>
        </span>
        </h2>
        <!-- Button trigger modal -->

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLabel">Add Company
                            <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"><h1>&times;</h1></span>
                            </button>
                        </h3>
                    </div>
                    <div class="modal-body">
                        <div class="companylist-form">

                            <?php $form = ActiveForm::begin(['action' => ['ajax-create'], 'id' => 'company_create', 'method' => 'post',]); ?>

                            <?= $form->field($model, 'companyname')->textInput(['maxlength' => true]) ?>

                            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

                            <?= $form->field($model, 'phone')->textInput() ?>

                            <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

                            <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

                            <div class="form-group">
                                <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
                            </div>

                            <?php ActiveForm::end(); ?>

                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel1"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="updateModalLabel"> Update Company
                            <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"><h1>&times;</h1></span>
                            </button>
                        </h3>
                    </div>
                    <div class="modal-body">

                    </div>
                </div>
            </div>
        </div>

        <p style="color: red">Deleting a company will also delete corresponding contacts</p>
<!--        --><?php //Pjax::begin(); ?>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'companyname',
                'email:email',
                'phone',
                'address',
                'city',
                ['class' => 'yii\grid\ActionColumn',
                    'header' => 'Contacts',
                    'template' => '{view2}',
                    'buttons' => [
                        'view2' => function ($url, $model) {
                            $contacts = \app\models\Contacts::find()->select('name')->where(['companyid' => $model->id])->all();
                            $contacts = \yii\helpers\ArrayHelper::map($contacts, 'name', 'name');
                            if(!empty($contacts)){
                                return  implode(", ",$contacts);
                            }
                        },
                    ]
                ],
                ['class' => 'yii\grid\ActionColumn',
                    'header' => 'Action',
                    'template' => '{update} {delete} ',
                    'buttons' => [
                        'update' => function ($url, $model) {
                            return '<a type="button"  data-toggle="modal" data-target="#updateModal" data-modelid="'.$model->id.'"><span class="glyphicon glyphicon-edit"></span></a>';
                        },
                    ]
                ],
            ],
        ]); ?>

<!--        --><?php //Pjax::end(); ?>

    </div>


<?php
$url = Url::to(['update']);
$this->registerJs(<<<JS

$('#updateModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('modelid') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
 
  $.ajax({
  url: "$url",
  type: 'post',
  data: {id:id},
   success: function(result){
  modal.find('.modal-body').html(result)
  }});
  
})

JS
);
