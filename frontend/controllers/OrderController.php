<?php

namespace frontend\controllers;

use Yii;
use common\models\Order;
use common\models\OrderSearch;
use common\models\Source;
use common\models\Paymethod;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;

/**
 * OrderController implements the CRUD actions for Order model.
 */
class OrderController extends Controller
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
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Order models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (count(Yii::$app->request->queryParams) == 1) {
            return $this->redirectIndex();
        }

        $searchModel = new OrderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Order model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Order model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Order();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirectIndex();
        } else {
            return $this->render('create', [
                'model' => $model,
                'sourceItems' => $this->getSourceItems(),
                'paymethodItems' => $this->getPaymethodItems(),
            ]);
        }
    }

    /**
     * Updates an existing Order model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirectIndex();
        } else {
            return $this->render('update', [
                'model' => $model,
                'sourceItems' => $this->getSourceItems(),
                'paymethodItems' => $this->getPaymethodItems(),
            ]);
        }
    }

    /**
     * Deletes an existing Order model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionPrint($ids)
    {
        $this->layout = 'blank';

        $orders = Order::findAll(explode(',', $ids));

        return $this->render('print', [
            'orders' => $orders,
        ]);
    }

    /**
     * Finds the Order model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Order the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Order::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Redirect to $_GET['redirect-url'] page, or index page with id desc sort as default.
     * @return [type] [description]
     */
    protected function redirectIndex()
    {
        if ($redirectUrl = Yii::$app->request->get('redirect-url')) {
            return $this->redirect($redirectUrl);
        } else {
            return $this->redirect(['index', 'sort' => '-id']);
        }
    }

    protected function getSourceItems()
    {
        $sourceItems = [];
        foreach(Source::find()->all() as $source) {
            $sourceItems[$source->id] = $source->name;
        }

        return $sourceItems;
    }

    protected function getPaymethodItems()
    {
        $paymethodItems = [];
        foreach(Paymethod::find()->all() as $paymethod) {
            $paymethodItems[$paymethod->id] = $paymethod->name;
        }

        return $paymethodItems;
    }
}
