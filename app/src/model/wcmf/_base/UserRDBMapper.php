<?php
/**
 * This file was generated by ChronosGenerator wcmf-1.0.15.0001 from model.uml.
 * Manual modifications should be placed inside the protected regions.
 */
namespace app\src\model\wcmf\_base;

use app\src\model\wcmf\User;

use wcmf\lib\i18n\Message;
use wcmf\lib\model\mapper\NodeUnifiedRDBMapper;
use wcmf\lib\model\mapper\RDBAttributeDescription;
use wcmf\lib\model\mapper\RDBManyToManyRelationDescription;
use wcmf\lib\model\mapper\RDBManyToOneRelationDescription;
use wcmf\lib\model\mapper\RDBOneToManyRelationDescription;
use wcmf\lib\persistence\ReferenceDescription;
use wcmf\lib\persistence\ObjectId;

/**
 * UserRDBMapper maps User Nodes to the database.
 */
class UserRDBMapper extends NodeUnifiedRDBMapper {

  /**
   * @see RDBMapper::getType()
   */
  public function getType() {
    return 'app.src.model.wcmf.User';
  }

  /**
   * @see PersistenceMapper::getTypeDisplayName()
   */
  public function getTypeDisplayName(Message $message) {
    return $message->getText("User");
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
      elseif ($name == 'login') { $displayName = $message->getText("login"); }
      elseif ($name == 'password') { $displayName = $message->getText("password"); }
      elseif ($name == 'name') { $displayName = $message->getText("name"); }
      elseif ($name == 'firstname') { $displayName = $message->getText("firstname"); }
      elseif ($name == 'active') { $displayName = $message->getText("active"); }
      elseif ($name == 'super_user') { $displayName = $message->getText("super_user"); }
      elseif ($name == 'config') { $displayName = $message->getText("config"); }
    return $displayName;
  }

  /**
   * @see PersistenceMapper::getAttributeDescription()
   */
  public function getAttributeDescription($name, Message $message) {
    $description = $name;
    if (false) {}
      elseif ($name == 'id') { $description = $message->getText(""); }
      elseif ($name == 'login') { $description = $message->getText(""); }
      elseif ($name == 'password') { $description = $message->getText(""); }
      elseif ($name == 'name') { $description = $message->getText(""); }
      elseif ($name == 'firstname') { $description = $message->getText(""); }
      elseif ($name == 'active') { $description = $message->getText(""); }
      elseif ($name == 'super_user') { $description = $message->getText(""); }
      elseif ($name == 'config') { $description = $message->getText(""); }
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
      'displayValues' => ['login', 'active', 'super_user'],
// PROTECTED REGION ID(app/src/model/wcmf/_base/UserRDBMapper.php/Properties) ENABLED START
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
      'UserConfig' => new RDBOneToManyRelationDescription(
        'app.src.model.wcmf.User', 'User', 'app.src.model.wcmf.UserConfig', 'UserConfig',
        '1', '1', '0', 'unbounded', 'none', 'composite', 'true', 'true', 'child', 'id', 'fk_user_id'
      ),
      'Role' => new RDBManyToManyRelationDescription(
      /* this -> nm  */ new RDBOneToManyRelationDescription(
        'app.src.model.wcmf.User', 'User', 'app.src.model.wcmf.NMUserRole', 'NMUserRole',
        '1', '1', '0', 'unbounded', 'none', 'shared', 'true', 'true', 'child', 'id', 'fk_user_id'
      ),
      /* nm -> other */ new RDBManyToOneRelationDescription(
        'app.src.model.wcmf.NMUserRole', 'NMUserRole', 'app.src.model.wcmf.Role', 'Role',
        '0', 'unbounded', '1', '1', 'shared', 'none', 'true', 'true', 'parent', 'id', 'fk_role_id'
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
      'id' => new RDBAttributeDescription('id', '', ['DATATYPE_IGNORE'], null, '', '', false, 'text', 'text', 'User', 'id'),
     /**
      *
      */
      'login' => new RDBAttributeDescription('login', 'String', ['DATATYPE_ATTRIBUTE'], null, '', '', true, 'text', 'text', 'User', 'login'),
     /**
      *
      */
      'password' => new RDBAttributeDescription('password', 'String', ['DATATYPE_ATTRIBUTE'], null, '', '', true, 'password', 'text', 'User', 'password'),
     /**
      *
      */
      'name' => new RDBAttributeDescription('name', 'String', ['DATATYPE_ATTRIBUTE'], null, '', '', true, 'text', 'text', 'User', 'name'),
     /**
      *
      */
      'firstname' => new RDBAttributeDescription('firstname', 'String', ['DATATYPE_ATTRIBUTE'], null, '', '', true, 'text', 'text', 'User', 'firstname'),
     /**
      *
      */
      'active' => new RDBAttributeDescription('active', 'Integer', ['DATATYPE_ATTRIBUTE'], 1, '', '', true, 'binarycheckbox', 'check', 'User', 'active'),
     /**
      *
      */
      'super_user' => new RDBAttributeDescription('super_user', 'Integer', ['DATATYPE_ATTRIBUTE'], 0, '', '', false, 'binarycheckbox', 'check', 'User', 'super_user'),
     /**
      *
      */
      'config' => new RDBAttributeDescription('config', 'String', ['DATATYPE_ATTRIBUTE'], null, '', '', true, 'select:{"list":{"type":"file","paths":["../config"],"pattern":"\\\\.ini$","emptyItem":""}}', 'text', 'User', 'config'),
    ];
  }

  /**
   * @see RDBMapper::createObject()
   */
  protected function createObject(ObjectId $oid=null, array $initialData=null) {
    return new User($oid, $initialData);
  }

  /**
   * @see NodeUnifiedRDBMapper::getTableName()
   */
  protected function getTableName() {
    return 'User';
  }
}

/**
 * Additional names to be included by l10n tools ([Pl.]: plural forms)
 * - $message->getText("User [Pl.]")
 * - $message->getText("UserConfig")
 * - $message->getText("UserConfig [Pl.]")
 * - $message->getText("NMUserRole")
 * - $message->getText("NMUserRole [Pl.]")
 * Restrictions descriptions to be included by l10n tools
 */