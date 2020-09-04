<?php

$THEME->name = 'h5pmod';

/////////////////////////////////
// The only thing you need to change in this file when copying it to
// create a new theme is the name above. You also need to change the name
// in version.php and lang/en/theme_clean.php as well.
//////////////////////////////////
//
$THEME->doctype = 'html5';
$THEME->parents = ['boost'];
$THEME->sheets = ['custom'];
$THEME->supportscssoptimisation = false;
$THEME->yuicssmodules = [];
$THEME->enable_dock = false;
$THEME->editor_sheets = [];

$THEME->rendererfactory = 'theme_overridden_renderer_factory';
$THEME->csspostprocess = 'theme_h5pmod_process_css';
