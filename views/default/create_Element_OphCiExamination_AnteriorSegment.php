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
	data-element-type-name="<?php echo $element->elementType->name ?>"
	data-element-display-order="<?php echo $element->elementType->display_order ?>">
	<a href="#" class="removeElement">Remove</a>
	<h4 class="elementTypeName">
		<?php echo $element->elementType->name; ?>
	</h4>
	<div class="clearfix">
		<?php
		$this->widget('application.modules.eyedraw.OEEyeDrawWidget', array(
				'identifier' => $element->elementType->id,
				'side' => 'R',
				'mode' => 'edit',
				'size' => 300,
				'model' => $element,
				'attribute' => 'eyedraw',
				'doodleToolBarArray' => array(
						'NuclearCataract',
						'CorticalCataract',
						'PostSubcapCataract',
						'PCIOL',
						'ACIOL',
						'Bleb',
						'PI',
						'Fuchs',
						'RK',
						'LasikFlap',
						'CornealScar',
				),
				'onLoadedCommandArray' => array(
						array('addDoodle', array('AntSeg')),
						array('deselectDoodles', array()),
				),
		));
		?>
		<button class="ed_report">Report</button>
		<button class="ed_clear">Clear</button>
		<?php echo CHtml::activeTextArea($element, 'description', array('rows' => "2", 'cols' => "30", 'class' => 'autosize ed_description')) ?>
		<?php echo CHtml::activeTextField($element, 'diagnosis_id', array('class' => 'ed_diagnosis')) ?>
		</div>
</div>
