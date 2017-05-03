<?php
/**
 * This file was generated by ChronosGenerator wcmf-1.0.15.0001 from model.uml.
 * Manual modifications should be placed inside the protected regions.
 */
namespace app\src\model\wcmf\_base;

use app\src\model\wcmf\Role;

use wcmf\lib\i18n\Message;
use wcmf\lib\model\mapper\NodeUnifiedRDBMapper;
use wcmf\lib\model\mapper\RDBAttributeDescription;
use wcmf\lib\model\mapper\RDBManyToManyRelationDescription;
use wcmf\lib\model\mapper\RDBManyToOneRelationDescription;
use wcmf\lib\model\mapper\RDBOneToManyRelationDescription;
use wcmf\lib\persistence\ReferenceDescription;
use wcmf\lib\persistence\ObjectId;

/**
 * RoleRDBMapper maps Role Nodes to the database.
 */
class RoleRDBMapper extends NodeUnifiedRDBMapper {

  /**
   * @see RDBMapper::getType()
   */
  public function getType() {
    return 'app.src.model.wcmf.Role';
  }

  /**
   * @see PersistenceMapper::getTypeDisplayName()
   */
  public function getTypeDisplayName(Message $message) {
    return $message->getText("Role");
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
      elseif ($name == 'name') { $displayName = $message->getText("name"); }
    return $displayName;
  }

  /**
   * @see PersistenceMapper::getAttributeDescription()
   */
  public function getAttributeDescription($name, Message $message) {
    $description = $name;
    if (false) {}
      elseif ($name == 'id') { $description = $message->getText(""); }
      elseif ($name == 'name') { $description = $message->getText(""); }
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
      'displayValues' => ['name'],
// PROTECTED REGION ID(app/src/model/wcmf/_base/RoleRDBMapper.php/Properties) ENABLED START
// PROTECTED REGION END
    ];
  }

  /**
   * @see RDBMapper::getOwnDefaultOrder()
   */
  public function getOwnDefaultOrder($roleName=null) {
    $orderDefs = [];
    $orderDefs[] = ['sortFieldName' => 'name', 'sortDirection' => 'ASC', 'isSortkey' => false];
    return $orderDefs;
  }

  /**
   * @see RDBMapper::getRelationDescriptions()
   */
  protected function getRelationDescriptions() {
    return [
      'User' => new RDBManyToManyRelationDescription(
      /* this -> nm  */ new RDBOneToManyRelationDescription(
        'app.src.model.wcmf.Role', 'Role', 'app.src.model.wcmf.NMUserRole', 'NMUserRole',
        '1', '1', '0', 'unbounded', 'none', 'shared', 'true', 'true', 'child', 'id', 'fk_role_id'
      ),
      /* nm -> other */ new RDBManyToOneRelationDescription(
        'app.src.model.wcmf.NMUserRole', 'NMUserRole', 'app.src.model.wcmf.User', 'User',
        '0', 'unbounded', '1', '1', 'shared', 'none', 'true', 'true', 'parent', 'id', 'fk_user_id'
      )
      ),
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
      'id' => new RDBAttributeDescription('id', '', ['DATATYPE_IGNORE'], null, '', '', false, 'text', 'text', 'Role', 'id'),
     /**
      *
      */
      'name' => new RDBAttributeDescription('name', 'String', ['DATATYPE_ATTRIBUTE'], null, '', '', true, 'text', 'text', 'Role', 'name'),
    ];
  }

  /**
   * @see RDBMapper::createObject()
   */
  protected function createObject(ObjectId $oid=null, array $initialData=null) {
    return new Role($oid, $initialData);
  }

  /**
   * @see NodeUnifiedRDBMapper::getTableName()
   */
  protected function getTableName() {
    return 'Role';
  }
}

/**
 * Additional names to be included by l10n tools ([Pl.]: plural forms)
 * - $message->getText("Role [Pl.]")
 * - $message->getText("NMUserRole")
 * - $message->getText("NMUserRole [Pl.]")
 * Restrictions descriptions to be included by l10n tools
 */
