<?php
require_once APP_ROOT.'/services/PatientServices.php';
require_once APP_ROOT.'/services/DoctorServices.php';
class PatientController{
    public function index(){
        $patientServices = new PatientServices();
        $patients = $patientServices->getAllPatient();
        
        include APP_ROOT.'/views/patient/index.php';
    }

    public function add(){
        $doctorServices = new DoctorServices();
        $doctors = $doctorServices->getAllDoctor();
        if(isset($_POST['btnAdd'])){
            $patientName = $_POST['name'];
            $patientDate = $_POST['date'];
            $patientSymptom = $_POST['symptom'];

            $doctor = $doctorServices->getDoctorByName($_POST['nameDoctor']);
            $patientServices = new PatientServices();
            $patientServices->addPatient(new Patient(null, $patientName, $patientDate, $patientSymptom, $doctor->getId()));

        }
        include APP_ROOT.'/views/patient/add.php';
    }
    public function edit(){
        $doctorServices = new DoctorServices();
        $doctors = $doctorServices->getAllDoctor();

        $patientServices = new patientServices();
        $patient = $patientServices->getPatient($_GET['id']);

        if(isset($_POST['btnEdit'])){
            $patientName = $_POST['name'];
            $patientDate = $_POST['date'];
            $patientSymptom = $_POST['symptom'];

            if($patient->getNamePatient() == $patientName){
                header("location: ". DOMAIN.'/views/index.php?controller=patient&action=list&error=edit_patient_failed');
            }
            else{
                $doctor = $doctorServices->getDoctorByName($_POST['nameDoctor']);
                $patientServices->editPatient(new Patient($_GET['id'], $patientName, $patientDate, $patientSymptom, $doctor->getId()));
            }
        }
        include APP_ROOT.'/views/patient/edit.php';
    }
    
    public function delete(){
        $patientServices = new PatientServices();
        $id = $_GET['id'];
        $patientServices->delete($id);
        include APP_ROOT.'/views/patient/index.php';
    }
}
?>