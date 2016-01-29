<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TeachersChangeHistory Entity.
 *
 * @property int $id
 * @property \Cake\I18n\Time $modification_date
 * @property string $name
 * @property string $registry
 * @property string $url_lattes
 * @property \Cake\I18n\Time $entry_date
 * @property string $formation
 * @property int $workload
 * @property string $about
 * @property string $rg
 * @property string $cpf
 * @property \Cake\I18n\Time $birth_date
 * @property string $situation
 * @property int $teacher_id
 * @property \App\Model\Entity\Teacher $teacher
 */
class TeachersChangeHistory extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
