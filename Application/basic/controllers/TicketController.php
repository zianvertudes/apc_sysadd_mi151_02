<?php

namespace app\controllers;

use Yii;
use app\models\Ticket;
use app\models\TicketSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\rest\ActiveController;

/**
 * DepartmentController implements the CRUD actions for department model.
 */
class TicketController extends ActiveController
{
    /**
     * @inheritdoc
     */
    public $modelClass = 'app\models\Ticket';
}
