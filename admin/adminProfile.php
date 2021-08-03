<?php
include('includes/admin_auth.php');
include('includes/config.php');
include('includes/dashboard_header.php');
include('includes/dashboard_sidenav.php');
?>

<!-- Page Container START -->
<div class="page-container">


    <!-- Content Wrapper START -->
    <div class="main-content">
        <div class="page-header no-gutters has-tab">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#tab-account">Edit Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#change-password">Change Password</a>
                </li>
            </ul>
        </div>
        <div class="container">
            <div class="tab-content m-t-15">
                <div class="tab-pane fade show active" id="tab-account">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Basic Infomation</h4>
                        </div>
                        <div class="card-body">
                            <?php
                            $sql = "SELECT * FROM admin";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                            ?><form id="editAdminProfile">
                                        <div class="media align-items-center">
                                            <div class="avatar avatar-image  m-h-10 m-r-15" style="height: 80px; width: 80px">
                                                <img src="assets/images/avatars/<?php echo $row['img_name']; ?>" alt="">
                                            </div>
                                            <div class="m-l-20 m-r-20">
                                                <h5 class="m-b-5 font-size-18">Change Avatar</h5>
                                                <p class="opacity-07 font-size-13 m-b-0">
                                                    Recommended Dimensions: <br>
                                                    120x120 Max fil size: 2MB
                                                </p>
                                            </div>
                                            <div>
                                                <button class="btn btn-tone btn-primary">Upload</button>
                                            </div>
                                            <div class="m-l-60">
                                                <div class="form-group col-md-12">
                                                    <label class="font-weight-semibold" for="userName">Name:</label>
                                                    <input type="text" class="form-control" id="userName" placeholder="User Name" value="<?php echo $row['name']; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="m-v-25">

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label class="font-weight-semibold" for="userName">UserName:</label>
                                                <input type="text" class="form-control" id="userName" placeholder="User Name" value="<?php echo $row['username']; ?>">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="font-weight-semibold" for="email">Email:</label>
                                                <input type="email" class="form-control" id="email" placeholder="email" value="<?php echo $row['email']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label class="font-weight-semibold" for="phoneNumber">Phone Number:</label>
                                                <input type="text" class="form-control" id="phoneNumber" placeholder="Phone Number" value="<?php echo $row['phone']; ?>" maxlength="10">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="font-weight-semibold" for="dob">Date of Birth:</label>
                                                <input type="date" class="form-control" id="dob" placeholder="Date of Birth" value="<?php echo $row['dob']; ?>">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" name="updateData" id="updateFormData" class="btn btn-sm btn-tone btn-secondary">Update changes</button>
                                        </div>
                                    </form>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="change-password">
                    <div class="row">
                        <div class="col-md-12 mx-auto">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Change Password</h4>
                                </div>
                                <div class="card-body">
                                    <form id="changeAdminPassword">
                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <label class="font-weight-semibold" for="oldPassword">Old Password:</label>
                                                <input type="password" class="form-control" id="oldPassword" placeholder="Old Password">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="font-weight-semibold" for="newPassword">New Password:</label>
                                                <input type="password" class="form-control" id="newPassword" placeholder="New Password">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="font-weight-semibold" for="confirmPassword">Confirm Password:</label>
                                                <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm Password">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <button type="submit" class="btn btn-primary m-t-30">Change</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content Wrapper END -->

</div>
<!-- Page Container END -->

<?php include('includes/dashboard_search.php'); ?>

<?php
include('includes/dashboard_footer.php');
?>