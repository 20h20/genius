<?php
	get_header();
?>
	<div class="cbo-page page-404">
		<section class="cbo-text">
			<div class="text-inner cbo-container container--small">
				<div class="text-title cbo-title-1 slide-up">
					Erreur 404
				</div>

				<div class="text-content">
					<div class="cbo-cms">
						<p>
							La page que vous recherchez n'existe pas.<br />Vous pouvez toujours revenir sur vos pas.
						</p>
						<a class="cbo-button" href="<?php echo home_url(); ?>">
							Revenir à l'accueil
						</a>
					</div>
				</div>
			</div>
		</section>
	</div>
<?php
	get_footer();
?>