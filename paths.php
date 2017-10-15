<?php
//SITE_ROOT
$path = $_SERVER['DOCUMENT_ROOT'] . '/web/';
define('SITE_ROOT', $path);

//SITE_PATH
define('SITE_PATH', 'http://' . $_SERVER['HTTP_HOST'] . '/web/');

//CSS
define('CSS_PATH', SITE_PATH . 'view/css/');

//JS
define('JS_PATH', SITE_PATH . 'view/js/');

//PLUGIN
define('PLUGIN_PATH', SITE_PATH . 'view/plugins/');

//IMG
define('IMG_PATH', SITE_PATH . 'view/img/');

//log
//define('USER_LOG_DIR', SITE_ROOT . 'log/user/Site_User_errors.log');
//define('GENERAL_LOG_DIR', SITE_ROOT . 'log/general/Site_General_errors.log');

define('PRODUCTION', true);

//model
define('MODEL_PATH', SITE_ROOT . 'model/');
//view
define('VIEW_PATH_INC', SITE_ROOT . 'view/inc/');
define('VIEW_PATH_INC_ERROR', SITE_ROOT . 'view/inc/templates_error/');
//modules
define('MODULES_PATH', SITE_ROOT . 'modules/');
//resources
define('RESOURCES', SITE_ROOT . 'resources/');
//media
define('MEDIA_PATH', SITE_ROOT . 'media/');
//utils
define('UTILS', SITE_ROOT . 'utils/');

//model bills
define('FUNCTIONS_BILLS', SITE_ROOT . 'modules/bills/utils/');
define('MODEL_PATH_BILLS', SITE_ROOT . 'modules/bills/model/');
define('DAO_BILLS', SITE_ROOT . 'modules/bills/model/DAO/');
define('BLL_BILLS', SITE_ROOT . 'modules/bills/model/BLL/');
define('MODEL_BILLS', SITE_ROOT . 'modules/bills/model/model/');
define('BILLS_JS_PATH', SITE_PATH . 'modules/bills/view/js/');

//model listbills
define('UTILS_LISTBILLS', SITE_ROOT . 'modules/listbills/utils/');
define('LISTBILLS_JS_PATH', SITE_PATH . 'modules/listbills/view/js/');
define('MODEL_PATH_listbills', SITE_ROOT . 'modules/listbills/model/');
define('DAO_LISTBILLS', SITE_ROOT . 'modules/listbills/model/DAO/');
define('BLL_LISTBILLS', SITE_ROOT . 'modules/listbills/model/BLL/');
define('MODEL_LISTBILLS', SITE_ROOT . 'modules/listbills/model/model/');

//amigables
define('URL_AMIGABLES', TRUE);
