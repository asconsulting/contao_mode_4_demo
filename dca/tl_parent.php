<?php

/**
 * Copyright (C) 2020 Andrew Stevens Consulting
 *
 * @link	   https://andrewstevens.consulting
 */
 
 
 
/**
 * Table tl_parent
 */
$GLOBALS['TL_DCA']['tl_parent'] = array
(
 
    // Config
    'config' => array
    (
        'dataContainer'               => 'Table',
        'enableVersioning'            => true,
		'ctable'					  => array('tl_child'),
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
            'mode'                    => 1,
            'fields'                  => array('name'),
            'flag'                    => 1,
            'panelLayout'             => 'filter;search,limit'
        ),
        'label' => array
        (
            'fields'                  => array('name'),
            'format'                  => '%s'
        ),
        'global_operations' => array
        (
            'all' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['MSC']['all'],
                'href'                => 'act=select',
                'class'               => 'header_edit_all',
                'attributes'          => 'onclick="Backend.getScrollOffset()" accesskey="e"'
            )
        ),
        'operations' => array
        (
			'edit' => array
			(
                'label'               => &$GLOBALS['TL_LANG']['tl_parent']['edit'],
				'href'                => 'table=tl_child',
				'icon'                => 'edit.svg'
			),
			'editheader' => array
			(
                'label'               => &$GLOBALS['TL_LANG']['tl_parent']['editheader'],
				'href'                => 'table=tl_parent&amp;act=edit',
				'icon'                => 'header.svg'
			),
			'copy' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_parent']['copy'],
                'href'                => 'act=copy',
                'icon'                => 'copy.gif'
            ),
            'delete' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_parent']['delete'],
                'href'                => 'act=delete',
                'icon'                => 'delete.gif',
                'attributes'          => 'onclick="if(!confirm(\'' . ($GLOBALS['TL_LANG']['MSC']['deleteConfirm'] ?? null) . '\'))return false;Backend.getScrollOffset()"'
            ),
            'toggle' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_parent']['toggle'],
				'icon'                => 'visible.gif',
				'attributes'          => 'onclick="Backend.getScrollOffset();return AjaxRequest.toggleVisibility(this,%s)"',
				'button_callback'     => array('Asc\Backend\Parent', 'toggleIcon')
			),
            'show' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_parent']['show'],
                'href'                => 'act=show',
                'icon'                => 'show.gif'
            )
        )
    ),
 
    // Palettes
    'palettes' => array
    (
        'default'                     => '{config_legend},name;{notes_legend},notes;{publish_legend},published',
    ),
 
    // Fields
    'fields' => array
    (
        'id' => array
        (
            'sql'                     => "int(10) unsigned NOT NULL auto_increment"
        ),
        'tstamp' => array
        (
            'sql'                     => "int(10) unsigned NOT NULL default '0'"
        ),
        'name' => array
        (
            'label'                   => &$GLOBALS['TL_LANG']['tl_parent']['name'],
            'search'                  => true,
            'inputType'               => 'text',
            'eval'                    => array('unique'=>true, 'mandatory'=>true, 'maxlength'=>128, 'tl_class'=>'long'),
            'sql'                     => "varchar(128) NOT NULL default ''"
        ),
		'notes' => array
		(
			'label'					  => &$GLOBALS['TL_LANG']['tl_parent']['notes'],
			'search'                  => true,
			'inputType'               => 'textarea',
			'eval'                    => array('allowHtml'=>false, 'tl_class'=>'clr long'),
			'sql'                     => "mediumtext NULL"
		),
		'published' => array
		(
			'exclude'                 => true,
			'label'                   => &$GLOBALS['TL_LANG']['tl_parent']['published'],
			'inputType'               => 'checkbox',
			'eval'                    => array('submitOnChange'=>true, 'doNotCopy'=>true),
			'sql'                     => "char(1) NOT NULL default ''"
		)		
    )
);
