<?php include('includes/header.php'); ?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    Edit User
                    <a href="users.php" class="btn btn-danger float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="code.php" method="POST">
                    <!-- Declared in function.php -->
                    <?php
                    $paramResult = checkParamId('id');
                    if (!is_numeric($paramResult)) {
                        echo '<h5>' . $paramResult . '</h5>';
                        echo '<h5>False Id</h5>';
                        return false;
                    }

                    $user = getById('users', checkParamId('id'));


                    if ($user['status'] == 200) {
                    ?>

                        <input type="hidden" name="userId" value="<?= $user['data']['id'] ?>" required>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="Name">Name</label>
                                    <input type="text" name="name" value="<?= $user['data']['name'] ?>" id="Name" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="Phone">Phone No.</label>
                                    <input type="text" name="phone" value="<?= $user['data']['phone'] ?>" id="Phone" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="Email">Email</label>
                                    <input type="email" name="email" value="<?= $user['data']['email'] ?>" id="Email" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="Password">Password</label>
                                    <input type="password" name="password" id="Password" value="<?= $user['data']['password'] ?>" class="form-control" required>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="Role">Select Role</label>
                                    <select name="role" class="form-select" id="Role" required>
                                        <option value="">Select Role</option>
                                        <option value="admin" <?= $user['data']['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
                                        <option value="user" <?= $user['data']['role'] == 'user' ? 'selected' : '' ?>>User</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="Role1">Is Ban</label>
                                    </br>
                                    <input type="checkbox" name="is_ban" <?= $user['data']['is_ban'] == true ? 'checked' : '' ?> id="Role1" style="width:30px;height:30px">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3 text-end">
                                    <br />
                                    <button type="submit" name="updateuser" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </div>
                    <?php

                    } else {
                        echo '<h5>' . $user['message'] . '</h5>';
                    }

                    ?>

                </form>
            </div>

            <?php include('includes/footer.php') ?>