<?php
/**** Christine Coomans ****/
/**** https://github.com/christinec-dev *******/
?>

<!--When the user clicks the logout button --->
<?php
session_start();
    // it will unset the session variable.
    unset($_SESSION['IS_LOGIN']);
    session_destroy();
    //clears cookies
    setcookie("username","");
    setcookie("password","");
    echo "Cookies Not Set";
?>
<!-- When logged out it will reload the user to the main page where they can log in--->
<script>
window.location.href='index.php';
</script>