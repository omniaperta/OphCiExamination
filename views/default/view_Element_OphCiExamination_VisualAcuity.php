<h4 class="elementTypeName">
	<?php  echo $element->elementType->name ?>
</h4>
<div class="cols2 clearfix">
	<div class="left eventDetail">
		<div class="data">
			<?php echo $element->getCombined('right') ?>
			<?php if($element->right_comments) { ?>
			(<?php echo $element->right_comments ?>)
			<?php } ?>
		</div>
	</div>
	<div class="right eventDetail">
		<div class="data">
			<?php echo $element->getCombined('left') ?>
			<?php if($element->left_comments) { ?>
			(<?php echo $element->left_comments ?>)
			<?php } ?>
		</div>
	</div>
</div>
