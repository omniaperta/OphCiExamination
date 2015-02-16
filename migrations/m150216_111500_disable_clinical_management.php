<?php

class m150216_111500_disable_clinical_management extends  OEMigration
{
	public function safeUp()
	{
		$management_id = $this->dbConnection->createCommand('select id from element_type where class_name = :management')->queryScalar(array(
			':management' => 'OEModule\OphCiExamination\models\Element_OphCiExamination_Management'
		));
		$this->delete('setting_metadata', 'element_type_id = :id', array(':id' => $management_id));
		$child_ids = $this->dbConnection->createCommand('select id from element_type where parent_element_type_id = :management_id')->queryColumn(array(
			':management_id' => $management_id
		));
		foreach($child_ids as $id) {
			$this->delete('setting_metadata', 'element_type_id = :id', array(':id' => $id));
		}
		$this->delete('element_type', 'parent_element_type_id = :management_id', array(':management_id' => $management_id));
		$this->delete('element_type', 'id = :management_id', array(':management_id' => $management_id));
	}

	public function safeDown()
	{
		return false;
	}

}