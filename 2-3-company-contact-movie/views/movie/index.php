<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ContactsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>

    <input type="text" id="myInput" placeholder="Search for movies.." class="form-control">

        <div class="row" id="data">
        </div>


<?php
$Url = \yii\helpers\Url::toRoute('fetch');
$this->registerJs(<<<JS
$('#myInput').on('keyup', function (){
          var  input = document.getElementById('myInput').value;

  $.ajax({
  url: "$Url",
  type: 'post',
  data: {input : input },
   success: function(result){
console.log(JSON.parse(result)) 
if(result){
    var data = "";
result = JSON.parse(result);
$.each(result, function(index, value) {
  var temp = "<div class='col-md-4 col-sm-2'><h5>" +value.Title + "<br>"+"<img src="+value.Poster+" width='200' height='200'>"+"<br>"+value.Type+"<br>"+value.Year+"<br>"+"imdbId: "+value.imdbID+"</h5></div>";
  data = data+temp;
});
        document.getElementById("data").innerHTML = data;
}




  }
  });
    });

JS
);