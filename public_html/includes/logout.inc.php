<?php
// Start the session so we can destroy it
session_start();
// Unset session variables
session_unset();
// Destroy session
session_destroy();
// Return to home page
header("location: ../index.php?status=loggedout");