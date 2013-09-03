<?php

class UserController extends Controller
{
	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_model;
	
	/**
	 * Displays a particular model.
	 */
	public function actionView()
	{
		$model = $this->loadModel();
		$this->render('view',array(
			'model'=>$model,
		));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
        $filterModel = new FilterModel;
        $Criteria = new CDbCriteria;

        if (isset($_REQUEST['FilterModel'])){
            $filterModel->attributes = $_REQUEST['FilterModel'];
        }
        if ($filterModel->roles) {
            $Criteria->addInCondition(
                'id',
                Yii::app()->getAuthManager()->getAssignedUsers($filterModel->roles)
            );
        }

		$dataProvider=new CActiveDataProvider('AUser', array(
			'criteria'=> $Criteria,
			'pagination'=>false
		));

		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			'filterModel'=>$filterModel,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 */
	public function loadModel()
	{
		if($this->_model===null)
		{
			if(isset($_GET['id']))
				$this->_model=User::model()->findbyPk($_GET['id']);
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}


	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the primary key value. Defaults to null, meaning using the 'id' GET variable
	 */
	public function loadUser($id=null)
	{
		if($this->_model===null)
		{
			if($id!==null || isset($_GET['id']))
				$this->_model=User::model()->findbyPk($id!==null ? $id : $_GET['id']);
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}
}
