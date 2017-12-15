<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Acceptedregistered Entity
 *
 * @property string $PIDM
 * @property string $STUDENT_ID
 * @property string $sAMAccountName
 * @property string $LAST_NAME
 * @property string $FIRST_NAME
 * @property string $MI
 * @property string $MAJR_DESC
 * @property string $MAJR_CODE
 * @property string $UPN
 * @property string $CN
 * @property string $PASSWORD
 * @property string $DISPLAY_NAME
 * @property string $mail
 * @property string $CAMPUS
 * @property string $uDCIdentifier
 * @property string $Birthday
 * @property string $bannerId
 * @property string $AddToGroup
 */
class Acceptedregistered extends Entity
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
        'STUDENT_ID' => true,
        'sAMAccountName' => true,
        'LAST_NAME' => true,
        'FIRST_NAME' => true,
        'MI' => true,
        'MAJR_DESC' => true,
        'MAJR_CODE' => true,
        'UPN' => true,
        'CN' => true,
        'PASSWORD' => true,
        'DISPLAY_NAME' => true,
        'mail' => true,
        'CAMPUS' => true,
        'uDCIdentifier' => true,
        'Birthday' => true,
        'bannerId' => true,
        'AddToGroup' => true
    ];
}
