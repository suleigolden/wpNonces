<h1>Wp-Nonce-OOP</h1>
<h4>A compose Package that serves the WordPress Nonces functionality (wp_nonce_*()) in an object orientated environment.</h4>
 <hr>
<h1>Requirements</h1>
<li>Composer</li>
<li>PHP >= 5.3.0</li>
<li>WordPress 4.8.3+</li>

<hr>

<h1>Installation</h1>
<h4>You can install this Package by Downloading the zip file (Option 1) or clone it from your command-line (Option 2) </h4>

<h4>Option 1</h4>
1. Download the  zip file (https://github.com/suleigolden/wpNonces/archive/master.zip) of this repo.
2. Unzip the master.zip file to into any of your root directory.
3. Continue with your project.

<h4>Option 2</h4>
<li>Open command-line</li>
<li>Navigate to any root directory that you want to clone the project to</li>
<li>Run this command (git clone https://github.com/suleigolden/wpNonces.git)</li>

<hr>



<h1>Usage</h1>
<h4>Open the tests/test.php file</h4>
<div style="background-color: #CCC;">
  <h3>Create an object of the WpNonces class</h3>
   <p style="background-color: #CCC; padding: 4px;">
        $nonce = new WpNonce();
   </p>
   <h3>To Creating a Nonce</h3>
   <p style="background-color: #CCC; padding: 4px;">
        $newnonce = $nonce_Action->wp_create_nonce( 'action_'.$post->id );
   </p>
   <h3>To verify a nonce</h3>
   <p style="background-color: #CCC; padding: 4px;">
        $nonce_Action->wp_verify_nonce_field( 'delete-student_'.$post_id );
   </p>
   <h3>To Verify a nonce passed in some other context</h3>
   <p style="background-color: #CCC; padding: 4px;">
        $complete_url->wp_check_admin_referer( $_REQUEST['my_nonce'], 'update-student_'.$post->ID );
   </p>
   <h3>To Add a nonce to a URL</h3>
   <p style="background-color: #CCC; padding: 4px;">
       $url="admin/update-student.php?post=7";
	   $complete_url = $nonce_Action->get_wp_nonce_url( $url, 'update-student_'.$post->ID );
   </p>

</div>



