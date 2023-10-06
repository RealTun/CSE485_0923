<?php
require_once APP_ROOT.'/models/Patient.php';
require_once APP_ROOT.'/libs/DBConnection.php';
class PatientServices{
    public function getAllPatient(){
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();
        if($conn != null){
            $sql = 'select * from benhnhan';
            $state = $conn->query($sql);
            
            $patients = [];
            while($row = $state->fetch()){
                $patient = new Patient($row['id'], $row['tenBenhNhan'], $row['ngayKham'], $row['trieuChung'], $row['idBacSi']);
                $patients[] = $patient;
            }
            return $patients;
        }
        return $patients = [];
    }

    public function getPatient($id){
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();
        if($conn != null){
            $sql = "select * from benhnhan where id = '$id'";
            $state = $conn->query($sql);
            $row = $state->fetch();

            $patient = new Patient($row['id'], $row['tenBenhNhan'], $row['ngayKham'], $row['trieuChung'], $row['idBacSi']);
            return $patient;
        }
    }

    public function getPatientByName($name){
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();
        if($conn != null){
            $sql = "select * from benhnhan where tenBenhNhan = '$name'";
            $state = $conn->query($sql);
            $row = $state->fetch();

            $patient = new Patient($row['id'], $row['tenBenhNhan'], $row['ngayKham'], $row['trieuChung'], $row['idBacSi']);
            return $patient;
        }
    }

    public function isExisted($id){
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();
        if($conn != null){
            $sql = "select count(*) from benhnhan where id = '$id'";
            $state = $conn->query($sql);
            if($state->fetchColumn() != '0'){
                return true;
            }
            return false;
        }
    }

    public function addPatient($patient){
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();
        if($conn != null){
            $sql_check = "select count(*) from benhnhan where tenBenhNhan = '{$patient->getNamePatient()}'";
            $state = $conn->query($sql_check);
            //check doctor exist
            if($state->fetchColumn() == '0'){
                $sql = "insert into benhnhan (tenBenhNhan, ngayKham, trieuChung, idBacSi) values ('{$patient->getNamePatient()}', '{$patient->getDate()}', '{$patient->getSymptom()}', '{$patient->getIdDoctor()}')";
                $state = $conn->query($sql);
                if($state->rowCount() > 0){
                    
                    header("location: ". DOMAIN.'/views/index.php?controller=patient&action=list&success=insert_patient_successful');
                }
            }
            else{
                header("location: ". DOMAIN.'/views/index.php?controller=patient&action=add&error=the_patient_has_existed');
            }         
        }
    }

    public function editPatient($patient){
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();
        if($conn != null){
            $sql = "update benhnhan set tenBenhNhan = '{$patient->getNamePatient()}', ngayKham = '{$patient->getDate()}', trieuChung = '{$patient->getSymptom()}', idBacSi = '{$patient->getIdDoctor()}' where id = '{$patient->getId()}'";
            $state = $conn->query($sql);
            if($state->rowCount() > 0){
                    
                header("location: ". DOMAIN.'/views/index.php?controller=patient&action=list&success=edit_patient_successful');
            }
            else{
                header("location: ". DOMAIN.'/views/index.php?controller=patient&action=list&error=edit_patientauthor_failed');
            }
        }
    }

    public function delete($id){
        $dbConnection = new DBConnection();
        $conn =  $dbConnection->getConnection();
        if($conn != null){
            $sql = "delete from benhnhan where id = '$id'";
            $state = $conn->query($sql);
            if($state->rowCount() > 0){
                header("location: ". DOMAIN.'/views/index.php?controller=patient&action=list&success=delete_patient_successful');
            }
            else{
                header("location: ". DOMAIN.'/views/index.php?controller=patient&action=list&error=delete_patient_failed');
            }
        }
    }
}
?>