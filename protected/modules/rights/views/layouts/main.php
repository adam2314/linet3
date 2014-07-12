<?php $this->beginContent(Rights::module()->appLayout); ?>


		<?php if( $this->id!=='install' ): ?>

			

				<?php $this->renderPartial('/_menu'); ?>

			

		<?php endif; ?>

		<?php $this->renderPartial('/_flash'); ?>

		<?php echo $content; ?>

<?php $this->endContent(); ?>