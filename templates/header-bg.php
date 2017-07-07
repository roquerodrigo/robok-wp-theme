<nav class="navbar navbar-expand-md navbar-dark fixed-top justify-content-between bg-dark">
	<div class="container">
		<a class="navbar-brand" href="<?php bloginfo( 'url' ) ?>"><?php bloginfo( 'name' ) ?></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse justify-content-between" id="main-navbar">
			<?php robok_main_nav_left() ?>
			<?php robok_main_nav_right() ?>
		</div>
	</div>
</nav>
<div style="height: 88px; display: block"></div>