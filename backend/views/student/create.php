<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Student */

$this->title = 'สร้างสมาชิก';
$this->params['breadcrumbs'][] = ['label' => 'จัดการสมาชิก', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'สร้างสมาชิก', 'url' => ['create']];
?>

            <div class="x_panel">
                <div class="x_title">
                   <h2> <i class=" faa-pulse animated fa fa-users"> </i> <?= Html::encode($this->title) ?></h2>
                    <ul class="nav navbar-right panel_toolbox">

                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

    <?= $this->render('_form', [
        'model' => $model,
        'user'=>$user,
        'amphur'=> $amphur,
        'district' =>$district,
    ]) ?>

</div>
    </div>
