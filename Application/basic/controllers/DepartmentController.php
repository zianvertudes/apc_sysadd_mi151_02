<?php

namespace app\controllers;

use Yii;
use app\models\department;
use app\models\DepartmentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\rest\ActiveController;

/**
 * DepartmentController implements the CRUD actions for department model.
 */
class DepartmentController extends ActiveController
{
    /**
     * @inheritdoc
     */
    public $modelClass = 'app\models\Department';
}
