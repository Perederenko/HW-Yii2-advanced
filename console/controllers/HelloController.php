<?php

namespace console\controllers;

use Yii;
use yii\console\Controller;
use yii\console\Exception;
use yii\helpers\Console;
use yii\helpers\FileHelper;
use yii\helpers\Inflector;

class HelloController extends Controller
{
    /**
     * @var string the default command action.
     */
    public $defaultAction = 'create';
    /**
     * @var string the directory storing the greeting files. This can be either
     * a path alias or a directory.
     */
    public $greetingPath = '@app/greeting';

    public function beforeAction($action)
    {
        if (parent::beforeAction($action)) {
            $path = Yii::getAlias($this->greetingPath);
            if (!is_dir($path)) {
                FileHelper::createDirectory($path);
            }
            $this->greetingPath = $path;

            return true;
        } else {
            return false;
        }
    }
    /**
     * Creates a new greeting.
     *
     * This command creates a new greeting using your name.
     * ~~~
     * yii hello/create your_name
     * ~~~
     *
     *These commands create a new greeting,if option and/or argument are not passed using default value.
     *~~~
     *yii hello/create or yii hello your_name or yii hello
     *~~~
     *
     * @param string $name the name of the new greeting. This should only contain
     * letters, digits and/or underscores.
     * @throws Exception if the name argument is invalid.
     */
    public function actionCreate($name = 'world')
    {
        if (!preg_match('/^\w+$/', $name)) {
            throw new Exception("The greeting name should contain letters, digits and/or underscore characters only.");
        }

        $file = $this->greetingPath . DIRECTORY_SEPARATOR . time() . 'hello' . $name . '.txt';

        if ($this->confirm("Create new greeting '$file'?")) {
            if($name !== 'world'){
                $name = Inflector::titleize($name);
            }
            $content = 'Hello ' . $name . '!';
            file_put_contents($file, $content);
            $this->stdout("New greeting created successfully.\n", Console::FG_GREEN);
        }
    }
}