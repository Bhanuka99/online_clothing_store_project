<?php
include '../commons/session.php';
if (!isset($_GET["status"])) {
    ?>
    <script>
        window.location = "../view/login.php";
    </script>
    <?php
}

$status = $_GET["status"];

include '../model/user_model.php';
include '../model/login_model.php';
$userObj = new Roles();
$loginObj = new Login();

switch ($status) {
    case "load_functions":
        $role_id = $_POST["role"];
        $moduleResult = $userObj->getRoleModule($role_id);

        while ($module_row = $moduleResult->fetch_assoc()) {
            $module_id = $module_row["module_id"];
            $functionResults = $userObj->getModuleFunctions($module_id);
            ?>
            <div class="col-md-4">
                <h4>
                    <?php
                    echo $module_row["module_name"];
                    echo "<br/>";
                    ?>
                </h4>
                <?php
                while ($function_row = $functionResults->fetch_assoc()) {
                    ?>
                    <input type="checkbox" name="fun[]" value="<?php echo $function_row["function_id"] ?>" checked>
                    <?php
                    echo $function_row["function_name"];
                    ?>
                    <br>
                    <?php
                }
                ?>
            </div>
            <?php
        }

        break;

    case "add_user":

        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $email = $_POST["email"];
        $dob = $_POST["dob"];
        $nic = $_POST["nic"];
        $cno1 = $_POST["cno1"];
        $cno2 = $_POST["cno2"];
        $user_role = $_POST["user_role"];

        $user_image = $_FILES["user_image"];
        $user_functions = $_POST["fun"];

        try {
            if ($fname == "") {
                throw new Exception("First Name cannot be Empty!!!!!!");
            }

            //upload image

            $file_name = "";
            if (isset($_FILES["user_image"])) {
                if ($user_image["name"] != "") {
                    $file_name = time() . " " . $user_image["name"];
                    $path = "../images/user_images/$file_name";
                    move_uploaded_file($user_image["tmp_name"], $path);
                }
            }
            $user_id = $userObj->addUser($fname, $lname, $dob, $nic, $user_role, $file_name, $email);

            //creating login account
            if ($user_id) {
                $loginObj->addUserLogin($user_id, $email, $nic);
                //add user functions
                foreach ($user_functions as $fun_id) {
                    $userObj->addUserFunctions($user_id, $fun_id);
                }
                $msg = "User $fname $lname Successfully Added!!";
                $msg = base64_encode($msg);
                ?>
                <script>
                    window.location = "../view/view-users.php?msg=<?php echo $msg; ?>";
                </script>
                <?php
            }
        } catch (Exception $ex) {

            $msg = $ex->getMessage();
            $msg = base64_encode($msg);
            ?>
            <script>
                window.location = "../view/add-user.php?msg=<?php echo $msg; ?>"
            </script>
            <?php
        }

        break;

    case "activate":

        $user_id = $_GET["user_id"];
        $user_id = base64_decode($user_id);

        $userObj->activateUser($user_id);
        $msg = "User Activate Successfully!!";
        $msg = base64_encode($msg);
        ?>
        <script>
            window.location = "../view/view-users.php?msg=<?php echo $msg; ?>";
        </script>
        <?php
        break;

    case "deactivate":

        $user_id = $_GET["user_id"];
        $user_id = base64_decode($user_id);

        $userObj->deactivateUser($user_id);
        $msg = "User De-activate Successfully!!";
        $msg = base64_encode($msg);
        ?>
        <script>
            window.location = "../view/view-users.php?msg=<?php echo $msg; ?>";
        </script>
        <?php
        break;
    case "delete":

        $user_id = $_GET["user_id"];
        $user_id = base64_decode($user_id);

        $userObj->deleteUser($user_id);
        $msg = "User Deleted Successfully!!";
        $msg = base64_encode($msg);
        ?>
        <script>
            window.location = "../view/view-users.php?msg=<?php echo $msg; ?>";
        </script>
        <?php
        break;

}