<h1> Pihype </h1>
A PHP Framework for faster and controlled development.
Developed by Xchrisphp

@Version 1.0
************

@Features
*********

1. MVC design pattern
	
	1. Controller 
	2. Model
	3. Views
	(Pratically built the way MVC should work)

2. Multiple database system
	
	#Can use
	 1. Mysqli
	 2. Mysql
	 3. Mongodb
	 4. Sqlite
	and more..

3. Dynamic file inclusion and routing
	// example
	-> You want to get images from the public/images directory
		
		 local::img("image.png")
		  
		  # This will get the image and create the < img > tag
		  # Can take upto 2 parameters, 1 => image name 2 => attributes eg class="name" etc.

	-> You want to load a css file from public/css
		
		local::css("main", attributes (optional))
		
		# Will create the link tag and include the main.css if found
		# Can take upto 2 parameters also

	-> You want to load a javascript file from public/javascript
		
		local::js("jquery", attributes(optional) )
		
		# Will create the script tag and include the js file if found

	-> You want to route to another view within a controller 
		
		local::linkTo("nextpage", "click me")
		
		# lets assume current controller is < home >
		
		# Will generate <a href="home/nextpage"> click me </a>
		# Or you want to include some attributes
		
		local::linkTo("nextpage", 'class="btn"', "click me")
		
		#will generate <a href="home/nextpage" class="btn"> click me </a>
		# You can jump out of a controller like this
		 local::linkTo("contact/form", "contact us")

4. Views created dynamically and properly routed
	// example
	-> You create a controller named < home > eg

		class Home extends AppController
		{
			// and you create a view called about
			public function about()
			{
				// no need to call a view here eg
				// (not required) $this->view("about") or $this->view("home/about")
				// created dynamically
				// just check the app/views folder.
				// now lets assume you want to route to another view if a condition is met
				$id = 1;
				if($id == 1)
				{
					$this->routeTo("home/contact");
					// very easy and dynamic
				}
			}
		}

5. Models can generate data when a form is submited
	// example
	-> You need to create a contact form
	-> in the app/views/home/contact.php we have this

		<-- @contact is a model class -->
		<form action="@contact" method="post">
			<input type="text" name='fullname' placeholder="Your fullname">
			<!-- we can create a button and the name attribute would be the method in @contact model class for processing this form -->
			<button name="process" type="submit"> Submit </button>
		</form>

	-> in the app/model/contact.php

		class Contact extends AppModel
		{
			public function process()
			{
				// we can call a database function easily 
				// or get the post easily and filtered
				$post = post::all(); 
				// helper class or plugin created by xchriscode
				// the we now have access to post
				$fullname = $post->fullname;
				// equivalent to $_ POST['fullname'];
				// now we can perform database operation here
				// example
				$check = db::check("SELECT * FROM users WHERE fullname = '$fullname'");
				// then we can return result to home/contact controller
				return $check;
			}
		}

	-> in the app/controller/home_controller.php 

		class Home extends AppController
		{
			public function contact()
			{
				// we can get the return data by doing
				$valid_user = $this->model("@contact");
				// that's all, the return data will be passed tp $valid_user variable

				// so we can do our checking and routing here
				if($valid_user->num_rows > 0)
				{
					echo "Thank you!";
					// You understand right?? 
					// very dynamic 
					// and you can route to your success page
					$this->linkTo("home/success?msg=Thank you for your message");
					// or
					$this->linkTo("success?msg=Thank you for contact us");

				}
			}
		}
		

	That's for the first release, more to come.
	Will share a video demo and will build a full functional web app with this framework.
	Thank you for using this framework, contributions are allowed please.
	<br>

	You can find me on 
	1. Instagram -> @xchriscode
	2. Twitter -> @xchriscode
	3. Facebook -> #xchriscode

	I am from Nigeria, developed this framework to support the PHP Community and to encourage dynamic/responsive use of the PHP language. 
	<br>
	Framework can be used by companies, Freelancers etc.

	# For your 
		1. PHP
		2. Python
		3. Ruby on Rails
		4. JS 
		5. Ionic/Angular
		
		# Projects, you can contact me or leave me an email
		# email -> chrisallison.prog@yahoo.com
		# phone -> +2348183789446
		# FB profile -> https://web.facebook.com/chrisallison.prog 


