<?php
    include '../../connection.php';

    $pengaduanID = $_GET['pengaduan_id'];
    $status = $_GET['status'];
    $employeeID = $_GET['employee_id'];

    if($status == 'proses'){
        $editStatus = mysqli_query($conn, "UPDATE pengaduans SET status='selesai' WHERE id='$pengaduanID'");
        if($editStatus){
            header("location:dashboard-admin.php?employee_id=$employeeID&&msg=update");
        }else{
            echo '<script>      
                        alert("gagal mengubah status data")
                    </script>';
        }
    }else{
        $editStatus = mysqli_query($conn, "UPDATE pengaduans SET status='proses' WHERE id='$pengaduanID'");
        if($editStatus){
            header("location:dashboard-admin.php?employee_id=$employeeID&&msg=update");
        }else{
            echo '<script>      
                        alert("gagal mengubah status data")
                    </script>';
        }
    }
?>