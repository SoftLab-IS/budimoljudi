<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	public $locationMenu=array(
		array('label'=>'Države', 'url'=>array('state/admin')),
		array('label'=>'Regije', 'url'=>array('region/admin')),
		array('label'=>'Gradovi', 'url'=>array('city/admin')),
		);
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();

    /**
     * @var array meta data
     */
    public $meta = array(
        'title' => 'Budimo Ljudi - Pomozimo onima kojima je pomoć potrebna',
        'description' => 'Servis za organizovanje volonterskih akcija pomoći ugroženom stanovništvu',
        'keywords' => 'volonter, pomoc, humanost, akcija pomoci',
        'image' => 'social-thumb.jpg',
        'url' => 'http://budimoljudi.com',
    );
}