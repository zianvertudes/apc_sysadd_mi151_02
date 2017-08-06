<?php

namespace app\models;

use Yii;
use app\models\employee;
use app\models\EmployeeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EmployeeController implements the CRUD actions for employee model.
 */
class EmployeeController extends Controller
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
     * Lists all employee models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EmployeeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single employee model.
     * @param integer $emp_id
     * @param integer $department_dept_id
     * @return mixed
     */
    public function actionView($emp_id, $department_dept_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($emp_id, $department_dept_id),
        ]);
    }

    /**
     * Creates a new employee model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new employee();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'emp_id' => $model->emp_id, 'department_dept_id' => $model->department_dept_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing employee model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $emp_id
     * @param integer $department_dept_id
     * @return mixed
     */
    public function actionUpdate($emp_id, $department_dept_id)
    {
        $model = $this->findModel($emp_id, $department_dept_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'emp_id' => $model->emp_id, 'department_dept_id' => $model->department_dept_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing employee model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $emp_id
     * @param integer $department_dept_id
     * @return mixed
     */
    public function actionDelete($emp_id, $department_dept_id)
    {
        $this->findModel($emp_id, $department_dept_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the employee model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $emp_id
     * @param integer $department_dept_id
     * @return employee the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($emp_id, $department_dept_id)
    {
        if (($model = employee::findOne(['emp_id' => $emp_id, 'department_dept_id' => $department_dept_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
