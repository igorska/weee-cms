<?php
/**
 * This is the template for generating the model class of a specified table.
 * - $this: the ModelCode object
 * - $tableName: the table name for this class (prefix is already removed if necessary)
 * - $modelClass: the model class name
 * - $columns: list of table columns (name=>CDbColumnSchema)
 * - $labels: list of attribute labels (name=>label)
 * - $rules: list of validation rules
 * - $relations: list of relations (name=>relation declaration)
 */
?>
<?php echo "<?php\n"; ?>

/**
 * Модель для таблицы "<?php echo $tableName; ?>".
 *
<?php foreach($columns as $column): ?>
 * @property <?php echo $column->type.' $'.$column->name."\n"; ?>
<?php endforeach; ?>
<?php if(!empty($relations)): ?>
<?php foreach($relations as $name=>$relation): ?>
 * @property <?php
	if (preg_match("~^array\(self::([^,]+), '([^']+)', '([^']+)'\)$~", $relation, $matches))
    {
        $relationType = $matches[1];
        $relationModel = $matches[2];

        switch($relationType){
            case 'HAS_ONE':
                echo $relationModel.' $'.$name."\n";
            break;
            case 'BELONGS_TO':
                echo $relationModel.' $'.$name."\n";
            break;
            case 'HAS_MANY':
                echo $relationModel.'[] $'.$name."\n";
            break;
            case 'MANY_MANY':
                echo $relationModel.'[] $'.$name."\n";
            break;
            default:
                echo 'mixed $'.$name."\n";
        }
	}
    ?>
<?php endforeach; ?>
<?php endif; ?>
 */
class <?php echo $modelClass; ?> extends <?php echo $this->baseClass."\n"; ?>
{
    /**
     * Возращает экземпляр модели
     * @param string $className Название модели
     * @return <?php echo $modelClass; ?>
     
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return string Название таблицы
     */
    public function tableName()
    {
        return '<?php echo $tableName; ?>';
    }
    
    /**
     * @return string Название модели
     */
    public function name() 
    {
        return '<?php echo $this->pluralize($this->class2name($modelClass)); ?>';
    }

    /**
     * @return array Массив правил валидации для атрибутов модели
     */
    public function rules()
    {
        return array(
<?php foreach($rules as $rule): ?>
            <?php echo $rule.",\n"; ?>
<?php endforeach; ?>
            array('<?php echo implode(', ', array_keys($columns)); ?>', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array Связи
     */
    public function relations()
    {
        return array(
<?php foreach($relations as $name=>$relation): ?>
            <?php echo "'$name' => $relation,\n"; ?>
<?php endforeach; ?>
        );
    }

    /**
     * @return array Лейблы
     */
    public function attributeLabels()
    {
        return array(
<?php foreach($labels as $name=>$label): ?>
            <?php echo "'$name' => '$label',\n"; ?>
<?php endforeach; ?>
        );
    }

    /**
     * @return CActiveDataProvider 
     */
    public function search()
    {
        $criteria = new CDbCriteria;

    <?php foreach($columns as $name=>$column): ?>
    <?php if($column->type==='string')
    {
        echo "\$criteria->compare('$name', \$this->$name, true);\n";
    }
    else
    {
        echo "\$criteria->compare('$name', \$this->$name);\n";
    } ?>
    <?php endforeach; ?>

        return new CActiveDataProvider($this, array(
                'criteria' => $criteria,
        ));
    }
}