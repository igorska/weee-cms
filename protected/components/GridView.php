<?php
Yii::import('zii.widgets.grid.CGridView');

/**
 * @author Troy <troytft@gmail.com>
 */
class GridView extends CGridView
{

    public $cssFile = '/css/gridview/styles.css';
    public $template = "{items}\n{summary}\n{pager}";

}
