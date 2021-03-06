<?php
/*
+--------------------------------------------------------------------+
| CiviCRM version 4.7                                                |
+--------------------------------------------------------------------+
| Copyright CiviCRM LLC (c) 2004-2016                                |
+--------------------------------------------------------------------+
| This file is a part of CiviCRM.                                    |
|                                                                    |
| CiviCRM is free software; you can copy, modify, and distribute it  |
| under the terms of the GNU Affero General Public License           |
| Version 3, 19 November 2007 and the CiviCRM Licensing Exception.   |
|                                                                    |
| CiviCRM is distributed in the hope that it will be useful, but     |
| WITHOUT ANY WARRANTY; without even the implied warranty of         |
| MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.               |
| See the GNU Affero General Public License for more details.        |
|                                                                    |
| You should have received a copy of the GNU Affero General Public   |
| License and the CiviCRM Licensing Exception along                  |
| with this program; if not, contact CiviCRM LLC                     |
| at info[AT]civicrm[DOT]org. If you have questions about the        |
| GNU Affero General Public License or the licensing of CiviCRM,     |
| see the CiviCRM license FAQ at http://civicrm.org/licensing        |
+--------------------------------------------------------------------+
*/
/**
 * @package CRM
 * @copyright CiviCRM LLC (c) 2004-2016
 *
 * Generated from xml/schema/CRM/Core/Note.xml
 * DO NOT EDIT.  Generated by CRM_Core_CodeGen
 */
