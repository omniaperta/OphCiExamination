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
<h2>Diagnoses</h2>
<div class="details">
	<div class="cols2 clearfix">
		<div class="left">
			<?php if ($principal = OphCiExamination_Diagnosis::model()->find('element_diagnoses_id=? and principal=1 and eye_id in (2,3)',array($element->id))) {?>
				<div>
					<strong>
						<?php echo $principal->eye->adjective?>
						<?php echo $principal->disorder->term?>
					</strong>
				</div>
			<?php }?>
			<?php foreach (OphCiExamination_Diagnosis::model()->findAll('element_diagnoses_id=? and principal=0 and eye_id in (2,3)',array($element->id)) as $diagnosis) {?>
				<div>
					<?php echo $diagnosis->eye->adjective?>
					<?php echo $diagnosis->disorder->term?>
				</div>
			<?php }?>
		</div>
		<div class="right">
			<?php if ($principal = OphCiExamination_Diagnosis::model()->find('element_diagnoses_id=? and principal=1 and eye_id in (1,3)',array($element->id))) {?>
				<div>
					<strong>
						<?php echo $principal->eye->adjective?>
						<?php echo $principal->disorder->term?>
					</strong>
				</div>
			<?php }?>
			<?php foreach (OphCiExamination_Diagnosis::model()->findAll('element_diagnoses_id=? and principal=0 and eye_id in (1,3)',array($element->id)) as $diagnosis) {?>
				<div>
					<?php echo $diagnosis->eye->adjective?>
					<?php echo $diagnosis->disorder->term?>
				</div>
			<?php }?>
		</div>
	</div>
</div>
