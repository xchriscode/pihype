<!DOCTYPE html>
<html>
<head>
	<title>Pihype v1 Framework</title>
</head>
<body>

<h1>Welcome to Pihype</h1>
<small style="color: green; font-size: 16px;">A PHP Framework for faster and controlled development. Developed by @xchriscode </small>
<small style="color: #f90; font-size: 16px; display: block; margin-top: 15px;">This is the default Route view, you can change it in <span style="padding: 5px; background: #fcfcfc; color: #000;">config/router.php</span></small>
<h2 style="border-bottom: 1px solid #eee; padding: 10px; font-weight: normal;">Application folder structure</h2>

<ul>
	<li>app/ <small>[MVC]</small>
		<ul>
			<li>controller/</li>
			<li>helpers/</li>
			<li>model/</li>
			<li>views/</li>
		</ul>
	</li>

	<li>config/ 
		<small>[Router, URL, DB etc.]</small></li>
	<li>db/ <small>[Selected Database, Migration file]</small></li>
	<li>public/
		<ul>
			<li>footers/</li>
			<li>headers/</li>
			<li>images/</li>
			<li>javascripts/</li>
			<li>styles/</li>
		</ul></li>
</ul>

<style type="text/css">
	body{margin: 0; padding: 10px;}
	ul{padding: 20px; background: #fcfcfc; border: 1px solid #eee; width: 95%; margin: auto;}
	ul li{margin-bottom: 5px; font-size: 18px;}
	ul li ul{border: none;}
</style>


</body>
</html>