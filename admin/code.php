<?php
 require "../config/function.php";

//  Save users
if(isset($_POST['saveuser'])){
    // validate function is declared inside function.php
    $name = validate($_POST['name']);
    $phone = validate($_POST['phone']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $is_ban = validate($_POST['is_ban']) == true ? 1 : 0;
    $role = validate($_POST['role']);

    if(!empty($name) || !empty($email) || !empty($phone) || !empty($password)){
        $query = "INSERT INTO users (name ,phone, email , password, is_ban, role ) VALUES ('$name', '$phone', '$email', '$password', '$is_ban',  '$role' )";
        $result = mysqli_query($conn, $query);

        if($result){
            // Redirect function is declared inside function.php
            redirect('users.php', 'User/Admin Added Succesfully');
        }
        else{
            redirect('users-create.php', 'Something Went Wrong');
        }
    }

    else{
            redirect('user-create.php','please fill all the input fields');
    }
}

// Update code
if(isset($_POST['updateuser']))
{
    
    $name = validate($_POST['name']);
    $phone = validate($_POST['phone']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $is_ban = validate($_POST['is_ban']) == true ? 1 : 0;
    $role = validate($_POST['role']);

    $userId = validate(($_POST['userId']));
    $user = getById('users', $userId);
    if($user['status'] != 200){
        redirect('users-edit.php?id='.$userId,'No such id found');
    }

    if(!empty($name) || !empty($email) || !empty($phone) || !empty($password)){

        
        
        $query = array(
            'name' =>  $name,
            'phone' => $phone,
            'email' => $email,
            'password' => $password,
            'is_ban' => $is_ban,
            'role' => $role
        );
        $condition = "id = '$userId'";
        $result = update_data('users', $query, $condition);
        

        // $query = "UPDATE users SET name = '$name' ,phone = '$phone', email = '$email' , password = '$password', is_ban = '$is_ban', role = '$role' WHERE id = '$userId'";

        // $result = mysqli_query($conn, $query);


        if($result){
            // Redirect function is declared inside function.php
            redirect('users.php', 'User/Admin Updated Succesfully');
        }
        else{
            redirect('users-create.php', 'Something Went Wrong');
        }
    }   
    else{
            redirect('user-create.php','please fill all the input fields');

        }
}   
?>