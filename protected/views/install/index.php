<?php $this->pageTitle=Yii::app()->name; ?>

<p style="font-size:120%;font-weight: bold;">Welcome to the <i><?php echo CHtml::encode(Yii::app()->name); ?> Install Wizard!</i></p>

<ul>
<li><a href="install/install">Quiz Wizard&nbsp;&raquo;</a><p>10 General knowledge questions, but you need to be quick with your answers.</p><p>This demonstrates the step timeout feature (you have 30 seconds to answer each question), and ForwardOnly navigation - you can not return to an earlier step even by manually entering the URL</p></li>
</ul>
<p><b>Note:</b> No data is stored on completion of the Wizard's; they either display what you have eneterd, or in the case of the quiz, how well you did.</p>
