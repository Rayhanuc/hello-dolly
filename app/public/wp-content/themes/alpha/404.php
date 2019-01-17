<?php

get_header();
?>

<body <?php body_class(); ?>>
	<div class="container errorview">
		<div class="row">
			<div class="col-md-12 text-center">
				<div class="error-page">
					<h1>
						<?php _e("404", "alpha"); ?>
					</h1>
					<h2>
						<?php _e("Sorry! We coulden't find what you were looking for.", "alpha") ; ?>
					</h2>
				</div>
			</div>
		</div>
	</div>
</body>

<?php
get_footer();