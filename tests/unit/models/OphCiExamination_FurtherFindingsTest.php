<?php
/**
 * OpenEyes
 *
 * (C) OpenEyes Foundation, 2014
 * This file is part of OpenEyes.
 * OpenEyes is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
 * OpenEyes is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with OpenEyes in a file titled COPYING. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package OpenEyes
 * @link http://www.openeyes.org.uk
 * @author OpenEyes <info@openeyes.org.uk>
 * @copyright Copyright (c) 2014, OpenEyes Foundation
 * @license http://www.gnu.org/licenses/gpl-3.0.html The GNU General Public License V3.0
 */

class OphCiExamination_FurtherFindingsTest extends CDbTestCase {
	public $fixtures = array(
		'furtherFindings' => 'OEModule\OphCiExamination\models\OphCiExamination_FurtherFindings',
		'furtherFindingsSubspecAssignment' => ':ophciexamination_further_findings_subspec_assignment',
		'subspecialty' => '\Subspecialty'
	);

	protected function setUp() {
		parent::setUp();
	}

	public function testBySubspecialty()
	{
		$findingsBySubspecialty = OEModule\OphCiExamination\models\OphCiExamination_FurtherFindings::model()
			->bySubspecialty($this->subspecialty('subspecialty1'))->findAll();

		$this->assertCount(2, $findingsBySubspecialty);

		foreach($findingsBySubspecialty as $findingsBySubspecialty){
			$this->assertNotEquals('Not active option', $findingsBySubspecialty->name);
		}
	}

}