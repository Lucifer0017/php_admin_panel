<?php

    require "../config/function.php";
    $paraResult = checkParamId('id');
    if(is_numeric($paraResult)){
        $userId = validate($paraResult);

        $user = getById('users', $userId);

        if($user['status'] == 200){
            $condition = "id = '$userId'";
            $userDeleteRes = delete_data('users', $condition);
            if($userDeleteRes){
                redirect('users.php', 'User Deleted Successfully');

            }
            else{
                redirect('users.php', 'Something Went Wrong');
            }
        }
        else
        {
             redirect('users.php', $user['message']);
        }
    }
    else{
        redirect('users.php', $paraResult);
    }

?>