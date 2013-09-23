<?php $this->beginContent(Rights::module()->appLayout); ?>

<div id="rights" class="container">

	<div id="content">

		<?php if( $this->id!=='install' ): ?>

			

				<?php $this->renderPartial('/_menu'); ?>

			

		<?php endif; ?>

		<?php $this->renderPartial('/_flash'); ?>

		<?php 
                
                $this->beginWidget('MiniForm',array('haeder' => "Manage Items",)); 
                
                echo $content; 
                
                $this->endWidget();
                ?>

	</div><!-- content -->

</div>

<?php $this->endContent(); ?>