<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| Profiler Sections
| -------------------------------------------------------------------------
| This file lets you determine whether or not various sections of Profiler
| data are displayed when the Profiler is enabled.
| Please see the user guide for info:
|
|	http://codeigniter.com/user_guide/general/profiling.html
|
*/


$config['config']  = true;
$config['queries'] = true;
$config['get'] = true;
$config['post'] = true;
$config['controller_info'] = true;
$config['benchmarks'] = true;
$config['http_headers'] = true;
$config['memory_usage'] = true;
$config['uri_string'] = true;
$config['query_toggle_count'] = true;


/* End of file profiler.php */
/* Location: ./application/config/profiler.php */