<?php



/**
 * Created by PhpStorm.
 * User: yervandaghababyan
 * Date: 11/29/14
 * Time: 10:32 AM
 */

class SmartyImpl extends Smarty {

    public function __construct() {
        parent::__construct();

        global $ss_errors;

        $this->setTemplateDir(ROOT . '/templates');
        $this->setCompileDir(ROOT . '/cache/templates_compile/');
        $this->setCacheDir(ROOT . '/cache/templates_cache/');


        if(isset($_GET['error_id'])) {

            $this->assign('ss_error', $ss_errors[$_GET['error_id']]);
        }
        else {
            $this->assign('ss_error', '');
        }

        $this->caching = Smarty::CACHING_OFF;
    }
}