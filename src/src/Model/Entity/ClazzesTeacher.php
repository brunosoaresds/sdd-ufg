<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ClazzesTeacher Entity.
 *
 * @property int $clazz_id
 * @property \App\Model\Entity\Clazze $clazze
 * @property int $teacher_id
 * @property \App\Model\Entity\Teacher $teacher
 * @property string $status
 */
class ClazzesTeacher extends Entity
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
        'clazz_id' => false,
        'teacher_id' => false,
    ];
}
