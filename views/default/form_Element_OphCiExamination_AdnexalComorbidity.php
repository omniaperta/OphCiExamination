<?php
/**
 * OpenEyes
 *
 * (C) Moorfields Eye Hospital NHS Foundation Trust, 2008-2011
 * (C) OpenEyes Foundation, 2011-2012
 * This file is part of OpenEyes.
 * OpenEyes is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
 * OpenEyes is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with OpenEyes in a file titled COPYING. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package OpenEyes
 * @link http://www.openeyes.org.uk
 * @author OpenEyes <info@openeyes.org.uk>
 * @copyright Copyright (c) 2008-2011, Moorfields Eye Hospital NHS Foundation Trust
 * @copyright Copyright (c) 2011-2012, OpenEyes Foundation
 * @license http://www.gnu.org/licenses/gpl-3.0.html The GNU General Public License V3.0
 */
?>
<div class="element <?php echo $element->elementType->class_name ?>"
	data-element-type-id="<?php echo $element->elementType->id ?>"
	data-element-type-class="<?php echo $element->elementType->class_name ?>"
	data-element-type-name="<?php echo $element->elementType->name ?>"
	data-element-display-order="<?php echo $element->elementType->display_order ?>">
	<div class="removeElement">
		<button class="classy blue mini">
			<span class="button-span icon-only"><img
				src="<?php echo Yii::app()->createUrl('img/_elements/btns/mini-cross.png')?>" alt="+" width="24"
				height="22"> </span>
		</button>
	</div>
	<h4 class="elementTypeName">
		<?php  echo $element->elementType->name; ?>
	</h4>
	<div class="cols2 clearfix">
		<div class="left eventDetail">
			<div class="data">
				<div class="textMacros inline">
					<?php foreach(OphCiExamination_Attribute::model()->findAllByElement($element) as $attribute) {
						echo $form->dropDownTextSelection($element, 'right_description', CHtml::listData($attribute->options, 'value', 'label'), array('nowrapper'=>true, 'empty' => '-- '.$attribute->label.' --', 'class' => 'textMacro'));
					}?>
				</div>
				<?php echo $form->textArea($element, 'right_description', array('rows' => "1", 'cols' => "40", 'class' => 'autosize', 'nowrapper'=>true)) ?>
			</div>
		</div>
		<div class="right eventDetail">
			<div class="data">
				<div class="textMacros inline">
					<?php foreach(OphCiExamination_Attribute::model()->findAllByElement($element) as $attribute) {
						echo $form->dropDownTextSelection($element, 'left_description', CHtml::listData($attribute->options, 'value', 'label'), array('nowrapper'=>true, 'empty' => '-- '.$attribute->label.' --', 'class' => 'textMacro'));
					}?>
				</div>
				<?php echo $form->textArea($element, 'left_description', array('rows' => "1", 'cols' => "40", 'class' => 'autosize', 'nowrapper'=>true)) ?>
			</div>
		</div>
	</div>
</div>