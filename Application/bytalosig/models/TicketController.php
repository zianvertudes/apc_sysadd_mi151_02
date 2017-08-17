<?php

namespace app\models;

use Yii;
use app\models\Ticket;
use app\models\TicketSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TicketController implements the CRUD actions for Ticket model.
 */
class TicketController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Ticket models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TicketSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Ticket model.
     * @param integer $ticket_id
     * @param integer $guest_id
     * @param integer $room_id
     * @param integer $emp_create_id
     * @return mixed
     */
    public function actionView($ticket_id, $guest_id, $room_id, $emp_create_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($ticket_id, $guest_id, $room_id, $emp_create_id),
        ]);
    }

    /**
     * Creates a new Ticket model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Ticket();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ticket_id' => $model->ticket_id, 'guest_id' => $model->guest_id, 'room_id' => $model->room_id, 'emp_create_id' => $model->emp_create_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Ticket model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $ticket_id
     * @param integer $guest_id
     * @param integer $room_id
     * @param integer $emp_create_id
     * @return mixed
     */
    public function actionUpdate($ticket_id, $guest_id, $room_id, $emp_create_id)
    {
        $model = $this->findModel($ticket_id, $guest_id, $room_id, $emp_create_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ticket_id' => $model->ticket_id, 'guest_id' => $model->guest_id, 'room_id' => $model->room_id, 'emp_create_id' => $model->emp_create_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Ticket model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $ticket_id
     * @param integer $guest_id
     * @param integer $room_id
     * @param integer $emp_create_id
     * @return mixed
     */
    public function actionDelete($ticket_id, $guest_id, $room_id, $emp_create_id)
    {
        $this->findModel($ticket_id, $guest_id, $room_id, $emp_create_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Ticket model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $ticket_id
     * @param integer $guest_id
     * @param integer $room_id
     * @param integer $emp_create_id
     * @return Ticket the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ticket_id, $guest_id, $room_id, $emp_create_id)
    {
        if (($model = Ticket::findOne(['ticket_id' => $ticket_id, 'guest_id' => $guest_id, 'room_id' => $room_id, 'emp_create_id' => $emp_create_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
