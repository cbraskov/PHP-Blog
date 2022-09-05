<!-- The first include should be config.php -->

<?php require_once('config.php') ?>
<?php require_once( 'C:/xampp/htdocs/complete-blog-php/includes/head_section.php') ?>
<?php require_once( 'C:/xampp/htdocs/complete-blog-php/includes/public_functions.php') ?>
<?php require_once( 'C:/xampp/htdocs/complete-blog-php/includes/registration_login.php') ?>


<!-- Retrieve all posts from database  -->
<?php $posts = getPublishedPosts(); ?>
	<title>LifeBlog | Home </title>
</head>
<body>
	<!-- container - wraps whole page -->
	<div class="container">
		<!-- navbar -->
		<?php include( 'C:\xampp\htdocs\complete-blog-php/includes/navbar.php') ?>
		<!-- // navbar -->

		<!-- banner -->
		<?php include( 'C:/xampp/htdocs/complete-blog-php/includes/banner.php') ?>
		<!-- // banner -->

		<!-- Page content -->
		<div class="content">
			<h2 class="content-title">Recent Articles</h2>
			<hr>
<!-- more content still to come here ... -->

<!-- Add this ... -->
<?php foreach ($posts as $post): ?>
	<div class="post" style="margin-left: 0px;">
		<img src="<?php echo BASE_URL . '/static/images/' . $post['image']; ?>" class="post_image" alt="">
        <!-- Added this if statement... -->
		<?php if (isset($post['topic']['name'])): ?>
			<a 
				href="<?php echo BASE_URL . 'filtered_posts.php?topic=' . $post['topic']['id'] ?>"
				class="btn category">
				<?php echo $post['topic']['name'] ?>
			</a>
		<?php endif ?>

		<a href="single_post.php?post-slug=<?php echo $post['slug']; ?>">
			<div class="post_info">
				<h3><?php echo $post['title'] ?></h3>
				<div class="info">
					<span><?php echo date("F j, Y ", strtotime($post["created_at"])); ?></span>
					<span class="read_more">Read more...</span>
				</div>
			</div>
		</a>
	</div>
<?php endforeach ?>

		</div>
		<!-- // Page content -->

		<!-- footer -->
		<?php include( 'C:/xampp/htdocs/complete-blog-php/includes/footer.php') ?>
		<!-- // footer -->

	</div>
	<!-- // container -->
</body>
</html>