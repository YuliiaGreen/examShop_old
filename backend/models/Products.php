<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property string $title
 * @property string $body
 * @property int $price
 * @property int $image_id
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $deleted_at
 *
 * @property ProductsCategories[] $productsCategories
 * @property Categories[] $categories
 */
class Products extends \yii\db\ActiveRecord
{
    public $selected_categories;

    public function getStatusList()
    {
        return $statusList = ['0' => 'Inactive', '1' => 'Active', '2' => 'Deleted'];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'body', 'price', 'selected_categories'], 'required'],
            [['body'], 'string'],
//            [['selected_categories'],'integer' ],
            [['selected_categories', 'statusList'], 'safe'],
//            TODO validate is integer
            [['price', 'image_id', 'status', 'created_at', 'updated_at', 'deleted_at'], 'integer'],
            [['title'], 'string', 'max' => 225],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'body' => 'Body',
            'price' => 'Price',
            'image_id' => 'Image ID',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductsCategories()
    {
        return $this->hasMany(ProductsCategories::className(), ['products_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Categories::className(), ['id' => 'categories_id'])->viaTable('products_categories', ['products_id' => 'id']);
    }

    public function getAllCategoriesAsArray(){
        $categories = \app\models\Categories::find()->all();
        $dropdownData = \yii\helpers\ArrayHelper::map($categories,'id','title');
        return $dropdownData;
        //print_r($dropdownData);
    }

    public function afterSave($insert, $changedAttributes)
    {
        if ($insert==false) {
            $this->unlinkAll('categories', true);
        }
            foreach ($this->selected_categories as $category_id) {
                $temp=Categories::findOne($category_id);
                $this->link('categories', $temp);
            }

        parent::afterSave($insert, $changedAttributes);
        // TODO: Change the autogenerated stub
    }

    public function delete()
    {

    }

}
