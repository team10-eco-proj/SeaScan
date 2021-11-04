<?php

// include './google-init.php';
// include './User.class.php';

// check user role and decide if to display modal
$currentUserData = $_SESSION['userData'];
$selectedRole = $currentUserData['user_role'];
$queryRun = false;


if(isset($_POST['gen_user_button'])) {
    $updateRoleQuery = "UPDATE users SET user_role = '1' WHERE oauth_provider = '".$currentUserData['oauth_provider']."' AND oauth_uid = '".$currentUserData['oauth_uid']."'";
    $conn->query($updateRoleQuery);
    $queryRun = true;
}
if(isset($_POST['fisher_button'])) {
    $updateRoleQuery = "UPDATE users SET user_role = '2' WHERE oauth_provider = '".$currentUserData['oauth_provider']."' AND oauth_uid = '".$currentUserData['oauth_uid']."'";
    $conn->query($updateRoleQuery);
    $queryRun = true;
}
if(isset($_POST['scientist_button'])) {
    $updateRoleQuery = "UPDATE users SET user_role = '3' WHERE oauth_provider = '".$currentUserData['oauth_provider']."' AND oauth_uid = '".$currentUserData['oauth_uid']."'";
    $conn->query($updateRoleQuery);
    $queryRun = true;
}

?>

<script>
document.addEventListener("DOMContentLoaded", function() {
    var myModal = new bootstrap.Modal(document.getElementById("myModal"));

    if ('<?=$queryRun?>' == true) myModal.hide();
    else if ('<?=$selectedRole?>' == '-1') myModal.show();
});
</script>
<!-- Modal HTML -->
<div id="myModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Please Select a Role</h5>
                <button type="button" class="btn-close" data-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Welcome, <?=$currentUserData['first_name']?>! Please select a role.</p>
                <p class="text-secondary">I will be using SeaScan as a...</p>
            </div>
            <div class="modal-footer">
            <form method="post">
                <input type="submit" name="gen_user_button" class="btn btn-secondary" value="General User" />
                <input type="button" name="fisher_button" class="btn btn-primary" value="Fisher" />
                <input type="button" name="scientist_button" class="btn btn-primary" value="Scientist/Researcher" />
            </form>
            </div>
        </div>
    </div>
</div>