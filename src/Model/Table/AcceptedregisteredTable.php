<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Acceptedregistered Model
 *
 * @method \App\Model\Entity\Acceptedregistered get($primaryKey, $options = [])
 * @method \App\Model\Entity\Acceptedregistered newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Acceptedregistered[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Acceptedregistered|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Acceptedregistered patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Acceptedregistered[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Acceptedregistered findOrCreate($search, callable $callback = null, $options = [])
 */
class AcceptedregisteredTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('acceptedregistered');
        $this->setDisplayField('PIDM');
        $this->setPrimaryKey('PIDM');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->scalar('PIDM')
            ->allowEmpty('PIDM', 'create');

        $validator
            ->scalar('STUDENT_ID')
            ->allowEmpty('STUDENT_ID');

        $validator
            ->scalar('sAMAccountName')
            ->requirePresence('sAMAccountName', 'create')
            ->notEmpty('sAMAccountName');

        $validator
            ->scalar('LAST_NAME')
            ->allowEmpty('LAST_NAME');

        $validator
            ->scalar('FIRST_NAME')
            ->allowEmpty('FIRST_NAME');

        $validator
            ->scalar('MI')
            ->allowEmpty('MI');

        $validator
            ->scalar('MAJR_DESC')
            ->allowEmpty('MAJR_DESC');

        $validator
            ->scalar('MAJR_CODE')
            ->allowEmpty('MAJR_CODE');

        $validator
            ->scalar('UPN')
            ->allowEmpty('UPN');

        $validator
            ->scalar('CN')
            ->allowEmpty('CN');

        $validator
            ->scalar('PASSWORD')
            ->allowEmpty('PASSWORD');

        $validator
            ->scalar('DISPLAY_NAME')
            ->allowEmpty('DISPLAY_NAME');

        $validator
            ->scalar('mail')
            ->allowEmpty('mail');

        $validator
            ->scalar('CAMPUS')
            ->allowEmpty('CAMPUS');

        $validator
            ->scalar('uDCIdentifier')
            ->requirePresence('uDCIdentifier', 'create')
            ->notEmpty('uDCIdentifier');

        $validator
            ->scalar('Birthday')
            ->requirePresence('Birthday', 'create')
            ->notEmpty('Birthday');

        $validator
            ->scalar('bannerId')
            ->allowEmpty('bannerId');

        $validator
            ->scalar('AddToGroup')
            ->allowEmpty('AddToGroup');

        return $validator;
    }
}
