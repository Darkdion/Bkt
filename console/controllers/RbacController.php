<?php
namespace console\controllers;

use Yii;
use yii\helpers\Console;

class RbacController extends \yii\console\Controller
{

    // public function actionInit(){
    //   Console::output('Yii 2 Learning.');
    // }

    public function actionInit()
    {
        $auth = Yii::$app->authManager;
        $auth->removeAll();
        Console::output('Removing All! RBAC.....');

        $rule = new \common\rbac\AuthorRule;
        $auth->add($rule);

        // $loginToBackend = $auth->createPermission('loginToBackend');
        // $loginToBackend->description = 'ล็อกอินเข้าใช้งานส่วน backend';
        // $auth->add($loginToBackend);

        $Admin = $auth->createRole('Admin');
        $Admin->description = 'ผู้ดูแลระบบ';
        $auth->add($Admin);

        $manager = $auth->createRole('Manager');
        $manager->description = 'พนักงาน';
        $auth->add($manager);

        $user = $auth->createRole('User');
        $user->description = 'สมาชิก';
        $auth->add($user);


        $auth->addChild($Admin, $manager);
        $auth->addChild($Admin, $user);
        $auth->addChild($manager, $user);


        $auth->assign($Admin, 1);
        $auth->assign($manager, 2);
        $auth->assign($user, 3);
        //$auth->assign($author, 4);

        Console::output('Success! RBAC roles has been added.');

    }


}

?>
