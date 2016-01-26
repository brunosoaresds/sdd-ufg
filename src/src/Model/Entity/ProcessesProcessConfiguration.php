<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProcessesProcessConfiguration Entity.
 *
 * @property int $process_id
 * @property \App\Model\Entity\Process $process
 * @property int $process_configuration_id
 * @property \App\Model\Entity\ProcessConfiguration $process_configuration
 */
class ProcessesProcessConfiguration extends Entity
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
        'process_id' => false,
        'process_configuration_id' => false,
    ];
}
