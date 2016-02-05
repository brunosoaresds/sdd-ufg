<?php

namespace App\Lib\Distribution;

use Cake\ORM\TableRegistry;

class Distribution
{
	/**
	* Falta saber o qual o fator limitante de cada prof.
	* Falta saber como manipular para inserir no banco.
	*/
    public static function generateDistribution($clazzes, $teachers)
    {
		foreach($clazzes as &$clazz){
			if(!empty($clazz['teachers'])){
				continue;
			}
			$teachersByKnowledge = self::getTeacherByKnowledge($clazz['subject']['knowledge_id'], $teachers);
			if(count($teachersByKnowledge) > 1){
				$clazz['teachers'] = self::getTeacherByAge($teachers);
			}else if(count($teachersByKnowledge) == 1){
				$clazz['teachers'] = $teachersByKnowledge;
			}else{
				$clazz['teachers'] = self::randomTeacher($teachers);
			}
		}
		
        return $clazzes;
    }

	public static function getTeacherByKnowledge($knowledgeId, $teachers){
		$teachersByKnowledge = [];
		foreach($teachers as $teacher){
			foreach($teacher['knowledges'] as $knowledge){
				if($knowledge['id'] == $knowledgeId){
					$teachersByKnowledge[] = $teacher;
				}
			}
		}
		return $teachersByKnowledge;
	}
	
	public static function getTeacherByAge($teachers){
		usort($teachers, ['App\Lib\Distribution\Distribution', 'sortByBirthDate']);
		return $teachers[0];
	}
	
	public static function sortByBirthDate($teacher1, $teacher2)
    {
        if ($teacher1['birth_date'] === $teacher2['birth_date']) {
            return 0;
        }
        return strtotime($teacher1['birth_date']) < strtotime($teacher2['birth_date']) ? -1 : 1;
    }
	
	public static function randomTeacher($teachers){
		return $teachers[rand(0, count($teachers) - 1)];
	}
}