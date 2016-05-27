# wordpress-update-user-notifications
Receive email notifications when one of your Wordpress users (non-admins) updates their profile info, or resets/updates their password.

Change line 41 to your email address. 
Switch around the variables in the message if you need to.
Place this in your functions.php file.

This excludes admins in the notifications.

You may have to change the options in the message variable based on whatever your existing fields are that you want to capture.

**This is not DRY yet, still working on that. When I created this it was quick and dirty.**
