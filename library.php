<?php
    if (!isset($_SESSION)) {
        session_start();
    }
?>

<?php

    $connection = new mysqli('localhost', 'root', '', 'loom');

    $error_flag = 0;
    $result;
    if ($connection->connect_error) {
        die('connection failed: '.$connection->connect_error);
    }

    function secure($unsafe_data)
    {
        return htmlentities($unsafe_data);
    }

    function login($email_id_unsafe, $password_unsafe, $table = 'users')
    {
        global $connection;

        $email_id = secure($email_id_unsafe);
        $password = secure($password_unsafe);

        $sql = "SELECT COUNT(*) FROM $table WHERE email = '$email_id' AND password = '$password';";

        $result = $connection->query($sql);

        $num_rows = (int) $result->fetch_array()['0'];

        if ($num_rows > 1) {
            //send email to sysadmin that my site has been hacked
              return 0;
        } elseif ($num_rows == 0) {
            echo status('no-match');

            return 0;
        } else {
            echo "<div class='alert alert-success'> <strong>Well done!</strong> Logged In</div>";
            $_SESSION['username'] = $email_id;


            if ($table == 'admin') {
                $_SESSION['user-type'] = 'admin';
            }

            if ($table == 'users' || $table == 'doctors' || $table == 'clerks') {
                $sql = "SELECT fullname FROM $table WHERE email = '$email_id' AND password = '$password';";

                $result = $connection->query($sql);

                $fullname = $result->fetch_array()['fullname'];
                $_SESSION['fullname'] = $fullname;
                if ($table == 'users') {
                    $_SESSION['user-type'] = 'normal';
                } elseif ($table == 'clerks') {
                    $_SESSION['user-type'] = 'clerk';
                } else {
                    $_SESSION['user-type'] = 'doctor';
                }
            }

            if ($table == 'users'){
                $sql_user_id = "SELECT id_users FROM users WHERE email = '$email_id';";

                $result = $connection->query($sql_user_id);
                $ses_usr_id = $result->fetch_array()['id_users'];
                $_SESSION['ses_id_user'] = $ses_usr_id;
            }
            return 1;
        }
    }

    function register($email_id_unsafe, $adress_unsafe, $phone_unsafe, $password_unsafe, $full_name_unsafe, $table)
    {
        global $connection,$error_flag;

        $email = secure($email_id_unsafe);
        $adress = secure($adress_unsafe);
        $phone = secure($phone_unsafe);
        $password = secure($password_unsafe);
        $fullname = ucfirst(secure($full_name_unsafe));

        $sql;

        switch ($table) {
            case 'users':
                $sql = "INSERT INTO $table VALUES (NULL ,'$email', '$password', '$phone', '$adress', '$fullname');";
                break;
            case 'doctors':
                $sql = "INSERT INTO $table VALUES ('$email', '$password', '$fullname');";
                break;
            case 'clerks':
                $sql = "INSERT INTO $table VALUES ('$email', '$password', '$fullname');";
                break;
            default:
                // code...
                break;
        }

        if ($connection->query($sql) === true) {
            echo status('record-success');
            if ($table == 'users' && $error_flag == 0) {
                return login($email, $password);
            }
        } else {
            echo status('record-fail');
        }
    }

    function status($type, $data = 0)
    {
        $success = "<div class='alert alert-success'> <strong>Done!</strong>";
        $fail = "<div class='alert alert-warning'><strong>Sorry!</strong>";
        $end = '</div>';

        switch ($type) {
            case 'record-success':
                return "$success New record created successfully! $end";
                break;
            case 'record-fail':
                return "$fail New record creation failed. $end";
                break;
            case 'record-dup':
                return "$fail Duplicate record exists. $end";
                break;
            case 'no-match':
                return "$fail Record did not match. $end";
                break;
            case 'con-failed':
                return "$fail connection Failed! $end";
                break;
            case 'appointment-success':
                return "$success Your appointment is booked successfully! Your appointment no is $data $end";
                break;
            case 'appointment-fail':
                return "$fail Failed to book your appointment Failed! $end";
                break;
            case 'update-success':
                return "$success New record updated successfully! $end";
                break;
            case 'update-fail':
                return "$fail Failed to update data! $end";
                break;
            default:
                // code...
                break;
        }
    }

  function enter_patient_info($full_name_unsafe, $age_unsafe, $phone_no_unsafe, $address_unsafe)
  {
      global $connection, $error_flag,$result;

      $full_name = ucfirst(secure($full_name_unsafe));
      $age = secure($age_unsafe);
      $phone_no = secure($phone_no_unsafe);
      $address = secure($address_unsafe);

      $sql = "INSERT INTO `patient_info` VALUES (NULL, '$full_name', $age, '$phone_no','$address');";

      if ($connection->query($sql) === true) {
          echo status('record-success');

          return $connection->insert_id;
      } else {
          echo status('record-fail');

          return 0;
      }
  }

    function appointment_booking($result_id_unsafe, $apDate_unsafe, $apTime_unsafe, $apFullname_unsafe, $apReason_unsafe)
    {
        global $connection;
//        $patient_id = secure($user_id_unsafe);
        $apReason = secure($apReason_unsafe);
        $apFullname = secure($apFullname_unsafe);
        $apDate = $apDate_unsafe;
        $result_id = $result_id_unsafe;
        $apTime = $apTime_unsafe;

        $sql = "INSERT INTO appointments VALUES (NULL, '$result_id', '$apDate', '$apReason', '$apTime', '$apFullname', NULL)";

        if ($connection->query($sql) === true) {
            echo status('appointment-success', $connection->insert_id);
        } else {
            echo status('appointment-fail');
            echo 'Error: '.$sql.'<br>'.$connection->error;
        }
    }

    function add_pets($result_id_unsafe, $pet_breed_unsafe, $pet_age_unsafe, $pet_name_unsafe)
    {
        global $connection;
    //        $patient_id = secure($user_id_unsafe);
        $pet_age = secure($pet_age_unsafe);
        $pet_name = secure($pet_name_unsafe);
        $pet_breed = secure($pet_breed_unsafe);
        $result_id = $result_id_unsafe;

        $sql = "INSERT INTO user_pet VALUES (NULL, '$result_id', '$pet_breed', '$pet_age', '$pet_name')";

        if ($connection->query($sql) === true) {
            echo status('appointment-success', $connection->insert_id);
        } else {
            echo status('appointment-fail');
            echo 'Error: '.$sql.'<br>'.$connection->error;
        }
    }

    function debug_to_console( $data ) {
        $output = $data;
        if ( is_array( $output ) )
            $output = implode( ',', $output);

        echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
    }

    function update_appointment_info($appointment_no_unsafe, $column_name_unsafe, $data_unsafe)
    {
        global $connection;

        $sql;

        $appointment_no = (int) secure($appointment_no_unsafe);
        $column_name = secure($column_name_unsafe);
        $data = secure($data_unsafe);

        if ($column_name == 'payment_amount') {
            $data = (int) $data;
            $sql = "UPDATE `appointments` SET `payment_amount` = '$data', `case_closed` = 'no' WHERE appointment_no` = $appointment_no";
        } else {
            $sql = "UPDATE appointments SET $column_name = '$data' WHERE appointment_no = $appointment_no;";
        }
        echo $sql;
        if ($connection->query($sql) === true) {
            echo status('update-success');

            return 1;
        } else {
            echo status('update-fail');
            echo 'Error: '.$sql.'<br>'.$connection->error;

            return 0;
        }
    }

    function getPatientsFor($doctor = 'Dentist')
    {
        global $connection;

//        return $connection->query("SELECT * FROM appointments where speciality='$doctor' AND patient_info.patient_id = appointments.patient_id");
        return $connection->query("SELECT * FROM appointments where speciality='$doctor'");
    }

    function getAllAppointments()
    {
        global $connection;

//        return $connection->query('SELECT appointment_no, full_name,speciality, medical_condition FROM patient_info, appointments where patient_info.patient_id = appointments.patient_id');
        return $connection->query('SELECT * FROM appointments');
    }

    function getAllMyPets($user_id)
    {
        global $connection;

        return $connection->query("SELECT * FROM user_pet WHERE user_id = '$user_id'");
    }

    function getAllPatientDetail($usr_id)
    {
        global $connection;

        return $connection->query("SELECT * FROM users where id_users = '$usr_id'");
    }

    function getSpecificPet($pet_i)
    {
        global $connection;


        return $connection->query("SELECT pet_name, pet_age, pet_breed, data_date, prescription FROM user_pet, pet_data where pet_data.pet_id  = '$pet_i' AND user_pet.id = '$pet_i'");

    }

