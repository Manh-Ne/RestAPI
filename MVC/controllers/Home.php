<?php
    require_once './MVC/view/JsonView.php';
    class Home extends Controller {
        protected $view;
        public function __construct() {
            $this->view = new JsonView();
        }
        public function Home() {
            $svModel = new Student();
            $a = $svModel->getStudent();
            $this->view->render($a);
         }
         public function read($id) {
            $svModel = new Student();
            $a = $svModel->getStudentById($id);
            $this->view->render($a);
         }
        public function create(){
            $data = json_decode(file_get_contents('php://input'), true); 
            $svModel = new Student();
            $svModel->createStudent($data);
            $this->view->render($data);
        }
        public function update(){
            $data = json_decode(file_get_contents('php://input'), true); 
            $svModel = new Student();
            $svModel->updateStudent($data);
            $this->view->render($data);
        }
        public function delete($id){
            $svModel = new Student();
            $svModel->deleteStudent($id);
            $this->view->render($id);
        }
    }
?>