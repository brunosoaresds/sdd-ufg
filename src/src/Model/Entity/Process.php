<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Process Entity.
 *
 * @property int $id
 * @property \Cake\I18n\Time $initial_date
 * @property \Cake\I18n\Time $teacher_intent_date
 * @property \Cake\I18n\Time $primary_distribution_date
 * @property \Cake\I18n\Time $substitute_intent_date
 * @property \Cake\I18n\Time $secondary_distribution_date
 * @property \Cake\I18n\Time $final_date
 * @property \App\Model\Entity\Clazze[] $clazzes
 * @property \App\Model\Entity\ProcessConfiguration[] $process_configurations
 */
class Process extends Entity
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

    public function _getDisplayStatus() {
        if ($this->status == 'CANCELLED') {
            return '<span class="label label-danger">Cancelado</span>';
        } else if ($this->status == 'CLOSED') {
            return '<span class="label label-default">Fechado</span>';
        }
        return '<span class="label label-success">Aberto</span>';
    }
}
