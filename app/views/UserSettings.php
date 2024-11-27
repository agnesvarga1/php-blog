<?php
$title = "User Deatials Setting";
include '../app/views/partials/head.php';  
include '../app/views/partials/navbar.php';
?>
<div class="container">
<h1 class="py-3">User settings Option</h1>
<ul class="list-group">
  <li class="list-group-item list-group-item-action list-group-item-primary fs-3 d-flex justify-content-between">Change your user name
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#usernamemodal">
  Here
</button>
  </li>
  <li class="list-group-item list-group-item-action list-group-item-light fs-3 d-flex justify-content-between">Change your password <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pwmodal">
  Here
</button></li>
</ul>
<!-- Modal for change username-->
<div class="modal fade" id="usernamemodal" tabindex="-1" aria-labelledby="usernamemodalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="usernamemodalLabel">Change Username</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="http://localhost:8888/php-blog/public/usersettings" method="POST">
      <div class="modal-body">
      <div class="mb-3">
    <label for="curr-username" class="form-label">Current username</label>
    <input type="text" class="form-control" id="curr-username" name="curr_username" aria-describedby="currUsername" required max="50">
    <label for="new-username" class="form-label"> New username</label>
    <input type="text" class="form-control" id="new-username" name="new_username" aria-describedby="newUsername" required max="50">
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal for change password-->
<div class="modal fade" id="pwmodal" tabindex="-1" aria-labelledby="pwmodalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="pwmodalLabel">Change password</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="http://localhost:8888/php-blog/public/usersettings" method="POST">
      <div class="modal-body">
      <div class="mb-3">
   
      <label for="curr_pwd" class="form-label">Current Password</label>
      <input type="password" class="form-control" id="curr_pwd" name="curr_pwd" >
      </div>
      <div class="mb-3">
      <label for="new_pwd" class="form-label">New Password</label>
      <input type="password" class="form-control" id="new_pwd" name="new_pwd" min="8" max="20">
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
    </form>
  </div>
</div>

</div>

<?php 
include '../app/views/partials/footer.php';  
?>