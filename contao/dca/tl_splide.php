<?php

declare(strict_types=1);

/*
 * This file is part of Contao Splide.
 *
 * (c) Hamid Peywasti 2024 <hamid@respinar.com>
 *
 * @license MIT
 */

use Contao\System;
use Contao\BackendUser;
use Contao\DC_Table;
use Contao\DataContainer;


/**
 * Table tl_splide
 */
$GLOBALS['TL_DCA']['tl_splide'] = array
(

	// Config
	'config' => array
	(
		'dataContainer'    => DC_Table::class,
		'enableVersioning' => true,
		'sql' => array
		(
			'keys' => array
			(
				'id' => 'primary'
			)
		)
	),

	// List
	'list' => array
	(
		'sorting' => array
		(
			'mode'      => DataContainer::MODE_SORTABLE,
			'fields'    => array('title'),
			'flag'      => DataContainer::SORT_INITIAL_LETTER_ASC
		),
		'label' => array
		(
			'fields'    => array('title'),
			'format'    => '%s'
		),
		'global_operations' => array
		(
			'all' => array
			(
				'label'      => &$GLOBALS['TL_LANG']['MSC']['all'],
				'href'       => 'act=select',
				'class'      => 'header_edit_all',
				'attributes' => 'onclick="Backend.getScrollOffset();" accesskey="e"'
			)
		),
		'operations' => array
		(
			'edit' => array
			(
				'href'       => 'act=edit',
				'icon'       => 'edit.svg'
			),
			'copy' => array
			(
				'href'       => 'act=copy',
				'icon'       => 'copy.svg'
			),
			'delete' => array
			(
				'href'       => 'act=delete',
				'icon'       => 'delete.svg',
				'attributes' => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"'
			),
			'show' => array
			(
				'href'       => 'act=show',
				'icon'       => 'show.svg'
			)
		)
	),

	// Select
	'select' => array
	(
		'buttons_callback' => array()
	),

	// Edit
	'edit' => array
	(
		'buttons_callback' => array()
	),

	// Palettes
	'palettes' => array
	(
		'__selector__'  => array('pager'),
		'default'       => '{title_legend},title;{options_legend},mode,speed,slideMargin,startSlide,infiniteLoop,responsive,captions,randomStart,video,hideControlOnEnd,useCSS,oneToOneTouch,easing,preloadImages,ticker,adaptiveHeight,touchEnabled,preventDefaultSwipeX,preventDefaultSwipeY;{pager_legend},pager;{controls_legend},controls,autoControls;{auto_legend},auto;{carousel_legend:hide},minSlides,maxSlides,moveSlides,slideWidth;{keyboard_legend:hide},keyboardEnabled;{aria_legend:hide},ariaLive,ariaHidden;{class_legend:hide},wrapperClass;{protected_legend:hide},protected;'
	),

	// Subpalettes
	'subpalettes' => array
	(
        'pager'         => '',
	),

	// Fields
	'fields' => array
	(
		'id' => array
		(
			'sql'       => "int(10) unsigned NOT NULL auto_increment"
		),
		'tstamp' => array
		(
			'sql'       => "int(10) unsigned NOT NULL default 0"
		),
		'title' => array
		(
			'exclude'   => true,
			'inputType' => 'text',
			'eval'      => array('mandatory'=>true, 'maxlength'=>255, 'tl_class'=>'w50'),
			'sql'       => "varchar(255) NOT NULL default ''"
		),
		'type' => array
		(
			'exclude'   => true,
			'inputType' => 'select',
			'default'   => 'slide',
			'options'   => array('slide','loop','fade'),
			'eval'      => array('tl_class'=>'w50'),
			'sql'       => "varchar(64) NOT NULL default 'slide'"
		),
        'role' => array
		(
			'exclude'   => true,
			'inputType' => 'text',
            'default'   => 'region',
			'eval'      => array('maxlength'=>255, 'tl_class'=>'w50'),
			'sql'       => "varchar(255) NOT NULL default ''"
		),
        'label' => array
		(
			'exclude'   => true,
			'inputType' => 'text',
			'eval'      => array('maxlength'=>255, 'tl_class'=>'w50'),
			'sql'       => "varchar(255) NOT NULL default ''"
		),
        'labelledby' => array
		(
			'exclude'   => true,
			'inputType' => 'text',
			'eval'      => array('maxlength'=>255, 'tl_class'=>'w50'),
			'sql'       => "varchar(255) NOT NULL default ''"
		),
        'rewind' => array
		(
			'exclude'   => true,
			'inputType' => 'checkbox',
			'eval'      => array('tl_class'=>'w50'),
			'sql'       => array('type' => 'boolean', 'default' => false)
		),
		'speed' => array
		(
			'exclude'   => true,
			'default'   => 400,
			'inputType' => 'text',
			'eval'      => array('rgxp'=>'natural', 'tl_class'=>'w50'),
			'sql'       => "int(10) unsigned NOT NULL default 400"
		),
        'rewindSpeed' => array
		(
			'exclude'   => true,
			'inputType' => 'text',
			'eval'      => array('rgxp'=>'natural', 'tl_class'=>'w50'),
			'sql'       => "varchar(5) unsigned NOT NULL default ''"
		),
        'rewindByDrag' => array
		(
			'exclude'   => true,
			'inputType' => 'checkbox',
			'eval'      => array('tl_class'=>'w50'),
			'sql'       => array('type' => 'boolean', 'default' => false)
		),
        'width' => array
		(
			'exclude'   => true,
			'inputType' => 'text',
			'eval'      => array('tl_class'=>'w50'),
			'sql'       => "varchar(255) NOT NULL default ''"
		),
        'height' => array
		(
			'exclude'   => true,
			'inputType' => 'text',
			'eval'      => array('tl_class'=>'w50'),
			'sql'       => "varchar(255) NOT NULL default ''"
		),
        'fixedWidth' => array
		(
			'exclude'   => true,
			'inputType' => 'text',
			'eval'      => array('tl_class'=>'w50'),
			'sql'       => "varchar(255) NOT NULL default ''"
		),
        'fixedHeight' => array
		(
			'exclude'   => true,
			'inputType' => 'text',
			'eval'      => array('tl_class'=>'w50'),
			'sql'       => "varchar(255) NOT NULL default ''"
		),
        'heightRatio' => array
		(
			'exclude'   => true,
			'default'   => 400,
			'inputType' => 'text',
			'eval'      => array('rgxp'=>'digit', 'tl_class'=>'w50'),
			'sql'       => "smallint(5) unsigned NOT NULL default 400"
		),
        'autoWidth' => array
		(
			'exclude'   => true,
			'inputType' => 'checkbox',
			'eval'      => array('tl_class'=>'w50'),
			'sql'       => array('type' => 'boolean', 'default' => false)
		),
        'autoHeight' => array
		(
			'exclude'   => true,
			'inputType' => 'checkbox',
			'eval'      => array('tl_class'=>'w50'),
			'sql'       => array('type' => 'boolean', 'default' => false)
		),
        'start' => array
		(
			'exclude'   => true,
			'default'   => 0,
			'inputType' => 'text',
			'eval'      => array('rgxp'=>'natural', 'tl_class'=>'w50'),
			'sql'       => "smallint(5) unsigned NOT NULL default 0"
		),
        'perPage' => array
		(
			'exclude'   => true,
			'default'   => 1,
			'inputType' => 'text',
			'eval'      => array('rgxp'=>'natural', 'tl_class'=>'w50'),
			'sql'       => "smallint(5) unsigned NOT NULL default 1"
		),
        'perMove' => array
		(
			'exclude'   => true,
			'inputType' => 'text',
			'eval'      => array('rgxp'=>'natural', 'tl_class'=>'w50'),
			'sql'       => "varchar(5) NULL default ''"
		),
        'clones' => array
		(
			'exclude'   => true,
			'inputType' => 'text',
			'eval'      => array('rgxp'=>'natural', 'tl_class'=>'w50'),
			'sql'       => "varchar(5) NULL default ''"
		),
        'cloneStatus' => array
		(
			'exclude'   => true,
			'inputType' => 'checkbox',
			'eval'      => array('tl_class'=>'w50'),
			'sql'       => array('type' => 'boolean', 'default' => false)
		),
        'focus' => array
		(
			'exclude'   => true,
			'inputType' => 'text',
			'eval'      => array('tl_class'=>'w50'),
			'sql'       => "varchar(255) NOT NULL default ''"
		),
        'gap' => array
		(
			'exclude'   => true,
			'inputType' => 'text',
			'eval'      => array('tl_class'=>'w50'),
			'sql'       => "varchar(255) NOT NULL default ''"
		),
        'gap' => array
		(
			'exclude'   => true,
			'inputType' => 'trbl',
			'eval'      => array('tl_class'=>'w50'),
			'sql'       => "varchar(255) NOT NULL default ''"
		),
        'arrows' => array
		(
			'exclude'   => true,
			'inputType' => 'checkbox',
            'default'   => 1,
			'eval'      => array('tl_class'=>'w50'),
			'sql'       => array('type' => 'boolean', 'default' => true)
		),
        'pagination' => array
		(
			'exclude'   => true,
			'inputType' => 'checkbox',
            'default'   => 1,
			'eval'      => array('tl_class'=>'w50'),
			'sql'       => array('type' => 'boolean', 'default' => true)
		),
        'paginationKeyboard' => array
		(
			'exclude'   => true,
			'inputType' => 'checkbox',
            'default'   => 1,
			'eval'      => array('tl_class'=>'w50'),
			'sql'       => array('type' => 'boolean', 'default' => true)
		),
        'paginationDirection' => array
		(
			'exclude'   => true,
			'inputType' => 'select',
			'options'   => array('ltr', 'rtl', 'ttb'),
            'default'   => 'ltr',
			'eval'      => array('tl_class'=>'w50'),
			'sql'       => "varchar(64) NOT NULL default 'ltr'"
		),
        'easing' => array
		(
			'exclude'   => true,
			'inputType' => 'text',
			'eval'      => array('tl_class'=>'w50'),
			'sql'       => "varchar(255) NOT NULL default ''"
		),
        'easingFunc' => array
		(
			'exclude'   => true,
			'inputType' => 'text',
			'eval'      => array('tl_class'=>'w50'),
			'sql'       => "varchar(255) NOT NULL default ''"
		),
        'drag' => array
		(
			'exclude'   => true,
			'inputType' => 'select',
			'options'   => array('true', 'false', 'free'),
            'default'   => 'free',
			'eval'      => array('tl_class'=>'w50'),
			'sql'       => "varchar(64) NOT NULL default 'free'"
		),
        'snap' => array
		(
			'exclude'   => true,
			'inputType' => 'checkbox',
			'eval'      => array('tl_class'=>'w50'),
			'sql'       => array('type' => 'boolean', 'default' => false)
		),
        'noDrag' => array
		(
			'exclude'   => true,
			'inputType' => 'text',
			'eval'      => array('tl_class'=>'w50'),
			'sql'       => "varchar(255) NOT NULL default ''"
		),
        'dragMinThreshold' => array
		(
			'exclude'   => true,
			'inputType' => 'text',
			'eval'      => array('tl_class'=>'w50'),
			'sql'       => "varchar(255) NOT NULL default ''"
		),
        'flickPower' => array
		(
			'exclude'   => true,
			'default'   => 600,
			'inputType' => 'text',
			'eval'      => array('rgxp'=>'natural', 'tl_class'=>'w50'),
			'sql'       => "smallint(5) unsigned NOT NULL default 600"
		),
        'flickMaxPages' => array
		(
			'exclude'   => true,
			'default'   => 1,
			'inputType' => 'text',
			'eval'      => array('rgxp'=>'natural', 'tl_class'=>'w50'),
			'sql'       => "smallint(5) unsigned NOT NULL default 1"
		),
        'waitForTransition' => array
		(
			'exclude'   => true,
			'inputType' => 'checkbox',
			'eval'      => array('tl_class'=>'w50'),
			'sql'       => array('type' => 'boolean', 'default' => false)
		),
        'arrowPath' => array
		(
			'exclude'   => true,
			'inputType' => 'text',
			'eval'      => array('tl_class'=>'w50'),
			'sql'       => "varchar(255) NOT NULL default ''"
		),
        'autoplay' => array
		(
			'exclude'   => true,
			'inputType' => 'select',
			'options'   => array('true', 'false', 'pause'),
            'default'   => 'free',
			'eval'      => array('tl_class'=>'w50'),
			'sql'       => "varchar(64) NOT NULL default 'free'"
		),
        'interval' => array
		(
			'exclude'   => true,
			'default'   => 5000,
			'inputType' => 'text',
			'eval'      => array('rgxp'=>'natural', 'tl_class'=>'w50'),
			'sql'       => "smallint(5) unsigned NOT NULL default 5000"
		),
        'pauseOnHover' => array
		(
			'exclude'   => true,
			'inputType' => 'checkbox',
            'default'   => 1,
			'eval'      => array('tl_class'=>'w50'),
			'sql'       => array('type' => 'boolean', 'default' => true)
		),
        'pauseOnFocus' => array
		(
			'exclude'   => true,
			'inputType' => 'checkbox',
            'default'   => 1,
			'eval'      => array('tl_class'=>'w50'),
			'sql'       => array('type' => 'boolean', 'default' => true)
		),
        'resetProgress' => array
		(
			'exclude'   => true,
			'inputType' => 'checkbox',
            'default'   => 1,
			'eval'      => array('tl_class'=>'w50'),
			'sql'       => array('type' => 'boolean', 'default' => true)
		),
        'lazyLoad' => array
		(
			'exclude'   => true,
			'inputType' => 'select',
			'options'   => array('false', 'nearby','sequential'),
            'default'   => 'false',
			'eval'      => array('tl_class'=>'w50'),
			'sql'       => "varchar(64) NOT NULL default 'false'"
		),
        'preloadPages' => array
		(
			'exclude'   => true,
			'default'   => 1,
			'inputType' => 'text',
			'eval'      => array('rgxp'=>'natural', 'tl_class'=>'w50'),
			'sql'       => "smallint(5) unsigned NOT NULL default 5000"
		),
        'keyboard' => array
		(
			'exclude'   => true,
			'inputType' => 'select',
			'options'   => array('true', 'false', 'global','focused'),
            'default'   => 'true',
			'eval'      => array('tl_class'=>'w50'),
			'sql'       => "varchar(64) NOT NULL default 'true'"
		),
        'wheel' => array
		(
			'exclude'   => true,
			'inputType' => 'checkbox',
			'eval'      => array('tl_class'=>'w50'),
			'sql'       => array('type' => 'boolean', 'default' => false)
		),
        'wheelMinThreshold' => array
		(
			'exclude'   => true,
			'inputType' => 'text',
			'eval'      => array('rgxp'=>'natural', 'tl_class'=>'w50'),
			'sql'       => "smallint(5) unsigned NULL"
		),
        'wheelSleep' => array
		(
			'exclude'   => true,
			'inputType' => 'text',
			'eval'      => array('rgxp'=>'natural', 'tl_class'=>'w50'),
			'sql'       => "smallint(5) unsigned NULL"
		),
        'releaseWheel' => array
		(
			'exclude'   => true,
			'inputType' => 'checkbox',
			'eval'      => array('tl_class'=>'w50'),
			'sql'       => array('type' => 'boolean', 'default' => false)
		),
        'direction' => array
		(
			'exclude'   => true,
			'inputType' => 'select',
			'options'   => array('ltr', 'rtl', 'ttb'),
            'default'   => 'ltr',
			'eval'      => array('tl_class'=>'w50'),
			'sql'       => "varchar(64) NOT NULL default 'ltr'"
		),
        'cover' => array
		(
			'exclude'   => true,
			'inputType' => 'checkbox',
			'eval'      => array('tl_class'=>'w50'),
			'sql'       => array('type' => 'boolean', 'default' => false)
		),
        'slideFocus' => array
		(
			'exclude'   => true,
			'inputType' => 'checkbox',
			'eval'      => array('tl_class'=>'w50'),
			'sql'       => array('type' => 'boolean', 'default' => false)
		),
        'focusableNodes' => array
		(
			'exclude'   => true,
			'inputType' => 'text',
			'eval'      => array('tl_class'=>'w50'),
			'sql'       => "varchar(255) NOT NULL default ''"
		),
        'isNavigation' => array
		(
			'exclude'   => true,
			'inputType' => 'checkbox',
			'eval'      => array('tl_class'=>'w50'),
			'sql'       => array('type' => 'boolean', 'default' => false)
		),
        'direction' => array
		(
			'exclude'   => true,
			'inputType' => 'select',
			'options'   => array('true', 'false', 'move'),
            'default'   => 'true',
			'eval'      => array('tl_class'=>'w50'),
			'sql'       => "varchar(64) NOT NULL default 'true'"
		),
        'omitEnd' => array
		(
			'exclude'   => true,
			'inputType' => 'checkbox',
			'eval'      => array('tl_class'=>'w50'),
			'sql'       => array('type' => 'boolean', 'default' => false)
		),
        'updateOnMove' => array
		(
			'exclude'   => true,
			'inputType' => 'checkbox',
			'eval'      => array('tl_class'=>'w50'),
			'sql'       => array('type' => 'boolean', 'default' => false)
		),
        'direction' => array
		(
			'exclude'   => true,
			'inputType' => 'select',
			'options'   => array('true', 'false', 'completely'),
            'default'   => 'true',
			'eval'      => array('tl_class'=>'w50'),
			'sql'       => "varchar(64) NOT NULL default 'true'"
		),
        'direction' => array
		(
			'exclude'   => true,
			'inputType' => 'select',
			'options'   => array('min', 'max'),
            'default'   => 'min',
			'eval'      => array('tl_class'=>'w50'),
			'sql'       => "varchar(64) NOT NULL default 'min'"
		),
        'live' => array
		(
			'exclude'   => true,
			'inputType' => 'checkbox',
            'default'   => 1,
			'eval'      => array('tl_class'=>'w50'),
			'sql'       => array('type' => 'boolean', 'default' => true)
		),
        'breakpoints' => array
		(
			'exclude'   => true,
			'inputType' => 'text',
			'eval'      => array('tl_class'=>'w50'),
			'sql'       => "varchar(255) NOT NULL default ''"
		),
	)
);