<?php
/**
 * This file was generated by ChronosGenerator wcmf-1.0.16.0001 from model.uml.
 * Manual modifications should be placed inside the protected regions.
 */
namespace app\src\model\wcmf\_base;

use app\src\model\wcmf\Permission;

use wcmf\lib\i18n\Message;
use wcmf\lib\model\mapper\NodeUnifiedRDBMapper;
use wcmf\lib\model\mapper\RDBAttributeDescription;
use wcmf\lib\model\mapper\RDBManyToManyRelationDescription;
use wcmf\lib\model\mapper\RDBManyToOneRelationDescription;
use wcmf\lib\model\mapper\RDBOneToManyRelationDescription;
use wcmf\lib\persistence\ReferenceDescription;
use wcmf\lib\persistence\TransientAttributeDescription;
use wcmf\lib\persistence\ObjectId;

/**
 * PermissionRDBMapper maps Permission Nodes to the database.
 */
class PermissionRDBMapper extends NodeUnifiedRDBMapper {

  /**
   * @see RDBMapper::getType()
   */
  public function getType() {
    return 'app.src.model.wcmf.Permission';
  }

  /**
   * @see PersistenceMapper::getTypeDisplayName()
   */
  public function getTypeDisplayName(Message $message) {
    return $message->getText("Permission");
  }

  /**
   * @see PersistenceMapper::getTypeDescription()
   */
  public function getTypeDescription(Message $message) {
    return $message->getText("");
  }

  /**
   * @see PersistenceMapper::getAttributeDisplayName()
   */
  public function getAttributeDisplayName($name, Message $message) {
    $displayName = $name;
    if (false) {}
      elseif ($name == 'id') { $displayName = $message->getText("id"); }
      elseif ($name == 'resource') { $displayName = $message->getText("resource"); }
      elseif ($name == 'context') { $displayName = $message->getText("context"); }
      elseif ($name == 'action') { $displayName = $message->getText("action"); }
      elseif ($name == 'roles') { $displayName = $message->getText("roles"); }
    return $displayName;
  }

  /**
   * @see PersistenceMapper::getAttributeDescription()
   */
  public function getAttributeDescription($name, Message $message) {
    $description = $name;
    if (false) {}
      elseif ($name == 'id') { $description = $message->getText(""); }
      elseif ($name == 'resource') { $description = $message->getText(""); }
      elseif ($name == 'context') { $description = $message->getText(""); }
      elseif ($name == 'action') { $description = $message->getText(""); }
      elseif ($name == 'roles') { $description = $message->getText(""); }
    return $description;
  }

  /**
   * @see PersistenceMapper::getPkNames()
   */
  public function getPkNames() {
    return ['id'];
  }

  /**
   * @see PersistenceMapper::getProperties()
   */
  public function getProperties() {
    return [
      'isSearchable' => false,
      'displayValues' => ['resource', 'context', 'action', 'roles'],
// PROTECTED REGION ID(app/src/model/wcmf/_base/PermissionRDBMapper.php/Properties) ENABLED START
// PROTECTED REGION END
    ];
  }

  /**
   * @see RDBMapper::getOwnDefaultOrder()
   */
  public function getOwnDefaultOrder($roleName=null) {
    $orderDefs = [];
    return $orderDefs;
  }

  /**
   * @see RDBMapper::getRelationDescriptions()
   */
  protected function getRelationDescriptions() {
    return [
    ];
  }

  /**
   * @see RDBMapper::getAttributeDescriptions()
   */
  protected function getAttributeDescriptions() {
    return [
     /**
      *
      */
      'id' => new RDBAttributeDescription('id', 'Integer', ['DATATYPE_IGNORE'], null, '', '', false, 'text', 'text', 'Permission', 'id'),
     /**
      *
      */
      'resource' => new RDBAttributeDescription('resource', 'String', ['DATATYPE_ATTRIBUTE'], null, '', '', true, 'text', 'text', 'Permission', 'resource'),
     /**
      *
      */
      'context' => new RDBAttributeDescription('context', 'String', ['DATATYPE_ATTRIBUTE'], null, '', '', true, 'text', 'text', 'Permission', 'context'),
     /**
      *
      */
      'action' => new RDBAttributeDescription('action', 'String', ['DATATYPE_ATTRIBUTE'], null, '', '', true, 'text', 'text', 'Permission', 'action'),
     /**
      *
      */
      'roles' => new RDBAttributeDescription('roles', 'String', ['DATATYPE_ATTRIBUTE'], null, '', '', true, 'text', 'text', 'Permission', 'roles'),
    ];
  }

  /**
   * @see RDBMapper::createObject()
   */
  protected function createObject(ObjectId $oid=null, array $initialData=null) {
    return new Permission($oid, $initialData);
  }

  /**
   * @see NodeUnifiedRDBMapper::getTableName()
   */
  protected function getTableName() {
    return 'Permission';
  }
}

/**
 * Additional names to be included by l10n tools ([Pl.]: plural forms)
 * - $message->getText("Permission [Pl.]")
 * Restrictions descriptions to be included by l10n tools
 */
