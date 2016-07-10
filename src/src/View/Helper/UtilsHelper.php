<?php

namespace App\View\Helper;

use Cake\Event\Event;
use Cake\View\Helper;
use Cake\Controller\Component;

class UtilsHelper extends Helper
{
    public function daysOfWeek() {
		return [
		    '' => '[Selecione]',
            1 => 'Domingo',
			2 => 'Segunda-Feira',
			3 => 'Terça-Feira',
			4 => 'Quarta-Feira',
			5 => 'Quinta-Feira',
			6 => 'Sexta-Feira',
			7 => 'Sábado'
        ];

	}
}