require_once 'CRM/Core/DAO.php';
require_once 'CRM/Utils/Type.php';
class CRM_Core_DAO_Note extends CRM_Core_DAO
{
  /**
   * static instance to hold the table name
   *
   * @var string
   */
  static $_tableName = 'civicrm_note';
  /**
   * static instance to hold the field values
   *
   * @var array
   */
  static $_fields = null;
  /**
   * static instance to hold the keys used in $_fields for each field.
   *
   * @var array
   */
  static $_fieldKeys = null;
  /**
   * static instance to hold the FK relationships
   *
   * @var string
   */
  static $_links = null;
  /**
   * static instance to hold the values that can
   * be imported
   *
   * @var array
   */
  static $_import = null;
  /**
   * static instance to hold the values that can
   * be exported
   *
   * @var array
   */
  static $_export = null;
  /**
   * static value to see if we should log any modifications to
   * this table in the civicrm_log table
   *
   * @var boolean
   */
  static $_log = true;
  /**
   * Note ID
   *
   * @var int unsigned
   */
  public $id;
  /**
   * Name of table where item being referenced is stored.
   *
   * @var string
   */
  public $entity_table;
  /**
   * Foreign key to the referenced item.
   *
   * @var int unsigned
   */
  public $entity_id;
  /**
   * Note and/or Comment.
   *
   * @var text
   */
  public $note;
  /**
   * FK to Contact ID creator
   *
   * @var int unsigned
   */
  public $contact_id;
  /**
   * When was this note last modified/edited
   *
   * @var date
   */
  public $modified_date;
  /**
   * subject of note description
   *
   * @var string
   */
  public $subject;
  /**
   * Foreign Key to Note Privacy Level (which is an option value pair and hence an implicit FK)
   *
   * @var string
   */
  public $privacy;
  /**
   * class constructor
   *
   * @return civicrm_note
   */
  function __construct()
  {
    $this->__table = 'civicrm_note';
    parent::__construct();
  }
  /**
   * Returns foreign keys and entity references
   *
   * @return array
   *   [CRM_Core_Reference_Interface]
   */
  static function getReferenceColumns()
  {
    if (!self::$_links) {
      self::$_links = static ::createReferenceColumns(__CLASS__);
      self::$_links[] = new CRM_Core_Reference_Basic(self::getTableName() , 'contact_id', 'civicrm_contact', 'id');
      self::$_links[] = new CRM_Core_Reference_Dynamic(self::getTableName() , 'entity_id', NULL, 'id', 'entity_table');
    }
    return self::$_links;
  }
  /**
   * Returns all the column names of this table
   *
   * @return array
   */
  static function &fields()
  {
    if (!(self::$_fields)) {
      self::$_fields = array(
        'id' => array(
          'name' => 'id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Note ID') ,
          'description' => 'Note ID',
          'required' => true,
        ) ,
        'entity_table' => array(
          'name' => 'entity_table',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Note Entity') ,
          'description' => 'Name of table where item being referenced is stored.',
          'required' => true,
          'maxlength' => 64,
          'size' => CRM_Utils_Type::BIG,
          'pseudoconstant' => array(
            'callback' => 'CRM_Core_BAO_Note::entityTables',
          )
        ) ,
        'entity_id' => array(
          'name' => 'entity_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Note Entity ID') ,
          'description' => 'Foreign key to the referenced item.',
          'required' => true,
        ) ,
        'note' => array(
          'name' => 'note',
          'type' => CRM_Utils_Type::T_TEXT,
          'title' => ts('Note') ,
          'description' => 'Note and/or Comment.',
          'rows' => 4,
          'cols' => 60,
          'import' => true,
          'where' => 'civicrm_note.note',
          'headerPattern' => '/Note|Comment/i',
          'dataPattern' => '//',
          'export' => true,
          'html' => array(
            'type' => 'TextArea',
          ) ,
        ) ,
        'contact_id' => array(
          'name' => 'contact_id',
          'type' => CRM_Utils_Type::T_INT,
          'title' => ts('Note Created By') ,
          'description' => 'FK to Contact ID creator',
          'FKClassName' => 'CRM_Contact_DAO_Contact',
        ) ,
        'modified_date' => array(
          'name' => 'modified_date',
          'type' => CRM_Utils_Type::T_DATE,
          'title' => ts('Note Modified By') ,
          'description' => 'When was this note last modified/edited',
        ) ,
        'subject' => array(
          'name' => 'subject',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Subject') ,
          'description' => 'subject of note description',
          'maxlength' => 255,
          'size' => 60,
          'html' => array(
            'type' => 'Text',
          ) ,
        ) ,
        'privacy' => array(
          'name' => 'privacy',
          'type' => CRM_Utils_Type::T_STRING,
          'title' => ts('Privacy') ,
          'description' => 'Foreign Key to Note Privacy Level (which is an option value pair and hence an implicit FK)',
          'maxlength' => 255,
          'size' => CRM_Utils_Type::HUGE,
          'pseudoconstant' => array(
            'optionGroupName' => 'note_privacy',
            'optionEditPath' => 'civicrm/admin/options/note_privacy',
          )
        ) ,
      );
    }
    return self::$_fields;
  }
  /**
   * Returns an array containing, for each field, the arary key used for that
   * field in self::$_fields.
   *
   * @return array
   */
  static function &fieldKeys()
  {
    if (!(self::$_fieldKeys)) {
      self::$_fieldKeys = array(
        'id' => 'id',
        'entity_table' => 'entity_table',
        'entity_id' => 'entity_id',
        'note' => 'note',
        'contact_id' => 'contact_id',
        'modified_date' => 'modified_date',
        'subject' => 'subject',
        'privacy' => 'privacy',
      );
    }
    return self::$_fieldKeys;
  }
  /**
   * Returns the names of this table
   *
   * @return string
   */
  static function getTableName()
  {
    return self::$_tableName;
  }
  /**
   * Returns if this table needs to be logged
   *
   * @return boolean
   */
  function getLog()
  {
    return self::$_log;
  }
  /**
   * Returns the list of fields that can be imported
   *
   * @param bool $prefix
   *
   * @return array
   */
  static function &import($prefix = false)
  {
    if (!(self::$_import)) {
      self::$_import = array();
      $fields = self::fields();
      foreach($fields as $name => $field) {
        if (CRM_Utils_Array::value('import', $field)) {
          if ($prefix) {
            self::$_import['note'] = & $fields[$name];
          } else {
            self::$_import[$name] = & $fields[$name];
          }
        }
      }
    }
    return self::$_import;
  }
  /**
   * Returns the list of fields that can be exported
   *
   * @param bool $prefix
   *
   * @return array
   */
  static function &export($prefix = false)
  {
    if (!(self::$_export)) {
      self::$_export = array();
      $fields = self::fields();
      foreach($fields as $name => $field) {
        if (CRM_Utils_Array::value('export', $field)) {
          if ($prefix) {
            self::$_export['note'] = & $fields[$name];
          } else {
            self::$_export[$name] = & $fields[$name];
          }
        }
      }
    }
    return self::$_export;
  }
}
