<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Clazze Entity.
 *
 * @property int $id
 * @property string $name
 * @property int $vacancies
 * @property int $subject_id
 * @property \App\Model\Entity\Subject $subject
 * @property int $schedule_id
 * @property \App\Model\Entity\Schedule $schedule
 * @property int $local_id
 * @property \App\Model\Entity\Local $local
 * @property int $process_id
 * @property \App\Model\Entity\Process $process
 * @property \App\Model\Entity\Teacher[] $teachers
 */
class Clazze extends Entity
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
