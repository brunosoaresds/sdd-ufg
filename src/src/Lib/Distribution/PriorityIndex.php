<?php

namespace App\Lib\Distribution;

use Cake\ORM\TableRegistry;

class PriorityIndex
{
	/**
	* Quais os critérios/propriedades levados em conta para gerar o indice de prioridade
	*/

    public static function generatePriorityIndex($teachers)
    {
        $teachers = self::initializePriorityIndex($teachers);
        $teachers = self::priorityIndexByWorkload($teachers);
        $teachers = self::priorityIndexBySituation($teachers);
        return $teachers;
    }
	
	public static function initializePriorityIndex($teachers)
    {
        foreach($teachers as &$teacher){
			$teacher['priorityIndex'] = 0;
		}
        return $teachers;
    }
	
	public static function priorityIndexByWorkload($teachers)
    {
        foreach($teachers as &$teacher){
			if($teacher['workload'] === 40){
				$teacher['priorityIndex']++;
			}
		}
        return $teachers;
    }
	
	public static function priorityIndexBySituation($teachers)
    {
        foreach($teachers as &$teacher){
			if($teacher['situation'] === 'situation1'){
				$teacher['priorityIndex']++;
			}
		}
        return $teachers;
    }
}