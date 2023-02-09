<?php

/**
 * Class theme_h5pmod_core_h5p_renderer.
 *
 * Extends the H5P renderer so that we are able to override the relevant
 * functions declared there.
 */
class theme_h5pmod_core_h5p_renderer extends \core_h5p\output\renderer
{

    /**
     * Add styles when an H5P is displayed.
     *
     * @param array $styles Styles that will be applied.
     * @param array $libraries Libraries that wil be shown.
     * @param string $embedType How the H5P is displayed.
     */
    public function h5p_alter_styles(&$styles, $libraries, $embedType)
    {
        global $CFG;
        if (
            isset($libraries['H5P.InteractiveVideo']) &&
            $libraries['H5P.InteractiveVideo']['majorVersion'] == '1'
        ) {
            $styles[] = (object) array(
                'path'    => $CFG->httpswwwroot . '/theme/overridetest/style/custom.css',
                'version' => '?ver=0.0.1',
            );
        }
    }
}
