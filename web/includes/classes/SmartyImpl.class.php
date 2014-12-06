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

        $this->setTemplateDir(ROOT . '/templates');
        $this->setCompileDir(ROOT . '/cache/templates_compile/');
        $this->setCacheDir(ROOT . '/cache/templates_cache/');

        $this->caching = Smarty::CACHING_LIFETIME_CURRENT;
    }
}