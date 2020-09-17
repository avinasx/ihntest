<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ContactsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Contacts');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contacts-index">

    <h2><?= Html::encode($this->title) ?>
        <span class="pull-right">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#exampleModal">Add Company</button>

            <?php Html::a(Yii::t('app', 'Create Contacts'), ['create'], ['class' => 'btn btn-success']) ?>
        </span>
    </h2>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Add Contact
                        <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><h1>&times;</h1></span>
                        </button>
                    </h3>
                </div>
                <div class="modal-body">
                    <div class="companylist-form">

                        <?php $form = ActiveForm::begin(['action' => ['ajax-create'], 'id' => 'cont_create', 'method' => 'post',]); ?>
                        <?= $form->field($model, 'companyid')->dropDownList(\app\models\Companylist::getAll(), ['prompt' => '--SELECT--'])->label('Company') ?>

                        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($model, 'phone')->textInput() ?>

                        <?= $form->field($model, 'designation')->textInput(['maxlength' => true]) ?>

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
                    <h3 class="modal-title" id="updateModalLabel"> Update Contact
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

    <p style="color: red">Multiple contacts can be added to same company</p>


    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'label' => 'Company',
                'attribute' => 'companyid',
                'value' => function ($data) {
                    return \app\models\Companylist::resolve($data->companyid);
                },
                'filter' => Html::activeDropDownList($searchModel, 'companyid', \app\models\Companylist::getAll(), ['prompt' => "All",
                        'class' => 'form form-control',
                    ]
                ),
            ],
            'name',
            'email:email',
            'phone',
            'designation',
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

    <?php Pjax::end(); ?>

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