<?php

/**
 * Copyright (C) 2020 Andrew Stevens Consulting
 *
 * @link       https://andrewstevens.consulting
 */
 
 
 
/**
 * Back end modules
 */
array_insert($GLOBALS['BE_MOD'], 0, 
	array('ssa_config' => array(
			'program_configuration' => array
			(
				'tables' => array('tl_ssa_application_config', 'tl_ssa_application_stage'),
			)
		)
	)
);