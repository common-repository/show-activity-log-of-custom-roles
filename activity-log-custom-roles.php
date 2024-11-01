<?php
/*
Plugin Name: Show Activity Log Of Custom Roles
Description: See the activity log of all roles, including custom roles.
Author: Devendra Singh Bhandari
Author URI: https://devendrabhandari.in/
Version: 1.0.0
Text Domain:
License: GPLv2 or later


This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Allow administrator to see the activity of all roles, including custom roles.
 * It also appends custom roles in 'All Roles' dropdown filter.
 *
 * @param $caps array
 * @return $caps
 */
function custom_aal_caps( $caps ) {
    global $wp_roles;

    $all_roles = $wp_roles->get_names();

    if ( ! empty( $all_roles ) ) {
        foreach ( $all_roles as $key => $value ) {
            if ( ! in_array( $key, $caps['administrator'] ) ) {
                array_push( $caps['administrator'], $key );
            }
        }
    }

    return $caps;
}
add_filter( 'aal_init_caps', 'custom_aal_caps', 10, 1 );