function addPetInfo($unsafe_pet_id, $unsafe_pet_info, $unsafe_pet_date)
{
    global $connection;
    //        $patient_id = secure($user_id_unsafe);
    $pet_id = (int) secure($unsafe_pet_id);
    $pet_info = secure($unsafe_pet_info);
    $pet_date = $unsafe_pet_date;

    $sql = "INSERT INTO pet_data VALUES (NULL, '$pet_id', '$pet_date', '$pet_info')";

    if ($connection->query($sql) === true) {
        echo status('appointment-success', $connection->insert_id);
    } else {
        echo status('appointment-fail');
        echo 'Error: '.$sql.'<br>'.$connection->error;
    }
}

    function getAllUsers()
    {
        global $connection;

        return $connection->query("SELECT * FROM users");
    }

    function getPetData($pet_id)
    {
        global $connection;

        return $connection->query("SELECT * FROM pet_data WHERE pet_id = '$pet_id'");
    }

    function InsertPetData()
    {
        global $connection;
        //        $patient_id = secure($user_id_unsafe);
        $pet_age = secure($pet_age_unsafe);
        $pet_name = secure($pet_name_unsafe);
        $pet_breed = secure($pet_breed_unsafe);
        $result_id = $result_id_unsafe;

        $sql = "INSERT INTO user_pet VALUES (NULL, '$result_id', '$pet_breed', '$pet_age', '$pet_name')";

        if ($connection->query($sql) === true) {
            echo status('appointment-success', $connection->insert_id);
        } else {
            echo status('appointment-fail');
            echo 'Error: '.$sql.'<br>'.$connection->error;
        }
    }

    function get_table($purpose, $data)
    {
        global $connection;

        $sql;

        switch ($purpose) {
            case 'patient_information':
                $sql = 'SELECT * FROM patient_info AND (SELECT )';
                break;
            case 'doctor-home':
                $sql = '';

                $result = $connection->query($sql);

                echo "<table border='1'>
				<tr>
				<th>appointment_no</th>
				<th>patient_name</th>
				<th>age</th>
				<th>appointment_time</th>
				<th>medical_condition</th>
				<th>option</th>
				</tr>";

                while ($row = $result->fetch_array()) {
                    echo '<tr>';
                    echo '<td>'.$row['appointment_no'].'</td>';
                    echo '<td>'.$row['full_name'].'</td>';
                    echo '<td>'.$row['age'].'</td>';
                    echo '<td>'.$row['appointment_time'].'</td>';
                    echo '<td>'.$row['medical_condition'].'</td>';
                    echo "<td> <button class='btn btn-primary'> Open Case</button> <button class='btn btn-primary'> Close Case</button> </td>";
                    echo '</tr>';
                }
                echo '</table>';
                break;
            case 'all':
                $sql = 'SELECT * FROM patient_info AND (SELECT )';
                break;
            case 'patient_information':
                $sql = 'SELECT * FROM patient_info AND (SELECT )';
                break;
            default:
                // code...
                break;
        }
    }

    function appointment_status($appointment_no_unsafe)
    {
        global $connection;

        $appointment_no = secure($appointment_no_unsafe);
        $i = 0;

        $result = $connection->query("SELECT doctors_suggestion FROM appointments WHERE appointment_no=$appointment_no;");
        if ($result === false) {
            return 0;
        } else {
            ++$i;
        }

        return $i;
    }

    function delete($table, $id_unsafe)
    {
        global $connection;

        $id = secure($id_unsafe);

        return $connection->query("DELETE FROM $table WHERE email='$id';");
    }

    function getListOfEmails($table)
    {
        global $connection;

        return $connection->query("SELECT email FROM $table;");
    }

    function getAllPriceListItems()
    {
        global $connection;
        $sql;

                $sql = '';
                $sql = 'SELECT * FROM pricelist';

                $result = $connection->query($sql);

                echo "<table id='tableit' class='table'>
                        <tr class='my-table-header'>
                        <td style='width: 35%;'>Toode</td>
                        <td style='width: 50%'>Kirjeldus</td>
                        <td style='width: 15%px;'>Hind</td>
                        </tr>";

                while ($row = $result->fetch_array()) {
                    echo "<tr>";
                    echo "<td class='price-list-item'>".$row['item_name']."</td>";
                    echo "<td class='price-list-item'>".$row['extra_info']."</td>";
                    echo "<td class='price-list-item'>".$row['item_price']." €</td>";
                    echo "</tr>";
                }
                echo "</table>";


    }

    function noAccessForNormal()
    {
        if (isset($_SESSION['user-type'])) {
            if ($_SESSION['user-type'] == 'normal') {
                echo '<script type="text/javascript">window.location = "index_logged.php"</script>';
            }
        }
    }
    function noAccessForDoctor()
    {
        if (isset($_SESSION['user-type'])) {
            if ($_SESSION['user-type'] == 'doctor') {
                echo '<script type="text/javascript">window.location = "patient_info.php"</script>';
            }
        }
    }
    function noAccessForClerk()
    {
        if (isset($_SESSION['user-type'])) {
            if ($_SESSION['user-type'] == 'clerk') {
                echo '<script type="text/javascript">window.location = "all_appointments.php"</script>';
            }
        }
    }

    function noAccessForAdmin()
    {
        if (isset($_SESSION['user-type'])) {
            if ($_SESSION['user-type'] == 'admin') {
                echo '<script type="text/javascript">window.location = "admin_home.php"</script>';
            }
        }
    }

    function noAccessIfLoggedIn()
    {
        if (isset($_SESSION['user-type'])) {
            noAccessForNormal();
            noAccessForAdmin();
            noAccessForClerk();
            noAccessForDoctor();
        }
    }

    function noAccessIfNotLoggedIn()
    {
        if (!isset($_SESSION['user-type'])) {
            echo '<script type="text/javascript">window.location = "index.php"</script>';
        }
    }

    function is_session_started()
    {
        if ( php_sapi_name() !== 'cli' ) {
            if ( version_compare(phpversion(), '5.4.0', '>=') ) {
                return session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
            } else {
                return session_id() === '' ? FALSE : TRUE;
            }
        }
        return FALSE;
    }

?>
