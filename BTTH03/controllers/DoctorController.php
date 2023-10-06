<?php
require_once APP_ROOT.'/services/DoctorServices.php';
class DoctorController{
    public function index(){
        $doctorServices = new DoctorServices();
        $doctors = $doctorServices->getAllDoctor();
        
        include APP_ROOT.'/views/doctor/index.php';
    }

    public function add(){
        if(isset($_POST['btnAdd'])){
            $doctorName = $_POST['name'];
            $doctorSpecial = $_POST['special'];

            $doctorServices = new DoctorServices();
            $doctorServices->addDoctor(new Doctor(null, $doctorName, $doctorSpecial));

        }
        include APP_ROOT.'/views/doctor/add.php';
    }
    public function edit(){
        $doctorServices = new DoctorServices();
        $doctor = $doctorServices->getDoctor($_GET['id']);

        if(isset($_POST['btnEdit'])){
            $doctorID = $_GET['id'];
            $doctorName = $_POST['name'];
            $doctorSpeacial = $_POST['special'];
            if($doctor->getNameDoctor() == $doctorName){
                header("location: ". DOMAIN.'/views/index.php?controller=doctor&action=list&error=edit_doctor_failed');
            }
            else{
                $doctor = new Doctor($doctorID, $doctorName, $doctorSpeacial);
                $doctorServices->editDoctor($doctor);
            }
        }
        include APP_ROOT.'/views/doctor/edit.php';
    }
    
    public function delete(){
        $doctorServices = new DoctorServices();
        $id = $_GET['id'];
        $doctorServices->delete($id);
        include APP_ROOT.'/views/doctor/index.php';
    }
}
?>