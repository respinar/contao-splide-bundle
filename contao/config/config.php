<?php

/*
 * This file is part of Contao Splide.
 *
 * (c) Hamid Peywasti 2023 <abbaszadeh.h@gmail.com>
 * 
 * @license MIT
 */

use Respinar\SplideBundle\Model\SplideModel;

/**
 * Backend modules
 */
$GLOBALS['BE_MOD']['content']['splides'] = array(
    'tables' => array('tl_splide')
);

/**
 * Models
 */
$GLOBALS['TL_MODELS']['tl_splide'] = SplideModel::class;