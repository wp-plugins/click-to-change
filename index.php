<?php
/**
 * Plugin Name: Click to Change
 * Plugin URI: http://webcodingplace.com/click-to-change
 * Description: Just click and change contents of Posts, Pages and Custom Post Types when viewing it.
 * Version: 1.0
 * Author: Rameez
 * Author URI: http://webcodingplace.com/
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: click-change
 */

/*

  Copyright (C) 2015  Rameez  rameez.iqbal@live.com

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License, version 2, as
  published by the Free Software Foundation.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.
*/
require_once('plugin.class.php');

if( class_exists('WCP_Click_to_Change')){
	
	$just_initialize = new WCP_Click_to_Change;
}

?>