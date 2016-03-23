<?php
use common\models\Typecourse;
use common\models\Course;
use yii\helpers\Url;
$num=1;
$num2=1;
$num3=1;
$num4=1;


?>
    <header class="hMain">
        <h3 class="wrapHead">คอร์สเรียน <span class="txtColr"></span></h3>
    </header>
   <article class="wrapper">
       <header>
           <a href="<?php echo Url::to(['site/index'])?>" class="back-info">ย้อนกลับ</a>
           <div class="info-title txtColr">
               <?php $type=Typecourse::findOne(['id'=>1]) ?>
               <?=

               ' <h3>'. $type->name.'</h3>'
               ?>

           </div>
       </header>
       <table class="table table-hover" width="100%">
           <thead>
           <tr>
               <th width="10%" >#</th>
               <th width="30%">code</th>
               <th width="500%" >ชื่อคอร์สเรียน</th>
               <th width="20%" >ราคา</th>
           </tr>
           </thead>
           <?php
           $couse = Course::findAll(['typecourse_id'=>$type->id]) ?>
           <?php foreach( $couse as $model): ?>
           <tbody>

           <tr>
               <td><?php echo $num++?></td>
               <td><?php echo $model->cod_id?></td>
               <td><a href="<?=Url::to(['site/view','id'=>$model->id]) ?>"><?php echo $model->name?></a></td>
               <td><?php echo number_format( $model->price)?></td>
           </tr>
           <?php endforeach;?>
           </tbody>
       </table>

       <header>
           <div class="info-title txtColr">
               <?php $type=Typecourse::findOne(['id'=>2]) ?>
               <?=
               ' <h3>'. $type->name.'</h3>'
               ?>
           </div>
       </header>
       <table class="table table-hover" width="100%">
           <thead>
           <tr>
               <th width="10%" >#</th>
               <th width="30%">code</th>
               <th width="500%" >ชื่อคอร์สเรียน</th>
               <th width="20%" >ราคา</th>
           </tr>
           </thead>
           <?php
           $couse = Course::findAll(['typecourse_id'=>$type->id]) ?>
           <?php foreach( $couse as $model): ?>
           <tbody>

           <tr>
               <td><?php echo $num2++?></td>
               <td><?php echo $model->cod_id?></td>
               <td><a href="<?=Url::to(['site/view','id'=>$model->id]) ?>"><?php echo $model->name?></a></td>
               <td><?php echo number_format( $model->price)?></td>
           </tr>
           <?php endforeach;?>
           </tbody>
       </table>

       <header>
           <div class="info-title txtColr">
               <?php $type=Typecourse::findOne(['id'=>3]) ?>
               <?=
               ' <h3>'. $type->name.'</h3>'
               ?>
           </div>
       </header>
       <table class="table table-hover" width="100%">
           <thead>
           <tr>
               <th width="10%" >#</th>
               <th width="30%">code</th>
               <th width="500%" >ชื่อคอร์สเรียน</th>
               <th width="20%" >ราคา</th>
           </tr>
           </thead>
           <?php
           $couse = Course::findAll(['typecourse_id'=>$type->id]) ?>
           <?php foreach( $couse as $model): ?>
           <tbody>

           <tr>
               <td><?php echo $num2++?></td>
               <td><?php echo $model->cod_id?></td>
               <td><a href="<?=Url::to(['site/view','id'=>$model->id]) ?>"><?php echo $model->name?></a></td>
               <td><?php echo number_format( $model->price)?></td>
           </tr>
           <?php endforeach;?>
           </tbody>
       </table>



       </article>
<div class="clearAll"></div>