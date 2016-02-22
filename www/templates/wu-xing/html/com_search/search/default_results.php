<?php defined('_JEXEC') or die('Restricted access'); ?>
<div class="blog-list-wr blog_bg search-results">
<ul class="cat-list vert">

		<?php
		foreach( $this->results as $result ) : ?>
			<li>
					<h3><span class="small<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">
						<?php echo $this->pagination->limitstart + $result->count.'. ';?>
					</span>
					<?php if ( $result->href ) :
						if ($result->browsernav == 1 ) : ?>
							<a href="<?php echo JRoute::_($result->href); ?>" target="_blank">
						<?php else : ?>
							<a href="<?php echo JRoute::_($result->href); ?>">
						<?php endif;

						echo $this->escape($result->title);

						if ( $result->href ) : ?>
							</a>
						<?php endif; ?>
						</h3>
						<?php if ( $result->section ) : ?>
							<p class="date"><?php echo $this->escape($result->section); ?><span></span></p>
						<?php endif; ?>
					<?php endif; ?>
				<p class="dsc">
					<?php echo $result->text; ?>
				</p>
			
				<p class="date">
					<strong><?php echo $result->created; ?>	</strong>
				</p>
			</li>
		<?php endforeach; ?>

		</ul>
</div>
				<?php echo $this->pagination->getPagesLinks( ); ?>
