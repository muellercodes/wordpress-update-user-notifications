<?php


//********************************************
//** Admin Email Alerts for WordPress
/*
 *
 * First, we must retrieve the 'old' values from the database
 */
function get_values() {

    global $current_user, $jwl_old_metadata;  // Set global variables
    wp_get_current_user();  // Just as the name suggests
    //$jwl_old_metadata = $current_user;  // Set a variable equal to current user info
    $jwl_old_user = get_userdata( $current_user->ID );
    $jwl_old_metadata = get_user_meta( $current_user->ID );
    global $jwl_old_metadata;  // Define global variable to be used in function notify_admin_on_update()
    global $jwl_old_user;

}
add_action('init','get_values');  // Add to init so we know our values are process BEFORE 'update_profile' hook


// User profile update - send an email to customer service when user updates their profiie
function user_profile_update( $user_id ) {

    global $current_user, $jwl_old_metadata; $jwl_old_user;  // Set global variables
    wp_get_current_user();  // Just as the name suggests

        //print_r($jwl_old_metadata);

        $update_type = $_POST['submit'] . $_POST['Submit'];


        $site_url = get_bloginfo('wpurl');
        $user_info = get_userdata( $user_id );
        $all_meta_for_user = get_user_meta( $user_id );


        //UPDATE THIS TO NEW A EMAIL
        $to = 'amueller@rcbrayshaw.com';

        $subject = "". $_POST['submit'] . $_POST['Submit'] . ": ".$site_url."";
        $message = "" .$user_info->display_name . "'s profile has been updated!\n";

        $message .= "\nUpdate Type: " . $_POST['submit'] . $_POST['Submit'] . "\n";



        if ($update_type != "Reset Password") {

          $message .= "\nChanges:\n";
           if ($jwl_old_metadata[first_name][0] != $all_meta_for_user[first_name][0]) { $firstnamediff = "*" . $all_meta_for_user[first_name][0] . "*";};
           if ($jwl_old_metadata[last_name][0] != $all_meta_for_user[last_name][0]) { $lastnamediff = "*" . $all_meta_for_user[last_name][0] . "*";};
           if ($jwl_old_metadata[email][0] != $all_meta_for_user[email][0]) { $emaildiff = "*" . $all_meta_for_user[email][0] . "*";};
           if ($jwl_old_metadata[company][0] != $all_meta_for_user[company][0]) { $companydiff = "*" . $all_meta_for_user[company][0] . "*";};
           if ($jwl_old_metadata[title][0] != $all_meta_for_user[title][0]) { $titlediff = "*" . $all_meta_for_user[title][0] . "*";};
           if ($jwl_old_metadata[addr1][0] != $all_meta_for_user[addr1][0]) { $addr1diff = "*" . $all_meta_for_user[addr1][0] . "*";};
           if ($jwl_old_metadata[addr2][0] != $all_meta_for_user[addr2][0]) { $addr2diff = "*" . $all_meta_for_user[addr2][0] . "*";};
           if ($jwl_old_metadata[city][0] != $all_meta_for_user[city][0]) { $citydiff = "*" . $all_meta_for_user[city][0] . "*";};
           if ($jwl_old_metadata[thestate][0] != $all_meta_for_user[thestate][0]) { $thestatediff = "*" . $all_meta_for_user[thestate][0] . "*";};
           if ($jwl_old_metadata[zip][0] != $all_meta_for_user[zip][0]) { $zipdiff = "*" . $all_meta_for_user[zip][0] . "*";};
           if ($jwl_old_metadata[country][0] != $all_meta_for_user[country][0]) { $countrydiff = "*" . $all_meta_for_user[country][0] . "*";};
           if ($jwl_old_metadata[phone1][0] != $all_meta_for_user[phone1][0]) { $phone1diff = "*" . $all_meta_for_user[phone1][0] . "*";};

          $message .= "First Name: ".$firstnamediff ."\n";
          $message .= "Last Name: ".$lastnamediff ."\n";
          $message .= "Email: ".$emaildiff ."\n";
          $message .= "Company: ".$companydiff ."\n";
          $message .= "Title: ".$titlediff ."\n";
          $message .= "Address1: ".$addr1diff ."\n";
          $message .= "Address2: ".$addr2diff ."\n";
          $message .= "City: ".$citydiff ."\n";
          $message .= "State: ".$thestatediff ."\n";
          $message .= "Zip: ".$zipdiff ."\n";
          $message .= "Country: ".$countrydiff ."\n";
          $message .= "Phone: ".$phone1diff ."\n";

          $message .= "\nOld User Info:\n";
          $message .= "First Name: ".$jwl_old_metadata[first_name][0] ."\n";
          $message .= "Last Name: ".$jwl_old_metadata[last_name][0] ."\n";
          $message .= "Email: ".$jwl_old_metadata[email][0] ."\n";
          $message .= "Company: ".$jwl_old_metadata[company][0] ."\n";
          $message .= "Title: ".$jwl_old_metadata[title][0] ."\n";
          $message .= "Address1: ".$jwl_old_metadata[addr1][0] ."\n";
          $message .= "Address2: ".$jwl_old_metadata[addr2][0] ."\n";
          $message .= "City: ".$jwl_old_metadata[city][0] ."\n";
          $message .= "State: ".$jwl_old_metadata[thestate][0] ."\n";
          $message .= "Zip: ".$jwl_old_metadata[zip][0] ."\n";
          $message .= "Country: ".$jwl_old_metadata[country][0] ."\n";
          $message .= "Phone: ".$jwl_old_metadata[phone1][0] ."\n";

          $message .= "\nNew User Info:\n";
          $message .= "First Name: ".$all_meta_for_user[first_name][0] ."\n";
          $message .= "Last Name: ".$all_meta_for_user[last_name][0] ."\n";
          $message .= "Email: ".$all_meta_for_user[email][0] ."\n";
          $message .= "Company: ".$all_meta_for_user[company][0] ."\n";
          $message .= "Title: ".$all_meta_for_user[title][0] ."\n";
          $message .= "Address1: ".$all_meta_for_user[addr1][0] ."\n";
          $message .= "Address2: ".$all_meta_for_user[addr2][0] ."\n";
          $message .= "City: ".$all_meta_for_user[city][0] ."\n";
          $message .= "State: ".$all_meta_for_user[thestate][0] ."\n";
          $message .= "Zip: ".$all_meta_for_user[zip][0] ."\n";
          $message .= "Country: ".$all_meta_for_user[country][0] ."\n";
          $message .= "Phone: ".$all_meta_for_user[phone1][0] ."\n";


          $message .= "\n\n\n\nBelow is the raw data for the old and new info and the post variable that was submitted.\n\n";


          $message .= "\nOld Data:\n";
          foreach ($jwl_old_metadata as $key => $val) {
            foreach ($val as $key2 => $val2) {
              $message .= "$key => $key2 = $val2\n";
            }
          }
          $message .= "\nNew Data:\n";
          foreach ($all_meta_for_user as $key => $val) {
            foreach ($val as $key2 => $val2) {
              $message .= "$key => $key2 = $val2\n";
            }
          }


          $message .= "\nPost Variable:\n";
          foreach ($_POST as $key => $val) {
              $message .= "$key = $val\n";
          }

        }

    // if ( ! isset( $_POST['pass1'] ) || '' == $_POST['pass1'] ) {
    //     $message = "" .$user_info->display_name . "'s profile has been updated!\n";
    //     $message .= "User has updated their password.";
    // }


if ( current_user_can( 'manage_options' ) ) {
    /* A user with admin privileges */
} else {
    /* A user without admin privileges */
        wp_mail( $to, $subject, $message);
            return;
}



