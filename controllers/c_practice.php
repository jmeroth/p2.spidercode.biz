<?php
class practice_controller extends base_controller {

    public function __construct() {
        parent::__construct();
        echo "practice_controller construct called<br><br>";
    } 

	public function practice() {
        /*
		# Our SQL command
		$q = "UPDATE users
    	SET email = 'samseaborn@whitehouse.gov'
    	WHERE email = 'seaborn@whitehouse.gov'";

		# Run the command
		echo DB::instance(DB_NAME)->query($q);
		*/

		$data = Array(
    		'first_name' => 'Tony',
    		'last_name' => 'Stark',
    		'email' => 'ironman@whitehouse.gov');

		/*
		Insert requires 2 params
		1) The table to insert to
		2) An array of data to enter where key = field name and value = field data

		The insert method returns the id of the row that was created
		*/
		$user_id = DB::instance(DB_NAME)->insert('users', $data);

		echo 'Inserted a new row; resulting id:'.$user_id;

		# This line uses the new view I created -jfm
		$this->template->content = View::instance('v_practice_practice');

		# Pass information to the view fragment
    	$this->template->content->user_id = $user_id;

		# Render the view
			echo $this->template;
    }

    public function index() {
        echo "This is the index page";
    }

    public function signup() {
        echo "This is the signup page";
    }

    public function login() {
        echo "This is the login page";
    }

    public function logout() {
        echo "This is the logout page";
    }

    public function profile($user_name = NULL) {

		/*
 		 If you look at _v_template you'll see it prints a $content variable in the <body>
 		 Knowing that, let's pass our v_users_profile.php view fragment to $content so 
		 it's printed in the <body>
		*/
		$this->template->content = View::instance('v_users_profile');

    	/* $title is another variable used in _v_template to set the <title> of the page */
		$this->template->title = "Profile";

    	# Create an array of 1 or many client files to be included in the head
    	$client_files_head = Array(
        		'/css/widgets.css',
        		'/css/profile.css'
        	);

		# Use load_client_files to generate the links from the above array
    	$this->template->client_files_head = Utils::load_client_files($client_files_head);

		# Create an array of 1 or many client files to be included before the closing </body> tag
		$client_files_body = Array(
        	'/js/widgets.min.js',
        	'/js/profile.min.js'
        	);

		# Use load_client_files to generate the links from the above array
    	$this->template->client_files_body = Utils::load_client_files($client_files_body); 

		# Pass information to the view fragment
    	$this->template->content->user_name = $user_name;

    	# Pass information to the view instance
    	$this->user_name = $user_name;

    	# Render View
    	echo $this->template;
    }

} # end of the class
