/*
 * @file
 * A Drupal include file for adding ckfinder to a ckeditor instance vis-a-vis 
 * the drupal ckeditor module.  Copy this file to the root directory of
 * the ckfinder library and reference it with an include statement in the 
 * ckfinder file 'config.php'.
 *
 * The code sets ckeditor variables $baseUrl and $baseDir.  It replaces 
 * the ckeditor defaults, or the default values found in config.php.   
 */

/** 
 * Drupal bootstrap -- start_session() invoked -- allows drupal calls.
 *
 * Do a backward search through the directory tree for a signature file and then 
 * execute an appropriate drupal bootstrap. Return to the starting dir and 
 * resume loading.
 */
function _init_drupal_CKFinder() {
  global $baseUrl, $baseDir;

  $start_cwd = getcwd();
  $path = $start_cwd;

  // Cheater code to save time -- optimized for /sites/all/libraries/ckfinder config.
  // Comment out next line if it does not work.
  chdir('../../../../../..'); $path = getcwd();

  // single steps back thru each parent on the dir tree looking for drupal
  while(strlen($path) > 3) {
    $path = dirname($path);
    if( file_exists($path . '/includes/bootstrap.inc')) 
      break; 
  };
  chdir($path);
  
  require_once './includes/bootstrap.inc';
  define('DRUPAL_ROOT', getcwd());
  drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);
// drupal_bootstrap(DRUPAL_BOOTSTRAP_SESSION);
  
  // Get back, get back, get back to where you once belonged. Beatles - Get Back (1968).
  chdir($start_cwd);
  //drupal_set_message("connector.php path was $start_cwd");

  // we should now have a $_SESSION array and other info -- set the ckfinder globals.
  if (isset($_GET['id'], $_SESSION['ckeditor'][$_GET['id']]['UserFilesPath'], $_SESSION['ckeditor'][$_GET['id']]['UserFilesAbsolutePath'])){
    $_SESSION['ckeditor']['UserFilesPath'] = $_SESSION['ckeditor'][$_GET['id']]['UserFilesPath'];
    $_SESSION['ckeditor']['UserFilesAbsolutePath'] = $_SESSION['ckeditor'][$_GET['id']]['UserFilesAbsolutePath'];
    $baseUrl = $_SESSION['ckeditor']['UserFilesPath'];
    $baseDir = $_SESSION['ckeditor']['UserFilesAbsolutePath'];
  } 
}

// Drupal bootstrap
_init_drupal_CKFinder();

/**
 * Replaces the CheckAuthentication() function in config.php.  The CKfinder
 * library invokes this function communication to the server in connector.php.
 * Note that user_access() is a drupal function.
 */
function CheckAuthentication() {
  return user_access('allow CKFinder file uploads');
}