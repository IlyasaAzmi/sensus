<?php

namespace app\models;

use Yii;
use yii\db\Expression;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "regions".
 *
 * @property int $id
 * @property string $name
 * @property string $created_at
 */
class Regions extends \yii\db\ActiveRecord
{

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['created_at'],
                ],
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'regions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['id'], 'integer'],
            [['created_at'], 'safe'],
            [['name'], 'string', 'max' => 50],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Nama Daerah',
            'created_at' => 'Created At',
            'totalIncome' => 'Total Income',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerson()
    {
        return $this->hasMany(Person::className(), ['region_id' => 'id']);
    }

    public function getPersonCount()
    {
        return $this->hasMany(Person::classname(), ['region_id' => 'id']) -> count();
    }

    public function getTotalIncome()
    {
        return $this->hasMany(Person::className(), ['region_id' => 'id'])->sum('income');
    }

    public function getAverageIncome()
    {
        return $this->hasMany(Person::className(), ['region_id' => 'id'])->average('income');
    }
}
