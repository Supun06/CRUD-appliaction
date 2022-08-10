<?php

class SiteController extends Controller
{
	

	
	public function actionIndex()
	{
		
		$this->render('load');
	}

	
	public function actionAddNew()
	{
		$this->renderpartial('addNew');
	}

	public function actionLoad()
	{
		$this->render('load');
		
	}

	public function actionGetStudentVal(){
		
		$studentVal = Student::model()->findAll();
		$this->renderpartial('view',array('studentVal'=>$studentVal));
	}
    
	public function actionGetDelete(){
		 $student=Student::model()->findByPk($_POST['id']); 
         $student->delete();	 
	}

	public function actionGetStudentSubmit(){	
		
		$student = new Student();
		$student->name=$_POST['name'];
		$student->age=$_POST['age'];
		$student->gender=$_POST['gender'];
		$student->dob=$_POST['dob'];
		$student->address=$_POST['address'];
		if ($student->validate()){
            if ($student->save()){
                $response  = array(
                    'status'=>1,
                    'msg'=>'Student Added Success...'
                );
                echo json_encode($response);
            }else{
                $response  = array(
                    'status'=>0,
                    'msg'=>'Something went wrong please contact ...',
                );
                echo json_encode($response);
            }
        }else{
            $response  = array(
                'status'=>2,
                'msg'=>'Please check below errors',
                'errors'=>$student->errors
            );
            echo json_encode($response);
        }
		
	}

	public function actionGetUpdate(){
		
		$student= Student::model()->findByPk($_POST['id']);
		$student->name = $_POST['name'];
		$student->age = $_POST['age'];
		$student->gender = $_POST['gender'];
		$student->dob = $_POST['dob'];
		$student->address = $_POST['address'];
		if ($student->validate()){
            if ($student->save()){
                $response  = array(
                    'status'=>1,
                    'msg'=>'Student Added Success...'
                );
                echo json_encode($response);
            }else{
                $response  = array(
                    'status'=>0,
                    'msg'=>'Something went wrong please contact ...',
                );
                echo json_encode($response);
            }
        }else{
            $response  = array(
                'status'=>2,
                'msg'=>'Please check below errors',
                'errors'=>$student->errors
            );
            echo json_encode($response);
        }
	}

}