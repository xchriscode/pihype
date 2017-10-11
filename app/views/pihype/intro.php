<!DOCTYPE html>
<html>
<head>
	<title>Pihype</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Arimo" rel="stylesheet">  
</head>
<body>
<style type="text/css">
	html,body{margin: 0; padding: 0; width: 100%; height: 100%; font-family: 'Arimo', sans-serif;}
	.header{background: #fff200; max-width: 100%; height: 50px; padding: 10px;box-shadow: 0px 0px 10px #eee;border-bottom: 1px solid #fff; position: relative; z-index: 88;}
	.header .logo{}
	.header .logo img{width: 170px;margin-top: -9px;}
	.sidebar{width: 200px;float: left;}
	.sidebar ul{padding: 20px; background: #fcfcfc; border: 1px solid #eee; margin: auto; width: 100%;
		list-style: none; margin-left: -20px; margin-top: -10px; box-shadow: 0px 0px 4px #eee;}
	.content{width: 75%; float: left; margin-left: 4%; background: #fff; border: 1px solid #eee; margin-top: 10px;
		padding: 20px; box-shadow: 0px 0px 4px #eee;}
	.content p{line-height: 31px;}
	.sidebar ul li{width: 100%; padding: 10px; margin-bottom: 6px; border-bottom: 1px solid #fff200;
		box-shadow: 0px 0px 4px #eee; transition: all 0.4s ease;}
	.sidebar ul li a{color: #000; text-decoration: none; font-size: 17px;}
	.sidebar ul li:hover{background: #fff200; cursor: pointer;}
	.sidebar ul li:hover a{color: #000;}
	.active{background: #fff200;}
	.tab-hide{display: none;}
	.tab-show{display: block; transition: all 0.4s ease-in-out;}
	.tab-show h1{font-size: 30px; color: #000; font-weight: normal; margin: 0; padding-bottom: 0px;
		border-bottom: 0px solid #fff200; margin-bottom: 20px; text-transform: capitalize;
		border-left: 5px solid #eee; padding-left: 5px;}
	.tab-show small{font-size: 18px;}
	.tab-box{}
	.tab-box ul{list-style: none; background: #fcfcfc; border:1px solid #eee;}
	.tab-box ul li{font-size: 18px; margin-bottom: 5px;  display: block;
		width: 200px;}
	.tab-box ul li ul{border:none;}
	.tab-box ul li ul li{border-bottom: 1px solid #eee; width: 100px;}
	pre{background: #fcfcfc; display: block; width: 100%; border:1px solid #eee; overflow: auto;
	margin-left: -20px; padding: 10px;}
	code{width: 300px; display: block; word-break: break-all;}
	.version{animation-name: blink; animation-delay: 0s; animation-duration: 1s; animation-timing-function: ease-in-out; animation-iteration-count: infinite; font-size: 20px; padding: 10px;}
	@keyframes blink{
		0%{color: #f20; opacity: 1;}
		50%{color: #000;}
		100%{color: #fff200; }
	}

	#share-buttons img {
		width: 35px;
		padding: 5px;
		border: 0;
		box-shadow: 0;
		display: inline;
		}
	#share-buttons a{text-decoration: none; color: #000;}
	@media only screen and (max-width: 500px)
	{
		.sidebar{width: 93%;}
		h2{display: inline-block; font-size: 1.1em;}
	}
</style>

<header class="header">
	<aside class="logo"><img src="public/images/pihype_logo.png"></aside>
</header>

<script>
	function showtab(e,tag)
	{
		var active = document.getElementsByClassName("active");
	

		// set tag to tab-show
		var tab = document.getElementById(tag);

		if(typeof tab != undefined && tab != null)
		{

			if(active.length > 0)
			{
				for(var x = 0; x < active.length; x++)
				{
					active[x].setAttribute("class","");
				}
			}
			// ok set active
			e.setAttribute("class","active");
			// set tab-show to tab-hide
			var show = document.getElementsByClassName("tab-show");
			if(show.length > 0)
			{
				for(var s = 0; s < show.length; s++)
				{
					show[s].setAttribute("class", "tab-hide");
				}
			}

			tab.setAttribute("class","tab-show");
		}
	}
</script>

<!-- main section -->
<section>
	<aside class="sidebar">
		<ul>
			<li onclick="showtab(this,'getting_started')" class="active"><a href="javascript:void(0)">Getting Started</a></li>
			<li onclick="showtab(this,'controller')"><a href="javascript:void(0)" >Controller</a></li>
			<li onclick="showtab(this,'model')"><a href="javascript:void(0)" >Model</a></li>
			<li onclick="showtab(this,'views')"><a href="javascript:void(0)" >Views</a></li>
			<li onclick="showtab(this,'helpers_plugins')"><a href="javascript:void(0)" >Helpers / Plugins</a></li>
			<li onclick="showtab(this,'images')"><a href="javascript:void(0)" >Images</a></li>
			<li onclick="showtab(this,'styles')"><a href="javascript:void(0)" >Styles</a></li>
			<li onclick="showtab(this,'javascript')"> <a href="javascript:void(0)" >Javascripts</a></li>
			<li onclick="showtab(this,'database')"><a href="javascript:void(0)" >Database</a></li>
			<li onclick="showtab(this,'routers')"><a href="javascript:void(0)" >Routers</a></li>
			<li onclick="showtab(this,'header_footer')"><a href="javascript:void(0)" >Header & Footers</a></li>
			<li onclick="showtab(this,'configuration')"><a href="javascript:void(0)" >Configurations</a></li>
			<li onclick="showtab(this,'examples')"><a href="javascript:void(0)" >Examples</a></li>
		</ul>
	</aside>

	<aside class="content">

	<div id="getting_started" class="tab-show">
		<h1>Welcome to Pihype</h1>
		<small style="color: green; ">A PHP Framework for faster and controlled development. Developed by @xchriscode </small>
		<small style="color: #f90; display: block; margin-top: 15px;">This is the default Route view, you can change it in <span style="padding: 5px; background: #fcfcfc; color: #000;">config/router.php</span></small>
		

		<p class="version">Version 1.0-alpha</p>


		<h3>Share Pihype with your folks.</h3>
		<!-- I got these buttons from pihype.com -->
		<div id="share-buttons">
		    
		    <!-- Buffer -->
		    <a href="https://bufferapp.com/add?url=https://pihype.com&amp;text=I just installed Pihype PHP framework. i want you also to download and try it out!" target="_blank">
		        <img src="https://simplesharebuttons.com/images/somacro/buffer.png" alt="Buffer" />
		    </a>
		    
		    <!-- Digg -->
		    <a href="http://www.digg.com/submit?url=https://pihype.com" target="_blank">
		        <img src="https://simplesharebuttons.com/images/somacro/diggit.png" alt="Digg" />
		    </a>
		    
		    <!-- Email -->
		    <a href="mailto:?Subject=I just installed Pihype PHP framework. i want you also to download and try it out!&amp;Body=I%20saw%20this%20and%20thought%20of%20you!%20 https://pihype.com">
		        <img src="https://simplesharebuttons.com/images/somacro/email.png" alt="Email" />
		    </a>
		 
		    <!-- Facebook -->
		    <a href="http://www.facebook.com/sharer.php?u=https://pihype.com" target="_blank">
		        <img src="https://simplesharebuttons.com/images/somacro/facebook.png" alt="Facebook" />
		    </a>
		    
		    <!-- Google+ -->
		    <a href="https://plus.google.com/share?url=https://pihype.com" target="_blank">
		        <img src="https://simplesharebuttons.com/images/somacro/google.png" alt="Google" />
		    </a>
		    
		    <!-- LinkedIn -->
		    <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=https://pihype.com" target="_blank">
		        <img src="https://simplesharebuttons.com/images/somacro/linkedin.png" alt="LinkedIn" />
		    </a>
		    
		    <!-- Pinterest -->
		    <a href="javascript:void((function()%7Bvar%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','http://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)%7D)());">
		        <img src="https://simplesharebuttons.com/images/somacro/pinterest.png" alt="Pinterest" />
		    </a>
		    
		    <!-- Print -->
		    <a href="javascript:;" onclick="window.print()">
		        <img src="https://simplesharebuttons.com/images/somacro/print.png" alt="Print" />
		    </a>
		    
		    <!-- Reddit -->
		    <a href="http://reddit.com/submit?url=https://pihype.com&amp;title=I just installed Pihype PHP framework. i want you also to download and try it out!" target="_blank">
		        <img src="https://simplesharebuttons.com/images/somacro/reddit.png" alt="Reddit" />
		    </a>
		    
		    <!-- StumbleUpon-->
		    <a href="http://www.stumbleupon.com/submit?url=https://pihype.com&amp;title=I just installed Pihype PHP framework. i want you also to download and try it out!" target="_blank">
		        <img src="https://simplesharebuttons.com/images/somacro/stumbleupon.png" alt="StumbleUpon" />
		    </a>
		    
		    <!-- Tumblr-->
		    <a href="http://www.tumblr.com/share/link?url=https://pihype.com&amp;title=I just installed Pihype PHP framework. i want you also to download and try it out!" target="_blank">
		        <img src="https://simplesharebuttons.com/images/somacro/tumblr.png" alt="Tumblr" />
		    </a>
		     
		    <!-- Twitter -->
		    <a href="https://twitter.com/share?url=https://pihype.com&amp;text=<?=htmlentities("Pihype PHP Web Framework")?>&amp;hashtags=pihype" target="_blank">
		        <img src="https://simplesharebuttons.com/images/somacro/twitter.png" alt="Twitter" />
		    </a>
		    
		    <!-- VK -->
		    <a href="http://vkontakte.ru/share.php?url=https://pihype.com" target="_blank">
		        <img src="https://simplesharebuttons.com/images/somacro/vk.png" alt="VK" />
		    </a>
		    
		    <!-- Yummly -->
		    <a href="http://www.yummly.com/urb/verify?url=https://pihype.com&amp;title=I just installed Pihype PHP framework. i want you also to download and try it out!" target="_blank">
		        <img src="https://simplesharebuttons.com/images/somacro/yummly.png" alt="Yummly" />
		    </a>

		</div>
<hr>
<h2 style="font-weight: normal;">Features & Brief Overview</h2>

<ol>
<li>
<p>MVC design pattern</p>
<ol>
<li>Controller</li>
<li>Model</li>
<li>Views
(Pratically built the way MVC should work)</li>
</ol>
</li>
<li>
<p>Multiple database system</p>
<p>#Can use</p>
<ol>
<li>Mysqli</li>
<li>Mysql</li>
<li>Mongodb</li>
<li>Sqlite
and more..</li>
</ol>
</li>
<li>
<p>Dynamic file inclusion and routing
// example
-&gt; You want to get images from the public/images directory</p>
<pre><code>  local::img("image.png") or local::img("image")
   
   # This will get the image and create the &lt; img &gt; tag
   # Can take upto 2 parameters, 1 =&gt; image name 2 =&gt; attributes eg class="name" etc.
</code></pre>
<p>-&gt; You want to load a css file from public/css</p>
<pre><code> local::css("main", attributes (optional))
 
 # Will create the link tag and include the main.css if found
 # Can take upto 2 parameters also
</code></pre>
<p>-&gt; You want to load a javascript file from public/javascript</p>
<pre><code> local::js("jquery", attributes(optional) )
 
 # Will create the script tag and include the js file if found
</code></pre>
<p>-&gt; You want to route to another view within a controller</p>
<pre><code> local::linkTo("nextpage", "click me")
 
 # lets assume current controller is &lt; home &gt;
 
 # Will generate &lt;a href="home/nextpage"&gt; click me &lt;/a&gt;
 # Or you want to include some attributes
 
 local::linkTo("nextpage", 'class="btn"', "click me")
 
 #will generate &lt;a href="home/nextpage" class="btn"&gt; click me &lt;/a&gt;
 # You can jump out of a controller like this
  local::linkTo("contact/form", "contact us")
</code></pre>
</li>
<li>
<p>Views created dynamically and properly routed
// example
-&gt; You create a controller named &lt; home &gt; eg</p>
<pre><code> class Home extends AppController
 {
 	// and you create a view called about
 	public function about()
 	{
 		// no need to call a view here eg
 		// (not required) $this-&gt;view("about") or $this-&gt;view("home/about")
 		// created dynamically
 		// just check the app/views folder.
 		// now lets assume you want to route to another view if a condition is met
 		$id = 1;
 		if($id == 1)
 		{
 			$this-&gt;routeTo("home/contact") or $this-&gt;routeTo("contact");
 			// very easy and dynamic
 			// Or can redirect to a new controller or this same controller with a delay
 			$this-&gt;redir("home/contact", 5) 
 			// 5 seconds
 		}
 	}
 }
</code></pre>
</li>
<li>
<p>Models can generate data when a form is submited
// example
-&gt; You need to create a contact form
-&gt; in the app/views/home/contact.php we have this</p>
<pre><code> &lt;-- @contact is a model class --&gt;
 &lt;form action="@contact" method="post"&gt;
 	&lt;input type="text" name='fullname' placeholder="Your fullname"&gt;
 	&lt;!-- we can create a button and the name attribute would be the method in @contact model class for processing this form --&gt;
 	&lt;button name="process" type="submit"&gt; Submit &lt;/button&gt;
 &lt;/form&gt;
</code></pre>
<p>-&gt; in the app/model/contact.php</p>
<pre><code> class Contact extends AppModel
 {
 	public function process()
 	{
 		// we can call a database function easily 
 		// or get the post easily and filtered
 		$post = post::all(); 
 		// helper class or plugin created by xchriscode
 		// the we now have access to post
 		$fullname = $post-&gt;fullname;
 		// equivalent to $_ POST['fullname'];
 		// now we can perform database operation here
 		// example
 		$check = db::check("SELECT * FROM users WHERE fullname = '$fullname'");
 		// then we can return result to home/contact controller
 		return $check;
 	}
 }
</code></pre>
<p>-&gt; in the app/controller/home_controller.php</p>
<pre><code> class Home extends AppController
 {
 	public function contact()
 	{
 		// we can get the return data by doing
 		$valid_user = $this-&gt;is_ready("@contact");
 		// that's all, the return data will be passed tp $valid_user variable

 		// so we can do our checking and routing here
 		if($valid_user-&gt;num_rows &gt; 0)
 		{
 			echo "Thank you!";
 			// You understand right?? 
 			// very dynamic 
 			// and you can route to your success page
 			$this-&gt;linkTo("home/success?msg=Thank you for your message");
 			// or
 			message::$status = "Thank you for contact us";
 			$this-&gt;linkTo("success");

 		}
 	}
 }
</code></pre>

<h2 style="border-bottom: 1px solid #eee; padding: 10px; font-weight: normal;">Application folder structure</h2>

		<div class="tab-box">
		<ul>
			<li>app/
				<ul>
					<li>controller/</li>
					<li>helpers/</li>
					<li>model/</li>
					<li>views/</li>
				</ul>
			</li>

			<li>config/ 
				</li>
			<li>db/</li>
			<li>public/
				<ul>
					<li>footers/</li>
					<li>headers/</li>
					<li>images/</li>
					<li>javascripts/</li>
					<li>styles/</li>
				</ul></li>
		</ul>
		</div>
	</div>

	<div id="controller" class="tab-hide">
		
		<h1>Controller</h1>
		<p>Controllers are essentially the central unit of Pihype application. It interacts with the model (Abstraction Layer) and takes the data from the model (Abstraction Layer) and pass it to the view (Presentation Layer). More importantly, controllers are controlling the overall flow of the Pihype application, taking the input (HTTP GET) and rendering the proper output to the view (Presentation Layer).  
			<br><br>
			A controller has this format in file naming eg. home_controller.php <br> All controllers must have _controller suffix. It's a standard naming convention.</p>

		<div class="tab-location">
			Folder: app/controller/
		</div>

		<div class="tab-box">
			<div class="tab-code">
			<div class="tab-title"> Example : home_controller.php </div>
			

			<p> // Home controller <br>

				class Home extends AppController <br>
				{<br>

					&nbsp;function __construct()<br>
					&nbsp;{<br><br>
						&nbsp;&nbsp;&nbsp; // This will make sure no view file is generated for contact_form <br>
						&nbsp;&nbsp;&nbsp; $this->noview(["contact_form"]);<br>
					&nbsp;}<br>
					<br>

					// index view action<br>
					&nbsp;function index()<br>
					&nbsp;{<br><br>

					&nbsp;}<br>
					<br>


					// contact_form view action<br>
					&nbsp;function contact_form()<br>
					&nbsp;{<br><br>

					&nbsp;}<br>
					<br>
				}
			</p>

			</div>
		</div>

		<p>
			Controller can only work when registered in the config/router.php file. Please take note.
		</p>
	</div>

	<div id="model" class="tab-hide">
		
		<h1>Model</h1>
		<p>Models interacts directly to the database and then to the controllers, the data returned to the controllers is then passed to the view (Presentation layer).  <br><br>
			A Model has this format in file naming eg. home_model.php <br> All Models must have the _model suffix. It's a standard naming convention.</p>

		<div class="tab-location">
			Folder: app/model/
		</div>

		<div class="tab-box">
			<div class="tab-code">
			<div class="tab-title"> Example : in home_model.php </div>
			

			<p> // Home Model <br>

				class Home extends AppModel <br>
				{<br>

					// process function<br>
					&nbsp;function process()<br>
					&nbsp;{<br><br>
							&nbsp;&nbsp; &nbsp; $accounts = db::query("SELECT * FROM accounts");<br>
							&nbsp;&nbsp;&nbsp; return $accounts;
					&nbsp;}<br>
					<br>
				}
			</p>

			</div>
		</div>

		<div class="tab-location">
			Folder: app/controller/
		</div>

		<div class="tab-box">
			<div class="tab-code">
			<div class="tab-title"> Example : in home_controller.php </div>
			

			<p> // Home Controller <br>

				class Home extends AppController <br>
				{<br>

					// index view<br>
					&nbsp;function index()<br>
					&nbsp;{<br><br>
							&nbsp;&nbsp; &nbsp; // This will return the accounts from this home/process model <br>
							&nbsp;&nbsp; &nbsp; $users = $this->model("@home/process");<br>
							&nbsp;&nbsp;&nbsp; // Or use <br>
							&nbsp;&nbsp; &nbsp; $users = $this->is_ready("@home"); // When working with a POST
					&nbsp;}<br>
					<br>
				}
			</p>

			</div>
		</div>	
	</div>


	<div id="views" class="tab-hide">
		
		<h1>Views</h1>
		<p>The view is the (Presentation Layer) for our application. All incoming browser requests are handled by the controller and rendered properly to the view.  This views are generated dynamically from the router. </p>

		<div class="tab-location">
			Folder: app/views/
		</div>

		<div class="tab-box">
			<div class="tab-code">
			<div class="tab-title"> Example : home/index.php </div>
			

			<p> // Home view <br>

				<h2>Home/index</h2>
				<p>Check app/views/home/index.php </p>
			</p>

			</div>
		</div>
	</div>

	<div id="helpers_plugins" class="tab-hide">
		
		<h1>Helpers / Plugins</h1>
		<p>Pihype has a set of helper classes that can be of general use in your application development. You can also create your own helper class and use it anywhere in your application. See list of useable helper classes in app/helpers/.</p>

		<div class="tab-location">
			1. app/helpers/local.php
		</div>

		<div class="tab-box">
			<div class="tab-code">
			<div class="tab-title"> General Use </div>
			

			<p> // Load an image and generate < img tag > <br>
				&nbsp;&nbsp;&nbsp; local::img("logo.png", 'class="img"'); <br>
				&nbsp;&nbsp;&nbsp; >> Result < img src="url/public/images/logo.png" class="img" /> <br>
			</p>

			<br><br>
			<p> // Load a css file and generate < link tag > <br>
				&nbsp;&nbsp;&nbsp; local::css("main", 'media="all"'); <br>
				&nbsp;&nbsp;&nbsp; >> Result < link rel="stylesheet" href="url/public/styles/main.css" media="all" /> <br>
			</p>

			<br><br>
			<p> // Load a javascript file and generate < script tag > <br>
				&nbsp;&nbsp;&nbsp; local::js("main"); <br>
				&nbsp;&nbsp;&nbsp; >> Result < script type="text/javascript" src="url/public/javascripts/main.js" media="all" /> <br>
			</p>


			<br><br>
			<p> // Goto a new page and generate < a tag > <br>
				&nbsp;&nbsp;&nbsp; local::linkTo("main/home", 'class="btn"', "Homepage"); <br>
				&nbsp;&nbsp;&nbsp; >> Result < a href="url/main/home" class="btn"> Homepage </ a> <br>
			</p>

			</div>
		</div>


		<div class="tab-location">
			2. app/helpers/data.php
		</div>

		<div class="tab-box">
			<div class="tab-code">
			<div class="tab-title"> General Use </div>
			

			<p> // Log data within a controller <br>
				&nbsp;&nbsp;&nbsp; data::log(//data, database records etc); <br>
			</p>

			<br><br>
			<p> // Output data within a view <br>
				&nbsp;&nbsp;&nbsp; $data = data::get(); <br>
				&nbsp;&nbsp;&nbsp; >> Result $data will then collect all the information from data::log<br>
			</p>

			</div>
		</div>


		<div class="tab-location">
			3. app/helpers/data.php
		</div>

		<div class="tab-box">
			<div class="tab-code">
			<div class="tab-title"> General Use </div>
			

			<p> // Log data within a controller <br>
				&nbsp;&nbsp;&nbsp; data::log(//data, database records etc); <br>
			</p>

			<br><br>
			<p> // Output data within a view <br>
				&nbsp;&nbsp;&nbsp; $data = data::get(); <br>
				&nbsp;&nbsp;&nbsp; >> Result $data will then collect all the information from data::log<br>
			</p>

			</div>
		</div>

		<div class="tab-location">
			4. app/helpers/message.php
		</div>

		<div class="tab-box">
			<div class="tab-code">
			<div class="tab-title"> General Use </div>
			

			<p> // Log message status within a controller <br>
				&nbsp;&nbsp;&nbsp; message::$status = "This is a message to be outputed within a view"; <br>
			</p>

			<br><br>
			<p> // Output message within a view <br>
				&nbsp;&nbsp;&nbsp; message::out(); <br>
				&nbsp;&nbsp;&nbsp; >> Result > This is a message to be outputed within a view <br>
			</p>

			</div>
		</div>

		<div class="tab-location">
			5. app/helpers/post.php
		</div>

		<div class="tab-box">
			<div class="tab-code">
			<div class="tab-title"> General Use </div>
			

			<p> // Get all the $_POST data  <br>
				&nbsp;&nbsp;&nbsp; $data = post::all(); <br>
			</p>

			<br><br>
			<p> // Get a single $_POST data <br>
				&nbsp;&nbsp;&nbsp; $username = post::get("username"); <br>
			</p>

			</div>
		</div>


		<div class="tab-location">
			6. app/helpers/sess.php
		</div>

		<div class="tab-box">
			<div class="tab-code">
			<div class="tab-title"> General Use </div>
			

			<p> // Check for a session data  <br>
				&nbsp;&nbsp;&nbsp; sess::check("firstname") <br>
				&nbsp;&nbsp;&nbsp; Will return true if found and false otherwise <br>
			</p>

			<br><br>
			<p> // Save a session data  <br>
				&nbsp;&nbsp;&nbsp; sess::save("firstname","mack") <br>
				&nbsp;&nbsp;&nbsp; This will save firstname in the session array <br>
			</p>

			<br><br>
			<p> // return a session data  <br>
				&nbsp;&nbsp;&nbsp; $fn = sess::get("firstname") <br>
				&nbsp;&nbsp;&nbsp; This will return firstname from the session array if found<br>
			</p>

			<br><br>
			<p> // print-out a session data  <br>
				&nbsp;&nbsp;&nbsp; sess::out("firstname") <br>
				&nbsp;&nbsp;&nbsp; >> Result > mack<br>
			</p>

			</div>
		</div>


	</div>

	<div id="images" class="tab-hide">
		
		<h1>Images</h1>
		<p>All images are placed in the public root directory. With the help of the local::img helper function, you can retrive an image and also generate the < img tag along side.</p>

		<div class="tab-location">
			Folder: public/images/
		</div>

		<div class="tab-box">
			<div class="tab-code">
			<div class="tab-title"> Example : retrive an image in this directory </div>
			

			<p> 
				<h2>local::img("logo.png", 'class="img"')</h2>
				<p>Result >> < img  src="url/public/images/logo.png" class="img"/> </p>
				<br>
				<span> Can take upto 2 parameters, parameter 2 is optional.</span>
			</p>

			</div>
		</div>
	</div>

	<div id="styles" class="tab-hide">
		
		<h1>Styles</h1>
		<p>All CSS Styles are placed in the public root directory. With the help of the local::css helper function, you can retrive a css style and also generate the < link tag along side.</p>

		<div class="tab-location">
			Folder: public/styles/
		</div>

		<div class="tab-box">
			<div class="tab-code">
			<div class="tab-title"> Example : retrive a css file in this directory </div>
			

			<p> 
				<h2>local::css("main", 'media="all"')</h2>
				<p>Result >> < link rel="stylesheet" href="url/public/css/main.css" media="all"/> </p>
				<br>
				<span> Can take upto 2 parameters, parameter 2 is optional.</span>
			</p>

			</div>
		</div>
	</div>

	<div id="javascript" class="tab-hide">
		
		<h1>Javasripts</h1>
		<p>All Javascript files are placed in the public root directory. With the help of the local::js helper function, you can retrive a javascript file and also generate the < script tag along side.</p>

		<div class="tab-location">
			Folder: public/javascripts/
		</div>

		<div class="tab-box">
			<div class="tab-code">
			<div class="tab-title"> Example : retrive a javascript file in this directory </div>
			

			<p> 
				<h2>local::js("app")</h2>
				<p>Result >> < script type="text/javascript" href="url/public/javascripts/app.js"> < /script > </p>
				<br>
				<span> Takes only 1 parameter.</span>
			</p>

			</div>
		</div>
	</div>

	<div id="database" class="tab-hide">
		
		<h1>Database</h1>
		<p>Database can be configured in the config/db.php file. Pihype supports a wide range of database systems. Eg, Mysqli, Mysql, PDO, Sqlite, MongoDB etc. It's built in way that you can change your default database system and with no need to worry about updating your codes within models.</p>

		<div class="tab-location">
			Folder: config/db.php
		</div>

		<div class="tab-box">
			<div class="tab-code">
			<div class="tab-title"> Example : configure a database. Open config/db.php </div>
			

			<p> 
				<p>The first parameter is for a default connection. we are going to set it to "mysqli" </p>
				<h2>Config > db_host = 'localhost', db_name = 'test', db_pass = '', db_user = 'root'</h2>
				<p>This would create a mysqli.php file in db/database/ diretory, you can open the mysqli.php file and do your database connection, logics there.</p>
				<br>
				<span> With db:: we can get access to database logics you've created. See an example below</span>
			</p>

			</div>
		</div>


		<div class="tab-box">
			

			<div class="tab-box">
			<div class="tab-code">
			<div class="tab-title"> How to use db:: class </div>
			

			<p> // in "assummed" mysqli.php file <br>
				&nbsp;&nbsp;&nbsp; static function query($sql){ // suites } <br>
			</p>

			<br><br>
			<p> // in "assummed" model file "post_model.php" <br>
				&nbsp;&nbsp;&nbsp; $get = db::query("SELECT * FROM users"); <br>
				&nbsp;&nbsp;&nbsp; with the db:: class we can get access to "mysqli.php" class methods or logics. <br>
			</p>

			</div>
		</div>


			</div>
		</div>
	</div>

	<div id="routers" class="tab-hide">
		
		<h1>Routers</h1>
		<p>Routers are really essential to the controllers and views. A controller and a view must be registered before it can successfully be routed to. This gives us control to our application views and controllers, and also make life easy for developers when documenting, sharing of codes. And most importantly, introduces security when requesting for a controller.</p>

		<div class="tab-location">
			Folder: config/router.php
		</div>

		<div class="tab-box">
			<div class="tab-code">
			<div class="tab-title"> Example : Register a controller and a view in the router.php file </div>
			

			<p> 
				<p>The first parameter is for a default view. You can change  yours from "pihype#intro" to another controller with a view, eg "home#index"</p>
				<hr>
				<span>Next argument is an array</span>
				<h2>["home" => "index#about#contact"]</h2>
				<span>This would register index, about, contact as a valid view in "home" controller and can be accessed via the browser with home/index. Any un-registered controller will generate an error.</span>
				<hr>
				<h2>["home" => "*"]</h2>
				<span>This would perform a general routing for the home controllers. Means all views can be accessed without registring them.</span>
			</p>
			</p>

			</div>
		</div>


			</div>
		</div>
	</div>

	<div id="header_footer" class="tab-hide">
		
		<h1>Headers & Footers</h1>
		<p>This is most common in web applications, Pihype helps you with dynamic headers and footers. Auto-generated and controlled within the config/config.php file. </p>

		<div class="tab-location">
			Folder: public/headers/
		</div>

		<div class="tab-box">
			<div class="tab-code">
			<div class="tab-title"> Info : "default_header.php" would be the default header file for all files. You can change this and make it dynamic in the config/config.php > header_look_for => [] array </div>
			

			<p> 
				<h2>default_header.php</h2>
			</p>
			</p>

			</div>
		</div>

		<div class="tab-location">
			Folder: public/footers/
		</div>

		<div class="tab-box">
			<div class="tab-code">
			<div class="tab-title"> Info : "default_footer.php" would be the default footer file for all files. You can change this and make it dynamic in the config/config.php > footer_look_for => [] array </div>
			

			<p> 
				<h2>default_footer.php</h2>
			</p>
			</p>

			</div>
		</div>


			</div>
		</div>
	</div>


	<div id="configuration" class="tab-hide">
		
		<h1>Configurations</h1>
		<p>Pihype has a set rules that can be configured to add dynamism to headers, footer etc.</p>

		<div class="tab-location">
			Folder config/config.php
		</div>

		<div class="tab-box">
			<div class="tab-code">
			<div class="tab-title"> General Use </div>
			

			<p> // Turn ON a session <br>
				&nbsp;&nbsp;&nbsp; session = 1 <br>
			</p>

			<br>
			<br>

			<p> // Turn ON a cookeie <br>
				&nbsp;&nbsp;&nbsp; cookie = 1 <br>
			</p>

			<br>
			<br>

			<p> // Turn ON dynamic headers <br>
				&nbsp;&nbsp;&nbsp; secure_header = 1 <br>
			</p>

			<br>
			<br>


			<p> // When a session with 'adminid' isset, the header would automatically change to admin_header.php<br>
				&nbsp;&nbsp;&nbsp; header_look_for = ['adminid' => 'admin'] <br>
			</p>

			<br>
			<br>

			<p> // Turn ON dynamic footers <br>
				&nbsp;&nbsp;&nbsp; secure_footer = 1 <br>
			</p>

			<br>
			<br>

			<p> // When a session with 'adminid' isset, the footer would automatically change to admin_footer.php<br>
				&nbsp;&nbsp;&nbsp; footer_look_for = ['adminid' => 'admin'] <br>
			</p>

			<br>
			<br>

		
			</div>
		</div>

		</div>


	</div>

	<div id="examples" class="tab-hide">
		
		<h1>Examples</h1>

		<div class="tab-location">
			Controller
		</div>

		<div class="tab-box">
			<div class="tab-code">
			<div class="tab-title"> How to start with a controller</div>
				
<pre>
	<code>
class Blog extends AppController
{
	function __construct()
	{
		$this->noview(["contact"]);
	}

	function feed()
	{
		$all = $this->model("@posts/all");
		if($all !== false)
		{
			data::log($all);
		}
	}

	function post()
	{
		$post = $this->is_ready("@newpost");

		if($post === true)
		{
			message::$status = "Post Created successfully";
			$this->redir("blog/feed",4);
		}
	}

	function view($id)
	{
		$read = $this->model("@posts/read/{$id}");
		if($read !== false)
		{
			data::log($read);
			return $read;
		}
	}

	function edit($id)
	{
		$edit = $this->is_ready("@newpost");

		$view = $this->view($id);
		$view->postid = $id;

		data::log($view);

		if($edit === true)
		{
			message::$status = "Post edited successfully!";
		}

	}

	function delete($id)
	{
		$delete = $this->model("@posts/delete/{$id}");
		if($delete === true)
		{
			message::$status = "Post Deleted successfully";
			$this->routeTo("blog/feed");

		}
	}

	function contact($id)
	{
		echo $id;
	}
}
	</code>
</pre>
			</div>
		</div>


		<div class="tab-location">
			Models
		</div>

		<div class="tab-box">
			<div class="tab-code">
			<div class="tab-title"> How to start with a model</div>
				
<pre>
	<code>
class Newpost extends AppModel
{
	

	function read($id)
	{
		$all = db::query("select * from users where userid = $id");
		if($all !== false)
		{
			return $all->fetch_object();
		}
		else
		{
			return false;
		}
	}

	
}
	</code>
</pre>
			</div>
		</div>

		</div>


	</div>

	<style type="text/css">
		.tab-location{display: inline-block; padding: 15px; background: #fcfcfc; box-shadow: 0px 0px 5px #eee;
			color: #f20; font-size: 17px;}
		.tab-code{display: block; background: #fcfcfc; border:1px solid #eee; font-size: 17px;
			margin-top: 10px; padding: 30px; margin-bottom: 10px;}
	</style>
		
	</aside>
</section>
</body>
</html>