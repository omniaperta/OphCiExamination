<?php
/**
 * OpenEyes
 *
 * (C) Moorfields Eye Hospital NHS Foundation Trust, 2008-2011
 * (C) OpenEyes Foundation, 2011-2013
 * This file is part of OpenEyes.
 * OpenEyes is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
 * OpenEyes is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with OpenEyes in a file titled COPYING. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package OpenEyes
 * @link http://www.openeyes.org.uk
 * @author OpenEyes <info@openeyes.org.uk>
 * @copyright Copyright (c) 2008-2011, Moorfields Eye Hospital NHS Foundation Trust
 * @copyright Copyright (c) 2011-2013, OpenEyes Foundation
 * @license http://www.gnu.org/licenses/gpl-3.0.html The GNU General Public License V3.0
 */

$glaucomaStatus =
	CHtml::listData(\OEModule\OphCiExamination\models\OphCiExamination_GlaucomaStatus::model()
		->findAll(array('order'=> 'display_order asc')),'id','name');

$dropRelatProblem = CHtml::listData(\OEModule\OphCiExamination\models\OphCiExamination_DropRelProb::model()
	->findAll(array('order'=> 'display_order asc')),'id','name');

$dropsIds =  CHtml::listData(\OEModule\OphCiExamination\models\OphCiExamination_Drops::model()
	->findAll(array('order'=> 'display_order asc')),'id','name');

$surgeryIds = CHtml::listData(\OEModule\OphCiExamination\models\OphCiExamination_ManagementSurgery::model()
	->findAll(array('order'=> 'display_order asc')),'id','name');

$iop = $element->getLatestIOP($this->patient);
Yii::app()->clientScript->registerScriptFile("{$this->assetPath}/js/CurrentManagement.js", CClientScript::POS_HEAD);

?>

<section class="element <?php echo $element->elementType->class_name?>"
	data-element-type-id="<?php echo $element->elementType->id?>"
	data-element-type-class="<?php echo $element->elementType->class_name?>"
	data-element-type-name="<?php echo $element->elementType->name?>"
	data-element-display-order="<?php echo $element->elementType->display_order?>">
	<div class="element-fields row">
		<script type="text/javascript">
			var previous_iop = <?php echo json_encode($iop)?>;
		</script>
		<?php echo $form->hiddenInput($element, 'eye_id', false, array('class' => 'sideField')); ?>
		<div class="field-row row">
			<div class="column large-3">
				<h3>Referral:</h3>
				<?php echo $form->checkBox($element, 'other_service',array(), array('label'=>8, 'field'=>4))?>
				<?php echo $form->checkBox($element, 'refraction',array(), array('label'=>8, 'field'=>4))?>
				<?php echo $form->checkBox($element, 'lva',array(), array('label'=>8, 'field'=>4))?>
				<?php echo $form->checkBox($element, 'orthoptics',array(), array('label'=>8, 'field'=>4))?>
				<?php echo $form->checkBox($element, 'cl_clinic',array(), array('label'=>8, 'field'=>4))?>
			</div>
			<div class="column large-3 end">
				<h3>Investigations:</h3>
				<?php echo $form->checkBox($element, 'vf',array(), array('label'=>8, 'field'=>4))?>
				<?php echo $form->checkBox($element, 'us',array(), array('label'=>8, 'field'=>4))?>
				<?php echo $form->checkBox($element, 'biometry',array(), array('label'=>8, 'field'=>4))?>
				<?php echo $form->checkBox($element, 'oct',array(), array('label'=>8, 'field'=>4))?>
				<?php echo $form->checkBox($element, 'hrt',array(), array('label'=>8, 'field'=>4))?>
				<?php echo $form->checkBox($element, 'disc_photos',array(), array('label'=>8, 'field'=>4))?>
				<?php echo $form->checkBox($element, 'edt',array(), array('label'=>8, 'field'=>4))?>
			</div>
		</div>
	</div>
	<div class="element-fields element-eyes row">
		<div class="element-eye right-eye column left side<?php if (!$element->hasRight()) {?> inactive<?php }?>" data-side="right">
			<div class="active-form">
				<a href="#" class="icon-remove-side remove-side">Remove side</a>
				<div id="div_OEModule_OphCiExamination_models_Element_OphCiExamination_CurrentManagementPlan_right_iop_id" class="row field-row">
					<div class="large-3 column"><label>IOP:</label></div>
					<div class="large-8 column end" id="OEModule_OphCiExamination_models_Element_OphCiExamination_CurrentManagementPlan_right_iop"><?php echo ($iop == null ) ? 'N/A' : $iop['rightIOP'] . ' mmHg'?></div>
				</div>
				<?php echo $form->dropDownList($element, 'right_glaucoma_status_id',$glaucomaStatus,array('empty' => '- Please Select -'),false , array('label'=>3, 'field'=>8))?>
				<?php echo $form->dropDownList($element, 'right_drop-related_prob_id',$dropRelatProblem,array(),false , array('label'=>3, 'field'=>8))?>
				<?php echo $form->dropDownList($element, 'right_drops_id', $dropsIds ,array('empty'=>'- Please select -'),false , array('label'=>3, 'field'=>8))?>
				<?php echo $form->dropDownList($element, 'right_surgery_id', $surgeryIds,array('empty'=>'N/A'),false , array('label'=>3, 'field'=>8))?>
			</div>
			<div class="inactive-form">
				<div class="add-side">
					<a href="#">
						Add right side <span class="icon-add-side"></span>
					</a>
				</div>
			</div>
		</div>
		<div class="element-eye left-eye column right side<?php if (!$element->hasLeft()) {?> inactive<?php }?>" data-side="left">
			<div class="active-form">
				<a href="#" class="icon-remove-side remove-side">Remove side</a>
				<div id="div_OEModule_OphCiExamination_models_Element_OphCiExamination_CurrentManagementPlan_left_iop_id" class="row field-row">
					<div class="large-3 column"><label>IOP:</label></div>
					<div class="large-8 column end" id="OEModule_OphCiExamination_models_Element_OphCiExamination_CurrentManagementPlan_left_iop"><?php echo ( $iop == null )?'N/A': $iop['leftIOP'].' mmHg'?></div>
				</div>
				<?php echo $form->dropDownList($element, 'left_glaucoma_status_id',$glaucomaStatus,array('empty' => '- Please Select -'),false , array('label'=>3, 'field'=>8))?>
				<?php echo $form->dropDownList($element, 'left_drop-related_prob_id',$dropRelatProblem,array(),false , array('label'=>3, 'field'=>8))?>
				<?php echo $form->dropDownList($element, 'left_drops_id', $dropsIds ,array('empty'=>'- Please select -'),false , array('label'=>3, 'field'=>8))?>
				<?php echo $form->dropDownList($element, 'left_surgery_id', $surgeryIds,array('empty'=>'N/A'),false , array('label'=>3, 'field'=>8))?>
			</div>
			<div class="inactive-form">
				<div class="add-side">
					<a href="#">
						Add left side <span class="icon-add-side"></span>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>