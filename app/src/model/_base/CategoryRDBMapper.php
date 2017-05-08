<?php
/**
 * This file was generated by ChronosGenerator wcmf-1.0.15.0001 from model.uml.
 * Manual modifications should be placed inside the protected regions.
 */
namespace app\src\model\_base;

use app\src\model\Category;

use wcmf\lib\i18n\Message;
use wcmf\lib\model\mapper\NodeUnifiedRDBMapper;
use wcmf\lib\model\mapper\RDBAttributeDescription;
use wcmf\lib\model\mapper\RDBManyToManyRelationDescription;
use wcmf\lib\model\mapper\RDBManyToOneRelationDescription;
use wcmf\lib\model\mapper\RDBOneToManyRelationDescription;
use wcmf\lib\persistence\ReferenceDescription;
use wcmf\lib\persistence\ObjectId;

/**
 * CategoryRDBMapper maps Category Nodes to the database.
 */
class CategoryRDBMapper extends NodeUnifiedRDBMapper {

  /**
   * @see RDBMapper::getType()
   */
  public function getType() {
    return 'app.src.model.Category';
  }

  /**
   * @see PersistenceMapper::getTypeDisplayName()
   */
  public function getTypeDisplayName(Message $message) {
    return $message->getText("Category");
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
      elseif ($name == 'icon') { $displayName = $message->getText("icon"); }
      elseif ($name == 'color') { $displayName = $message->getText("color"); }
      elseif ($name == 'created') { $displayName = $message->getText("created"); }
      elseif ($name == 'creator') { $displayName = $message->getText("creator"); }
      elseif ($name == 'modified') { $displayName = $message->getText("modified"); }
      elseif ($name == 'last_editor') { $displayName = $message->getText("last_editor"); }
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
      elseif ($name == 'icon') { $description = $message->getText(""); }
      elseif ($name == 'color') { $description = $message->getText(""); }
      elseif ($name == 'created') { $description = $message->getText(""); }
      elseif ($name == 'creator') { $description = $message->getText(""); }
      elseif ($name == 'modified') { $description = $message->getText(""); }
      elseif ($name == 'last_editor') { $description = $message->getText(""); }
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
      'isSearchable' => true,
      'displayValues' => ['name'],
// PROTECTED REGION ID(app/src/model/_base/CategoryRDBMapper.php/Properties) ENABLED START
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
      'Location' => new RDBOneToManyRelationDescription(
        'app.src.model.Category', 'Category', 'app.src.model.Location', 'Location',
        '1', '1', '0', 'unbounded', 'none', 'composite', 'true', 'true', 'child', 'id', 'category'
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
      'id' => new RDBAttributeDescription('id', '', ['DATATYPE_IGNORE'], null, '', '', false, 'text', 'text', 'Category', 'id'),
     /**
      *
      */
      'name' => new RDBAttributeDescription('name', 'String', ['DATATYPE_ATTRIBUTE'], null, '', '', true, 'text', 'text', 'Category', 'name'),
     /**
      *
      */
      'icon' => new RDBAttributeDescription('icon', 'String', ['DATATYPE_ATTRIBUTE'], null, '', '', true, 'text', 'text', 'Category', 'icon'),
     /**
      *
      */
      'color' => new RDBAttributeDescription('color', 'String', ['DATATYPE_ATTRIBUTE'], null, '', '', true, 'color', 'color', 'Category', 'color'),
     /**
      *
      */
      'created' => new RDBAttributeDescription('created', 'Date', ['DATATYPE_ATTRIBUTE', 'GROUP_INTERNAL'], null, '', '', false, 'text', 'text', 'Category', 'created'),
     /**
      *
      */
      'creator' => new RDBAttributeDescription('creator', 'String', ['DATATYPE_ATTRIBUTE', 'GROUP_INTERNAL'], null, '', '', false, 'text', 'text', 'Category', 'creator'),
     /**
      *
      */
      'modified' => new RDBAttributeDescription('modified', 'Date', ['DATATYPE_ATTRIBUTE', 'GROUP_INTERNAL'], null, '', '', false, 'text', 'text', 'Category', 'modified'),
     /**
      *
      */
      'last_editor' => new RDBAttributeDescription('last_editor', 'String', ['DATATYPE_ATTRIBUTE', 'GROUP_INTERNAL'], null, '', '', false, 'text', 'text', 'Category', 'last_editor'),
    ];
  }

  /**
   * @see RDBMapper::createObject()
   */
  protected function createObject(ObjectId $oid=null, array $initialData=null) {
    return new Category($oid, $initialData);
  }

  /**
   * @see NodeUnifiedRDBMapper::getTableName()
   */
  protected function getTableName() {
    return 'Category';
  }
}

/**
 * Additional names to be included by l10n tools ([Pl.]: plural forms)
 * - $message->getText("Category [Pl.]")
 * - $message->getText("Location")
 * - $message->getText("Location [Pl.]")
 * Restrictions descriptions to be included by l10n tools
 */
