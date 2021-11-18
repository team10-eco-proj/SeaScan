<?php

// include './google-init.php';
// include './User.class.php';

// check user role and decide if to display modal

$currentUserData = $_SESSION['userData'];
$selectedRole = $currentUserData['user_role'];
$queryRun = false;

$userPrimaryKeyQuery = "SELECT id FROM users WHERE oauth_provider = '".$currentUserData['oauth_provider']."' AND oauth_uid = '".$currentUserData['oauth_uid']."'"; 
$userPrimaryKeyResult = $conn->query($userPrimaryKeyQuery); 
$userPrimaryKey = $userPrimaryKeyResult->fetch_assoc();

if(isset($_POST['gen_user_button'])) {
    $updateRoleQuery = "UPDATE assoc_user_role SET role_fk = 1 WHERE user_fk = '".intval($userPrimaryKey['id'])."'";
    $_SESSION['userData']['user_role'] = '1';
    $conn->query($updateRoleQuery);
    $queryRun = true;
}
if(isset($_POST['fisher_button'])) {
    $updateRoleQuery = "UPDATE assoc_user_role SET role_fk = 2 WHERE user_fk = '".intval($userPrimaryKey['id'])."'";
    $_SESSION['userData']['user_role'] = '2';
    $conn->query($updateRoleQuery);
    $queryRun = true;
}
if(isset($_POST['scientist_button'])) {
    $updateRoleQuery = "UPDATE assoc_user_role SET role_fk = 3 WHERE user_fk = '".intval($userPrimaryKey['id'])."'";
    $_SESSION['userData']['user_role'] = '3';
    $conn->query($updateRoleQuery);
    $queryRun = true;
}

?>

<script>
document.addEventListener("DOMContentLoaded", function() {
    var myModal = new bootstrap.Modal(document.getElementById("myModal"), {
        backdrop: 'static',
        keyboard: false
    });

    if ('<?=$selectedRole?>' != '-1' || '<?=$queryRun?>' == true) myModal.hide();
    else if ('<?=$selectedRole?>' == '-1') myModal.show();
});
</script>
<!-- Modal HTML -->
<div id="myModal" class="modal fade" data-keyboard="false" data-backdrop="static" role="dialog" tabindex="-1" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Please Select a Role</h5>
            </div>
            <div class="modal-body">
                <p>Welcome, <?=$currentUserData['first_name']?>! Please select a role.</p>
                <p class="text-secondary">I will be using SeaScan as a...</p>
            </div>
            <div class="modal-footer">
            <form method="post">
                <input type="submit" name="gen_user_button" class="btn btn-secondary" value="General User" />
            </form>
            <form method="post">
                <input type="submit" name="fisher_button" class="btn btn-primary" value="Fisher" />
            </form>
            <form method="post">
                <input type="submit" name="scientist_button" class="btn btn-primary" value="Researcher/Scientist" />
            </form>
            </div>
        </div>
    </div>
</div>