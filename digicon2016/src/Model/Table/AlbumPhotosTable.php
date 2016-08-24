<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AlbumPhotos Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Albums
 *
 * @method \App\Model\Entity\AlbumPhoto get($primaryKey, $options = [])
 * @method \App\Model\Entity\AlbumPhoto newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AlbumPhoto[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AlbumPhoto|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AlbumPhoto patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AlbumPhoto[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AlbumPhoto findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AlbumPhotosTable extends Table
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

        $this->table('album_photos');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Albums', [
            'foreignKey' => 'album_id'
        ]);
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('description');

        $validator
            ->dateTime('shooted')
            ->allowEmpty('shooted');

        $validator
            ->allowEmpty('lat');

        $validator
            ->allowEmpty('lng');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['album_id'], 'Albums'));

        return $rules;
    }

    public function beforeSave($event, $entity, $options)
    {
        // 更新時はスルー
        if (isset($entity['id'])) {
            return ;
        }

        // Tips: とりあえずexif取れない時は日本の原点
        $lat = '35.658055556';
        $lng = '139.741111111';
        $shooted = date('Y-m-d H:i:s');

        $exif = @exif_read_data($entity->tmp_name);
        if (!empty($exif)) {
            // Tips: 北半球か南半球かは知らない。
            if (!empty($exif['GPSLatitude']) && !empty($exif['GPSLongitude'])) {
                $lat = $this->__convertGPS($exif['GPSLatitude']);
                $lng = $this->__convertGPS($exif['GPSLongitude']);
            }

            if (!empty($exif['DateTime'])) {
                $shooted = date('Y-m-d H:i:s', strtotime($exif['DateTime']));
            }
        }
        $entity->set('lat', $lat);
        $entity->set('lng', $lng);
        $entity->set('shooted', $shooted);
    }

    public function afterSave($event, $entity, $options)
    {
        // Tips: cd WWW_ROOT && mkdir album_photos && chmod 777 album_photos
        move_uploaded_file($entity->tmp_name, WWW_ROOT . 'album_photos' . DS . $entity->id . '.jpg');
    }

    private function __convertGPS($position)
    {
        return $this->__convertGPSPosition($position[0])
            + $this->__convertGPSPosition($position[1]) / 60
            + $this->__convertGPSPosition($position[2]) / 3600;
    }

    private function __convertGPSPosition($str)
    {
        $params = explode('/', $str);
        return isset($params[1]) ? $params[0] / $params[1] : $str;
    }
}
