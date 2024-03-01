<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<title>My Webpage</title>
  <style>body {
	font-family: Arial, sans-serif;
	margin: 0;
	padding: 0;
}

header {
	background-color: #333;
	color: #fff;
	padding: 1rem;
}

nav ul {
	background-color: #333;
	list-style-type: none;
	padding: 0;
	display: flex;
	justify-content: space-between;
}

nav ul li a {
	color: #fff;
	text-decoration: none;
	padding: 0.5rem 1rem;
}

nav ul li a:hover {
	background-color: #555;
}

main {
	padding: 2rem;
}

main section {
	margin-bottom: 2rem;
}

footer {
	background-color: #333;
	color: #fff;
	padding: 1rem;
	text-align: center;
}</style>
</head>
<body>
	<header>
		<h1>Welcome to My Webpage</h1>
	</header>
	<nav>
		<ul>
			<li><a href="#about">About</a></li>
			<li><a href="#services">Services</a></li>
			<li><a href="#contact">Contact</a></li>
		</ul>
	</nav>
	<main>
		<section id="about">
			<h2>About Us</h2>
			<p>We are a company that provides high-quality products and services to our customers.</p>
		</section>
		<section id="services">
			<h2>Our Services</h2>
			<ul>
				<li>Service 1</li>
				<li>Service 2</li>
				<li>Service 3</li>
			</ul>
		</section>
		<section id="contact">
			<h2>Contact Us</h2>
			<p>Email us at info@example.com or call us at 123-456-7890.</p>
		</section>
	</main>
	<footer>
		<p>Copyright © 2023 My Webpage</p>
	</footer>
</body>
</html>