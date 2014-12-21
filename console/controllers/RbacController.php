<?php

namespace console\controllers;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    /**
     * @inheritdoc
     */
    public $defaultAction = 'init';

    public function actionInit($id = null)
    {
        $auth = Yii::$app->authManager;
        $auth->removeAll();

        // add "readPost" permission
        $readPost = $auth->createPermission('readPost');
        $readPost->description = 'Read a post';
        $auth->add($readPost);

        //add "createPost" permission
        $createPost = $auth->createPermission('createPost');
        $createPost->description = 'Create a post';
        $auth->add($createPost);

        //add "updatePost" permission
        $updatePost = $auth->createPermission('updatePost');
        $updatePost->description = 'Update a post';
        $auth->add($updatePost);

        //add "deletePost" permission
        $deletePost = $auth->createPermission('deletePost');
        $deletePost->description = 'Delete a post';
        $auth->add($deletePost);

        //add roles
        $user = $auth->createRole('user');
        $auth->add($user);
        $auth->addChild($user, $readPost);

        $moderator = $auth->createRole('moderator');
        $auth->add($moderator);
        $auth->addChild($moderator, $updatePost);
        $auth->addChild($moderator, $user);

        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $createPost);
        $auth->addChild($admin, $deletePost);
        $auth->addChild($admin, $moderator);

        //admin assignment
        if($id !== null){
            $auth->assign($admin, $id);
        }

    }
}