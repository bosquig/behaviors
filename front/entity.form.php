<?php
/**
 * @version $Id: config.form.php 68 2011-10-10 13:31:26Z remi $
 -------------------------------------------------------------------------

 LICENSE

 This file is part of Behaviors plugin for GLPI.

 Behaviors is free software: you can redistribute it and/or modify
 it under the terms of the GNU Affero General Public License as published by
 the Free Software Foundation, either version 3 of the License, or
 (at your option) any later version.

 Behaviors is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 GNU Affero General Public License for more details.

 You should have received a copy of the GNU Affero General Public License
 along with Behaviors. If not, see <http://www.gnu.org/licenses/>.

 @package   behaviors
 @author    David Durieux
 @copyright Copyright (c) 2010-2012 Behaviors plugin team
 @license   AGPL License 3.0 or (at your option) any later version
            http://www.gnu.org/licenses/agpl-3.0-standalone.html
 @link      https://forge.indepnet.net/projects/behaviors
 @link      http://www.glpi-project.org/
 @since     2012

 --------------------------------------------------------------------------
 */

define('GLPI_ROOT', '../../..');
include (GLPI_ROOT . "/inc/includes.php");

// No autoload when plugin is not activated
require_once('../inc/entity.class.php');

$pbEntity = new PluginBehaviorsEntity();

if (isset($_POST["add"])) {
   $pbEntity->check(-1, 'w', $_POST);
   
   $pbEntity->add($_POST);

   glpi_header($_SERVER['HTTP_REFERER']);
} else if (isset($_POST["update"])) {
   $pbEntity->check($_POST['id'],'w');

   $pbEntity->update($_POST);

   glpi_header($_SERVER['HTTP_REFERER']);
}
glpi_header($CFG_GLPI["root_doc"]."/front/config.form.php?forcetab=behaviors_1");
?>
