<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Appliedstudents Model
 *
 * @method \App\Model\Entity\Appliedstudent get($primaryKey, $options = [])
 * @method \App\Model\Entity\Appliedstudent newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Appliedstudent[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Appliedstudent|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Appliedstudent patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Appliedstudent[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Appliedstudent findOrCreate($search, callable $callback = null, $options = [])
 */
class AppliedstudentsTable extends Table
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

        $this->setTable('appliedstudents');
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
            ->scalar('MAIL')
            ->allowEmpty('MAIL');

        $validator
            ->scalar('CAMPUS')
            ->allowEmpty('CAMPUS');

        $validator
            ->scalar('uDCIdentifier')
            ->requirePresence('uDCIdentifier', 'create')
            ->notEmpty('uDCIdentifier');

        $validator
            ->scalar('BIRTHDAY')
            ->requirePresence('BIRTHDAY', 'create')
            ->notEmpty('BIRTHDAY');

        $validator
            ->scalar('bannerId')
            ->allowEmpty('bannerId');

        $validator
            ->scalar('AddToGroup')
            ->allowEmpty('AddToGroup');

        return $validator;
    }
}
