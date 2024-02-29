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
$GLOBALS['TL_DCA']['tl_splide'] = [

	// Config
	'config' => [
		'dataContainer'    => DC_Table::class,
		'enableVersioning' => true,
		'sql' => [
			'keys' => [
				'id' => 'primary'
			]
		]
	],

	// List
	'list' => [
		'sorting' => [
			'mode'      => DataContainer::MODE_SORTABLE,
			'fields'    => ['title'],
			'flag'      => DataContainer::SORT_INITIAL_LETTER_ASC
		],
		'label' => [
			'fields'    => ['title'],
			'format'    => '%s'
		],
		'global_operations' => [
			'all' => [
				'label'      => &$GLOBALS['TL_LANG']['MSC']['all'],
				'href'       => 'act=select',
				'class'      => 'header_edit_all',
				'attributes' => 'onclick="Backend.getScrollOffset();" accesskey="e"'
			]
		],
		'operations' => [
			'edit' => [
				'href'       => 'act=edit',
				'icon'       => 'edit.svg'
			],
			'copy' => [
				'href'       => 'act=copy',
				'icon'       => 'copy.svg'
			],
			'delete' => [
				'href'       => 'act=delete',
				'icon'       => 'delete.svg',
				'attributes' => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"'
			],
			'show' => [
				'href'       => 'act=show',
				'icon'       => 'show.svg'
			]
		]
	],

	// Select
	'select' => [
		'buttons_callback' => []
	],

	// Edit
	'edit' => [
		'buttons_callback' => []
	],

	// Palettes
	'palettes' => [
		'__selector__'  => ['pager'],
		'default'       => '{title_legend},title;{options_legend},mode,speed,slideMargin,startSlide,infiniteLoop,responsive,captions,randomStart,video,hideControlOnEnd,useCSS,oneToOneTouch,easing,preloadImages,ticker,adaptiveHeight,touchEnabled,preventDefaultSwipeX,preventDefaultSwipeY;{pager_legend},pager;{controls_legend},controls,autoControls;{auto_legend},auto;{carousel_legend:hide},minSlides,maxSlides,moveSlides,slideWidth;{keyboard_legend:hide},keyboardEnabled;{aria_legend:hide},ariaLive,ariaHidden;{class_legend:hide},wrapperClass;{protected_legend:hide},protected;'
	],

	// Subpalettes
	'subpalettes' => [
        'pager'         => '',
	],

	// Fields
	'fields' => [
		'id' => [
			'sql'       => "int(10) unsigned NOT NULL auto_increment"
		],
		'tstamp' => [
			'sql'       => "int(10) unsigned NOT NULL default 0"
		],
		'title' => [
			'exclude'   => true,
			'inputType' => 'text',
			'eval'      => ['mandatory'=>true, 'maxlength'=>255, 'tl_class'=>'w50'],
			'sql'       => "varchar(255) NOT NULL default ''"
		],
		'type' => [
			'exclude'   => true,
			'inputType' => 'select',
			'default'   => 'slide',
			'options'   => ['slide','loop','fade'],
			'eval'      => ['tl_class'=>'w50'],
			'sql'       => "varchar(64) NOT NULL default 'slide'"
		],
        'role' => [
			'exclude'   => true,
			'inputType' => 'text',
            'default'   => 'region',
			'eval'      => ['maxlength'=>255, 'tl_class'=>'w50'],
			'sql'       => "varchar(255) NOT NULL default ''"
		],
        'label' => [
			'exclude'   => true,
			'inputType' => 'text',
			'eval'      => ['maxlength'=>255, 'tl_class'=>'w50'],
			'sql'       => "varchar(255) NOT NULL default ''"
		],
        'labelledby' => [
			'exclude'   => true,
			'inputType' => 'text',
			'eval'      => ['maxlength'=>255, 'tl_class'=>'w50'],
			'sql'       => "varchar(255) NOT NULL default ''"
		],
        'rewind' => [
			'exclude'   => true,
			'inputType' => 'checkbox',
			'eval'      => ['tl_class'=>'w50'],
			'sql'       => ['type' => 'boolean', 'default' => false]
		],
		'speed' => [
			'exclude'   => true,
			'default'   => 400,
			'inputType' => 'text',
			'eval'      => ['rgxp'=>'natural', 'tl_class'=>'w50'],
			'sql'       => "int(10) unsigned NOT NULL default 400"
		],
        'rewindSpeed' => [
			'exclude'   => true,
			'inputType' => 'text',
			'eval'      => ['rgxp'=>'natural', 'tl_class'=>'w50'],
			'sql'       => "varchar(5) unsigned NOT NULL default ''"
		],
        'rewindByDrag' => [
			'exclude'   => true,
			'inputType' => 'checkbox',
			'eval'      => ['tl_class'=>'w50'],
			'sql'       => ['type' => 'boolean', 'default' => false]
		],
        'width' => [
			'exclude'   => true,
			'inputType' => 'text',
			'eval'      => ['tl_class'=>'w50'],
			'sql'       => "varchar(255) NOT NULL default ''"
		],
        'height' => [
			'exclude'   => true,
			'inputType' => 'text',
			'eval'      => ['tl_class'=>'w50'],
			'sql'       => "varchar(255) NOT NULL default ''"
		],
        'fixedWidth' => [
			'exclude'   => true,
			'inputType' => 'text',
			'eval'      => ['tl_class'=>'w50'],
			'sql'       => "varchar(255) NOT NULL default ''"
		],
        'fixedHeight' => [
			'exclude'   => true,
			'inputType' => 'text',
			'eval'      => ['tl_class'=>'w50'],
			'sql'       => "varchar(255) NOT NULL default ''"
		],
        'heightRatio' => [
			'exclude'   => true,
			'default'   => 400,
			'inputType' => 'text',
			'eval'      => ['rgxp'=>'digit', 'tl_class'=>'w50'],
			'sql'       => "smallint(5) unsigned NOT NULL default 400"
		],
        'autoWidth' => [
			'exclude'   => true,
			'inputType' => 'checkbox',
			'eval'      => ['tl_class'=>'w50'],
			'sql'       => ['type' => 'boolean', 'default' => false]
		],
        'autoHeight' => [
			'exclude'   => true,
			'inputType' => 'checkbox',
			'eval'      => ['tl_class'=>'w50'],
			'sql'       => ['type' => 'boolean', 'default' => false]
		],
        'start' => [
			'exclude'   => true,
			'default'   => 0,
			'inputType' => 'text',
			'eval'      => ['rgxp'=>'natural', 'tl_class'=>'w50'],
			'sql'       => "smallint(5) unsigned NOT NULL default 0"
		],
        'perPage' => [
			'exclude'   => true,
			'default'   => 1,
			'inputType' => 'text',
			'eval'      => ['rgxp'=>'natural', 'tl_class'=>'w50'],
			'sql'       => "smallint(5) unsigned NOT NULL default 1"
		],
        'perMove' => [
			'exclude'   => true,
			'inputType' => 'text',
			'eval'      => ['rgxp'=>'natural', 'tl_class'=>'w50'],
			'sql'       => "varchar(5) NULL default ''"
		],
        'clones' => [
			'exclude'   => true,
			'inputType' => 'text',
			'eval'      => ['rgxp'=>'natural', 'tl_class'=>'w50'],
			'sql'       => "varchar(5) NULL default ''"
		],
        'cloneStatus' => [
			'exclude'   => true,
			'inputType' => 'checkbox',
			'eval'      => ['tl_class'=>'w50'],
			'sql'       => ['type' => 'boolean', 'default' => false]
		],
        'focus' => [
			'exclude'   => true,
			'inputType' => 'text',
			'eval'      => ['tl_class'=>'w50'],
			'sql'       => "varchar(255) NOT NULL default ''"
		],
        'gap' => [
			'exclude'   => true,
			'inputType' => 'text',
			'eval'      => ['tl_class'=>'w50'],
			'sql'       => "varchar(255) NOT NULL default ''"
		],
        'gap' => [
			'exclude'   => true,
			'inputType' => 'trbl',
			'eval'      => ['tl_class'=>'w50'],
			'sql'       => "varchar(255) NOT NULL default ''"
		],
        'arrows' => [
			'exclude'   => true,
			'inputType' => 'checkbox',
            'default'   => 1,
			'eval'      => ['tl_class'=>'w50'],
			'sql'       => ['type' => 'boolean', 'default' => true]
		],
        'pagination' => [
			'exclude'   => true,
			'inputType' => 'checkbox',
            'default'   => 1,
			'eval'      => ['tl_class'=>'w50'],
			'sql'       => ['type' => 'boolean', 'default' => true]
		],
        'paginationKeyboard' => [
			'exclude'   => true,
			'inputType' => 'checkbox',
            'default'   => 1,
			'eval'      => ['tl_class'=>'w50'],
			'sql'       => ['type' => 'boolean', 'default' => true]
		],
        'paginationDirection' => [
			'exclude'   => true,
			'inputType' => 'select',
			'options'   => ['ltr', 'rtl', 'ttb'],
            'default'   => 'ltr',
			'eval'      => ['tl_class'=>'w50'],
			'sql'       => "varchar(64) NOT NULL default 'ltr'"
		],
        'easing' => [
			'exclude'   => true,
			'inputType' => 'text',
			'eval'      => ['tl_class'=>'w50'],
			'sql'       => "varchar(255) NOT NULL default ''"
		],
        'easingFunc' => [
			'exclude'   => true,
			'inputType' => 'text',
			'eval'      => ['tl_class'=>'w50'],
			'sql'       => "varchar(255) NOT NULL default ''"
		],
        'drag' => [
			'exclude'   => true,
			'inputType' => 'select',
			'options'   => ['true', 'false', 'free'],
            'default'   => 'free',
			'eval'      => ['tl_class'=>'w50'],
			'sql'       => "varchar(64) NOT NULL default 'free'"
		],
        'snap' => [
			'exclude'   => true,
			'inputType' => 'checkbox',
			'eval'      => ['tl_class'=>'w50'],
			'sql'       => ['type' => 'boolean', 'default' => false]
		],
        'noDrag' => [
			'exclude'   => true,
			'inputType' => 'text',
			'eval'      => ['tl_class'=>'w50'],
			'sql'       => "varchar(255) NOT NULL default ''"
		],
        'dragMinThreshold' => [
			'exclude'   => true,
			'inputType' => 'text',
			'eval'      => ['tl_class'=>'w50'],
			'sql'       => "varchar(255) NOT NULL default ''"
		],
        'flickPower' => [
			'exclude'   => true,
			'default'   => 600,
			'inputType' => 'text',
			'eval'      => ['rgxp'=>'natural', 'tl_class'=>'w50'],
			'sql'       => "smallint(5) unsigned NOT NULL default 600"
		],
        'flickMaxPages' => [
			'exclude'   => true,
			'default'   => 1,
			'inputType' => 'text',
			'eval'      => ['rgxp'=>'natural', 'tl_class'=>'w50'],
			'sql'       => "smallint(5) unsigned NOT NULL default 1"
		],
        'waitForTransition' => [
			'exclude'   => true,
			'inputType' => 'checkbox',
			'eval'      => ['tl_class'=>'w50'],
			'sql'       => ['type' => 'boolean', 'default' => false]
		],
        'arrowPath' => [
			'exclude'   => true,
			'inputType' => 'text',
			'eval'      => ['tl_class'=>'w50'],
			'sql'       => "varchar(255) NOT NULL default ''"
		],
        'autoplay' => [
			'exclude'   => true,
			'inputType' => 'select',
			'options'   => ['true', 'false', 'pause'],
            'default'   => 'free',
			'eval'      => ['tl_class'=>'w50'],
			'sql'       => "varchar(64) NOT NULL default 'free'"
		],
        'interval' => [
			'exclude'   => true,
			'default'   => 5000,
			'inputType' => 'text',
			'eval'      => ['rgxp'=>'natural', 'tl_class'=>'w50'],
			'sql'       => "smallint(5) unsigned NOT NULL default 5000"
		],
        'pauseOnHover' => [
			'exclude'   => true,
			'inputType' => 'checkbox',
            'default'   => 1,
			'eval'      => ['tl_class'=>'w50'],
			'sql'       => ['type' => 'boolean', 'default' => true]
		],
        'pauseOnFocus' => [
			'exclude'   => true,
			'inputType' => 'checkbox',
            'default'   => 1,
			'eval'      => ['tl_class'=>'w50'],
			'sql'       => ['type' => 'boolean', 'default' => true]
		],
        'resetProgress' => [
			'exclude'   => true,
			'inputType' => 'checkbox',
            'default'   => 1,
			'eval'      => ['tl_class'=>'w50'],
			'sql'       => ['type' => 'boolean', 'default' => true]
		],
        'lazyLoad' => [
			'exclude'   => true,
			'inputType' => 'select',
			'options'   => ['false', 'nearby','sequential'],
            'default'   => 'false',
			'eval'      => ['tl_class'=>'w50'],
			'sql'       => "varchar(64) NOT NULL default 'false'"
		],
        'preloadPages' => [
			'exclude'   => true,
			'default'   => 1,
			'inputType' => 'text',
			'eval'      => ['rgxp'=>'natural', 'tl_class'=>'w50'],
			'sql'       => "smallint(5) unsigned NOT NULL default 5000"
		],
        'keyboard' => [
			'exclude'   => true,
			'inputType' => 'select',
			'options'   => ['true', 'false', 'global','focused'],
            'default'   => 'true',
			'eval'      => ['tl_class'=>'w50'],
			'sql'       => "varchar(64) NOT NULL default 'true'"
		],
        'wheel' => [
			'exclude'   => true,
			'inputType' => 'checkbox',
			'eval'      => ['tl_class'=>'w50'],
			'sql'       => ['type' => 'boolean', 'default' => false]
		],
        'wheelMinThreshold' => [
			'exclude'   => true,
			'inputType' => 'text',
			'eval'      => ['rgxp'=>'natural', 'tl_class'=>'w50'],
			'sql'       => "smallint(5) unsigned NULL"
		],
        'wheelSleep' => [
			'exclude'   => true,
			'inputType' => 'text',
			'eval'      => ['rgxp'=>'natural', 'tl_class'=>'w50'],
			'sql'       => "smallint(5) unsigned NULL"
		],
        'releaseWheel' => [
			'exclude'   => true,
			'inputType' => 'checkbox',
			'eval'      => ['tl_class'=>'w50'],
			'sql'       => ['type' => 'boolean', 'default' => false]
		],
        'direction' => [
			'exclude'   => true,
			'inputType' => 'select',
			'options'   => ['ltr', 'rtl', 'ttb'],
            'default'   => 'ltr',
			'eval'      => ['tl_class'=>'w50'],
			'sql'       => "varchar(64) NOT NULL default 'ltr'"
		],
        'cover' => [
			'exclude'   => true,
			'inputType' => 'checkbox',
			'eval'      => ['tl_class'=>'w50'],
			'sql'       => ['type' => 'boolean', 'default' => false]
		],
        'slideFocus' => [
			'exclude'   => true,
			'inputType' => 'checkbox',
			'eval'      => ['tl_class'=>'w50'],
			'sql'       => ['type' => 'boolean', 'default' => false]
		],
        'focusableNodes' => [
			'exclude'   => true,
			'inputType' => 'text',
			'eval'      => ['tl_class'=>'w50'],
			'sql'       => "varchar(255) NOT NULL default ''"
		],
        'isNavigation' => [
			'exclude'   => true,
			'inputType' => 'checkbox',
			'eval'      => ['tl_class'=>'w50'],
			'sql'       => ['type' => 'boolean', 'default' => false]
		],
        'direction' => [
			'exclude'   => true,
			'inputType' => 'select',
			'options'   => ['true', 'false', 'move'],
            'default'   => 'true',
			'eval'      => ['tl_class'=>'w50'],
			'sql'       => "varchar(64) NOT NULL default 'true'"
		],
        'omitEnd' => [
			'exclude'   => true,
			'inputType' => 'checkbox',
			'eval'      => ['tl_class'=>'w50'],
			'sql'       => ['type' => 'boolean', 'default' => false]
		],
        'updateOnMove' => [
			'exclude'   => true,
			'inputType' => 'checkbox',
			'eval'      => ['tl_class'=>'w50'],
			'sql'       => ['type' => 'boolean', 'default' => false]
		],
        'direction' => [
			'exclude'   => true,
			'inputType' => 'select',
			'options'   => ['true', 'false', 'completely'],
            'default'   => 'true',
			'eval'      => ['tl_class'=>'w50'],
			'sql'       => "varchar(64) NOT NULL default 'true'"
		],
        'direction' => [
			'exclude'   => true,
			'inputType' => 'select',
			'options'   => ['min', 'max'],
            'default'   => 'min',
			'eval'      => ['tl_class'=>'w50'],
			'sql'       => "varchar(64) NOT NULL default 'min'"
		],
        'live' => [
			'exclude'   => true,
			'inputType' => 'checkbox',
            'default'   => 1,
			'eval'      => ['tl_class'=>'w50'],
			'sql'       => ['type' => 'boolean', 'default' => true]
		],
        'breakpoints' => [
			'exclude'   => true,
			'inputType' => 'text',
			'eval'      => ['tl_class'=>'w50'],
			'sql'       => "varchar(255) NOT NULL default ''"
		],
	]
];