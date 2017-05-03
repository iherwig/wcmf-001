<?php
/**
 * This file was generated by ChronosGenerator wcmf-1.0.15.0001 from model.uml.
 * Manual modifications should be placed inside the protected regions.
 */
namespace app\src\model\wcmf\_base;

use app\src\model\wcmf\Lock;

use wcmf\lib\i18n\Message;
use wcmf\lib\model\mapper\NodeUnifiedRDBMapper;
use wcmf\lib\model\mapper\RDBAttributeDescription;
use wcmf\lib\model\mapper\RDBManyToManyRelationDescription;
use wcmf\lib\model\mapper\RDBManyToOneRelationDescription;
use wcmf\lib\model\mapper\RDBOneToManyRelationDescription;
use wcmf\lib\persistence\ReferenceDescription;
use wcmf\lib\persistence\ObjectId;

/**
 * LockRDBMapper maps Lock Nodes to the database.
 */
class LockRDBMapper extends NodeUnifiedRDBMapper {

  /**
   * @see RDBMapper::getType()
   */
  public function getType() {
    return 'app.src.model.wcmf.Lock';
  }

  /**
   * @see PersistenceMapper::getTypeDisplayName()
   */
  public function getTypeDisplayName(Message $message) {
    return $message->getText("Lock");
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
      elseif ($name == 'objectid') { $displayName = $message->getText("objectid"); }
      elseif ($name == 'login') { $displayName = $message->getText("login"); }
      elseif ($name == 'created') { $displayName = $message->getText("created"); }
    return $displayName;
  }

  /**
   * @see PersistenceMapper::getAttributeDescription()
   */
  public function getAttributeDescription($name, Message $message) {
    $description = $name;
    if (false) {}
      elseif ($name == 'id') { $description = $message->getText(""); }
      elseif ($name == 'objectid') { $description = $message->getText(""); }
      elseif ($name == 'login') { $description = $message->getText(""); }
      elseif ($name == 'created') { $description = $message->getText(""); }
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
      'displayValues' => ['objectid', 'login', 'created'],
// PROTECTED REGION ID(app/src/model/wcmf/_base/LockRDBMapper.php/Properties) ENABLED START
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
      'id' => new RDBAttributeDescription('id', '', ['DATATYPE_IGNORE'], null, '', '', false, 'text', 'text', 'Lock', 'id'),
     /**
      *
      */
      'objectid' => new RDBAttributeDescription('objectid', 'String', ['DATATYPE_ATTRIBUTE'], null, '', '', false, 'text', 'text', 'Lock', 'objectid'),
     /**
      *
      */
      'login' => new RDBAttributeDescription('login', 'String', ['DATATYPE_ATTRIBUTE'], null, '', '', false, 'text', 'text', 'Lock', 'login'),
     /**
      *
      */
      'created' => new RDBAttributeDescription('created', 'Date', ['DATATYPE_ATTRIBUTE'], null, '', '', false, 'date', 'text', 'Lock', 'created'),
    ];
  }

  /**
   * @see RDBMapper::createObject()
   */
  protected function createObject(ObjectId $oid=null, array $initialData=null) {
    return new Lock($oid, $initialData);
  }

  /**
   * @see NodeUnifiedRDBMapper::getTableName()
   */
  protected function getTableName() {
    return 'Lock';
  }
}

/**
 * Additional names to be included by l10n tools ([Pl.]: plural forms)
 * - $message->getText("Lock [Pl.]")
 * Restrictions descriptions to be included by l10n tools
 */