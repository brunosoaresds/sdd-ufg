<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;

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

    /**
     * Gets the Scheduled locals of clazz
     *
     * @return array
     */
    public function _getScheduledLocals() {
        if(!isset($this->locals) || empty($this->locals)) {
            return [];
        }

        $scheduleIds = [];
        foreach($this->locals as $local) {
            if(!in_array($local->_joinData->schedule_id, $scheduleIds)) {
                $scheduleIds[$local->_joinData->schedule_id][] = $local;
            }
        }

        $scheduleModel = TableRegistry::get('Schedules');
        $schedules = $scheduleModel->find('all')->where(['Schedules.id IN' => array_keys($scheduleIds)]);

        $scheduledLocals = [];
        foreach($schedules as $schedule) {

            $scheduledLocals[] = [
                'schedule' => $schedule,
                'local' => $scheduleIds[$schedule->id]
            ];
        }

        return $scheduledLocals;
    }
}
