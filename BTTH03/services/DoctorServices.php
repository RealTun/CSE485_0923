<?php
require_once APP_ROOT.'/models/Doctor.php';
require_once APP_ROOT.'/libs/DBConnection.php';
class DoctorServices{
    public function getAllDoctor(){
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();
        if($conn != null){
            $sql = 'select * from bacsi';
            $state = $conn->query($sql);
            
            $doctors = [];
            while($row = $state->fetch()){
                $doctor = new Doctor($row['id'], $row['tenBacSi'], $row['chuyenKhoa']);
                $doctors[] = $doctor;
            }
            return $doctors;
        }
        return $doctors = [];
    }

    public function getDoctor($id){
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();
        if($conn != null){
            $sql = "select * from bacsi where id = '$id'";
            $state = $conn->query($sql);
            $row = $state->fetch();

            $doctor = new Doctor($row['id'], $row['tenBacSi'], $row['chuyenKhoa']);
            return $doctor;
        }
    }

    public function getDoctorByName($name){
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();
        if($conn != null){
            $sql = "select * from bacsi where tenBacSi = '$name'";
            $state = $conn->query($sql);
            $row = $state->fetch();

            $doctor = new Doctor($row['id'], $row['tenBacSi'], $row['chuyenKhoa']);
            return $doctor;
        }
    }

    public function isExisted($id){
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();
        if($conn != null){
            $sql = "select count(*) from bacsi where id = '$id'";
            $state = $conn->query($sql);
            if($state->fetchColumn() != '0'){
                return true;
            }
            return false;
        }
    }

    public function addDoctor($doctor){
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();
        if($conn != null){
            $sql_check = "select count(*) from bacsi where tenBacSi = '{$doctor->getNameDoctor()}'";
            $state = $conn->query($sql_check);
            //check doctor exist
            if($state->fetchColumn() == '0'){
                $sql = "insert into bacsi (tenBacSi, chuyenKhoa) values ('{$doctor->getNameDoctor()}', '{$doctor->getSpecial()}')";
                $state = $conn->query($sql);
                if($state->rowCount() > 0){
                    
                    header("location: ". DOMAIN.'/views/index.php?controller=doctor&action=list&success=insert_doctor_successful');
                }
            }
            else{
                header("location: ". DOMAIN.'/views/index.php?controller=doctor&action=add&error=the_doctor_has_existed');
            }         
        }
    }

    public function editDoctor($doctor){
        $dbConnection = new DBConnection();
        $conn = $dbConnection->getConnection();
        if($conn != null){
            $sql = "update bacsi set tenBacSi = '{$doctor->getNameDoctor()}', chuyenKhoa = '{$doctor->getSpecial()}' where id = '{$doctor->getId()}'";
            $state = $conn->query($sql);
            if($state->rowCount() > 0){
                    
                header("location: ". DOMAIN.'/views/index.php?controller=doctor&action=list&success=edit_doctor_successful');
            }
            else{
                header("location: ". DOMAIN.'/views/index.php?controller=doctor&action=list&error=edit_doctor_failed');
            }
        }
    }

    public function delete($id){
        $dbConnection = new DBConnection();
        $conn =  $dbConnection->getConnection();
        if($conn != null){
            $sql = "delete from bacsi where id = '$id'";
            $state = $conn->query($sql);
            if($state->rowCount() > 0){
                header("location: ". DOMAIN.'/views/index.php?controller=doctor&action=list&success=delete_doctor_successful');
            }
            else{
                header("location: ". DOMAIN.'/views/index.php?controller=doctor&action=list&error=delete_doctor_failed');
            }
        }
    }
}
?>