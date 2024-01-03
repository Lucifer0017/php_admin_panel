<?php include('includes/header.php') ?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    Add User
                    <a href="users.php" class="btn btn-danger float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">

            <?=  alertMessage() ?>
                <form method="POST" action="code.php">
                    <div class="row">
                    <div class="col-md-6">                  
                        <div class="mb-3">
                            <label for="Name">Name</label>
                            <input type="text" name="name" id="Name" class="form-control">
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="Phone">Phone No.</label>
                            <input type="text" name="phone" id="Phone" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="Email">Email</label>
                            <input type="email" name="email" id="Email" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="Password">Password</label>
                            <input type="password" name="password" id="Password" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="Role">Select Role</label>
                            <select name="role" class="form-select" id="Role">
                                <option value="">Select Role</option>
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="Isban">Is Ban</label>
                            </br>
                            <input type="checkbox" name="is_ban" id="Is_ban" style="width:30px;height:30px">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3 text-end">
                            <br/>
                            <button type="submit" name="saveuser" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php') ?>