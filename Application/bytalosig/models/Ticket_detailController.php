<?php

namespace app\models;

use Yii;
use app\models\Ticketdetails;
use app\models\Ticket_detailSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * Ticket_detailController implements the CRUD actions for Ticketdetails model.
 */
class Ticket_detailController extends Controller
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
     * Lists all Ticketdetails models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new Ticket_detailSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Ticketdetails model.
     * @param integer $ticket_det_id
     * @param integer $emp_resp_id
     * @param integer $category_id
     * @param integer $ticket_id
     * @param integer $dept_resp_id
     * @return mixed
     */
    public function actionView($ticket_det_id, $emp_resp_id, $category_id, $ticket_id, $dept_resp_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($ticket_det_id, $emp_resp_id, $category_id, $ticket_id, $dept_resp_id),
        ]);
    }

    /**
     * Creates a new Ticketdetails model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Ticketdetails();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ticket_det_id' => $model->ticket_det_id, 'emp_resp_id' => $model->emp_resp_id, 'category_id' => $model->category_id, 'ticket_id' => $model->ticket_id, 'dept_resp_id' => $model->dept_resp_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Ticketdetails model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $ticket_det_id
     * @param integer $emp_resp_id
     * @param integer $category_id
     * @param integer $ticket_id
     * @param integer $dept_resp_id
     * @return mixed
     */
    public function actionUpdate($ticket_det_id, $emp_resp_id, $category_id, $ticket_id, $dept_resp_id)
    {
        $model = $this->findModel($ticket_det_id, $emp_resp_id, $category_id, $ticket_id, $dept_resp_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ticket_det_id' => $model->ticket_det_id, 'emp_resp_id' => $model->emp_resp_id, 'category_id' => $model->category_id, 'ticket_id' => $model->ticket_id, 'dept_resp_id' => $model->dept_resp_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Ticketdetails model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $ticket_det_id
     * @param integer $emp_resp_id
     * @param integer $category_id
     * @param integer $ticket_id
     * @param integer $dept_resp_id
     * @return mixed
     */
    public function actionDelete($ticket_det_id, $emp_resp_id, $category_id, $ticket_id, $dept_resp_id)
    {
        $this->findModel($ticket_det_id, $emp_resp_id, $category_id, $ticket_id, $dept_resp_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Ticketdetails model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $ticket_det_id
     * @param integer $emp_resp_id
     * @param integer $category_id
     * @param integer $ticket_id
     * @param integer $dept_resp_id
     * @return Ticketdetails the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ticket_det_id, $emp_resp_id, $category_id, $ticket_id, $dept_resp_id)
    {
        if (($model = Ticketdetails::findOne(['ticket_det_id' => $ticket_det_id, 'emp_resp_id' => $emp_resp_id, 'category_id' => $category_id, 'ticket_id' => $ticket_id, 'dept_resp_id' => $dept_resp_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
