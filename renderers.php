<?php
/**
 * Class theme_h5pmod_core_h5p_renderer.
 *
 * Extends the H5P renderer so that we are able to override the relevant
 * functions declared there.
 */
class theme_h5pmod_core_h5p_renderer extends \core_h5p\output\renderer {

    /**
     * Add styles when an H5P is displayed.
     *
     * @param array $styles Styles that will be applied.
     * @param array $libraries Libraries that wil be shown.
     * @param string $embedType How the H5P is displayed.
     */
    public function h5p_alter_styles(&$styles, $libraries, $embedType) {
        global $CFG;
        if (
            isset($libraries['H5P.InteractiveVideo']) &&
            $libraries['H5P.InteractiveVideo']['majorVersion'] == '1'
        ) {
            $styles[] = (object) array(
                'path'    => $CFG->httpswwwroot . '/theme/h5pmod/style/custom.css',
                'version' => '?ver=0.0.1',
            );
        }
    }

    /**
     * Add scripts when an H5P is displayed.
     *
     * @param object $scripts Scripts that will be applied.
     * @param array $libraries Libraries that will be displayed.
     * @param string $embedType How the H5P is displayed.
     */
    public function h5p_alter_scripts(&$scripts, $libraries, $embedType) {
        global $CFG;
        if (
            isset($libraries['H5P.InteractiveVideo']) &&
            $libraries['H5P.InteractiveVideo']['majorVersion'] == '1'
        ) {
            $include_file = ($embedType === 'editor' ? 'customEditor.js' : 'custom.js');
            $scripts[] = (object) array(
                'path'    => $CFG->httpswwwroot . '/theme/h5pmod/js/' . $include_file,
                'version' => '?ver=0.0.1',
            );
        }
    }

    /**
     * Alter a library's semantics
     *
     * May be used to ad more fields to a library, change a widget, allow more
     * html tags, etc.
     *
     * @param object $semantics Library semantics
     * @param string $name Name of library
     * @param int $majorVersion Major version of library
     * @param int $minorVersion Minor version of library
     */
    public function h5p_alter_semantics(&$semantics, $name, $majorVersion, $minorVersion) {
        if (
            $name === 'H5P.MultiChoice' &&
            $majorVersion == 1
        ) {
            array_shift($semantics);
        }
    }

    /**
     * Alter an H5Ps parameters.
     *
     * May be used to alter the content itself or the behaviour of an H5
     *
     * @param object $parameters Parameters of library as json object
     * @param string $name Name of library
     * @param int $majorVersion Major version of library
     * @param int $minorVersion Minor version of library
     */
    public function h5p_alter_filtered_parameters(&$parameters, $name, $majorVersion, $minorVersion) {
        if (
            $name === 'H5P.MultiChoice' &&
            $majorVersion == 1
        ) {
            $parameters->question .= '<p> Generated at ' . time() . '</p>';
        }
    }
}