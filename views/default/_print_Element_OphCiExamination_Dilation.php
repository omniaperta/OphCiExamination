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
<h2>Dilation</h2>
<div class="details">
	<div class="cols2 clearfix">
		<div class="left eventDetail">
			<?php if ($element->hasRight()) {?>
				<span>Dilation given at <?php echo date('H:i', strtotime($element->right_time)); ?></span>
				<div class="grid-view dilation_table">
					<table>
						<thead>
							<tr>
								<th>Drug</th>
								<th style="width: 50px;">Drops</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($element->right_treatments as $treatment) {
								$this->renderPartial('_view_Element_OphCiExamination_Dilation_Treatment',array('treatment'=>$treatment));
							}?>
						</tbody>
					</table>
				</div>
			<?php }else{?>
				<span>None given.</span>
			<?php }?>
		</div>
		<div class="right eventDetail">
			<?php if ($element->hasLeft()) {?>
				<span>Dilation given at <?php echo date('H:i', strtotime($element->left_time)); ?></span>
				<div class="grid-view dilation_table">
					<table>
						<thead>
							<tr>
								<th>Drug</th>
								<th style="width: 50px;">Drops</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($element->left_treatments as $treatment) {
								$this->renderPartial('_view_Element_OphCiExamination_Dilation_Treatment',array('treatment'=>$treatment));
							}?>
						</tbody>
					</table>
				</div>
			<?php }else{?>
				<span>None given</span>
			<?php }?>
		</div>
	</div>
</div>