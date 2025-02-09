<section class="cbo-prices">
	<div class="prices-inner cbo-container">

		<div class="prices-toggle">
			<div class="toggle-button">
				<span class="button-mensual">
					Mensuel
				</span>
				<div class="checkbox-container">
					<input type="checkbox" class="button-checkbox" />
					<div class="checkbox-cursor"></div>
				</div>
				<span class="button-annual">
					Annuel
				</span>
			</div>
		</div>

		<div class="prices-list">
			<?php
				if( have_rows('prices_list') ):
				while ( have_rows('prices_list') ) : the_row();
				$style		= get_sub_field('style_du_bloc');
				$title	= get_sub_field('title');
				$icon	= get_sub_field('icon');
				$introduction	= get_sub_field('introduction');
				$bttxt	= get_sub_field('bt_txt');
				$bturl	= get_sub_field('bt_url');
				$mention	= get_sub_field('mention');
			?>
				<div class="list-el">
					<div class="el-inner inner--<?php echo $style ?>">
						<div class="inner-titlecontainer">
							<?php if($icon): ?>
								<div class="titlecontainer-picture cbo-picture-contain">
									<img
										decoding="async"
										src="<?php echo $icon['sizes']['small']; ?>"
										srcset="<?php echo $icon['sizes']['small']; ?> 320w, <?php echo $icon['sizes']['medium']; ?> 768w, <?php echo $icon['sizes']['medium']; ?> 1024w"
										alt="<?php echo $icon['alt']; ?>" sizes="100vw"
										loading="lazy"
										width="60" height="60"
									>
								</div>
							<?php endif; ?>
							<h3 class="titlecontainer-title cbo-title-2">
								<?php echo $title ?>
							</h3>
						</div>

						<?php if($introduction): ?>
							<div class="inner-introduction cbo-title-3">
								<?php echo $introduction ?>
							</div>
						<?php endif; ?>

						<div class="offers-list">
							<?php
								if( have_rows('offer_list') ):
								while ( have_rows('offer_list') ) : the_row();
								$title	= get_sub_field('titre');
								$content	= get_sub_field('content');
							?>
								<div class="list-el">
									<div class="el-title">
										<i class="icon icon--check-circle"></i>
										<?php echo $title ?>

										<?php if($content): ?>
											<i class="icon icon--chevron"></i>
										<?php endif; ?>
									</div>

									<?php if($content): ?>
										<div class="el-content cbo-cms">
											<?php echo $content ?>
										</div>
									<?php endif; ?>
								</div>
							<?php
								endwhile;
								endif;
							?>
						</div>
						
						<div class="inner-bottom">
							<?php
								if( have_rows('prices') ):
							?>
								<div class="bottom-top">
									<span class="top-title cbo-title-3">Tarification</span>
									<span class="top-tag">Facturé annuellement</span>
								</div>
							<?php
								endif;
							?>

							<?php
								if( have_rows('prices') ):
							?>
								<div class="bottom-prices">
									<?php
										while ( have_rows('prices') ) : the_row();
										$label	= get_sub_field('label');
										$mensualprice	= get_sub_field('mensualprice');
										$annualprice	= get_sub_field('annualprice');
									?>
										<div class="prices-el">
											<div class="el-text">
												<?php echo $label ?>
											</div>
											<div class="el-price">
												<span class="price"><?php echo $mensualprice ?></span>
												<span class="price price--annual"><?php echo $annualprice ?></span>
												<small>HT/mois</small>
											</div>
										</div>
									<?php
										endwhile;
									?>
								</div>
							<?php
								endif;
							?>

							<a class="cbo-button button--icon button--bluelight" href="<?php echo $bturl ?>">
								<?php echo $bttxt ?>
							</a>

							<?php if($mention): ?>
								<span class="inner-mention">
									<?php echo $mention ?>
								</span>
							<?php endif; ?>
						</div>
					</div>
				</div>
			<?php
				endwhile;
				endif;
			?>
		</div>
	</div>
</section>