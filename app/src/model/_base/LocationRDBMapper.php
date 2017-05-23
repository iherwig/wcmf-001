<?php
/**
 * This file was generated by ChronosGenerator wcmf-1.0.16.0001 from model.uml.
 * Manual modifications should be placed inside the protected regions.
 */
namespace app\src\model\_base;

use app\src\model\Location;

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
 * LocationRDBMapper maps Location Nodes to the database.
 */
class LocationRDBMapper extends NodeUnifiedRDBMapper {

  /**
   * @see RDBMapper::getType()
   */
  public function getType() {
    return 'app.src.model.Location';
  }

  /**
   * @see PersistenceMapper::getTypeDisplayName()
   */
  public function getTypeDisplayName(Message $message) {
    return $message->getText("Location");
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
      elseif ($name == 'category') { $displayName = $message->getText("category"); }
      elseif ($name == 'name') { $displayName = $message->getText("name"); }
      elseif ($name == 'user') { $displayName = $message->getText("user"); }
      elseif ($name == 'address') { $displayName = $message->getText("address"); }
      elseif ($name == 'website') { $displayName = $message->getText("website"); }
      elseif ($name == 'notes') { $displayName = $message->getText("notes"); }
      elseif ($name == 'archived') { $displayName = $message->getText("archived"); }
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
      elseif ($name == 'category') { $description = $message->getText(""); }
      elseif ($name == 'name') { $description = $message->getText(""); }
      elseif ($name == 'user') { $description = $message->getText(""); }
      elseif ($name == 'address') { $description = $message->getText(""); }
      elseif ($name == 'website') { $description = $message->getText(""); }
      elseif ($name == 'notes') { $description = $message->getText(""); }
      elseif ($name == 'archived') { $description = $message->getText(""); }
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
      'relationOrder' => ['Category', 'Rating', 'Image'],
// PROTECTED REGION ID(app/src/model/_base/LocationRDBMapper.php/Properties) ENABLED START
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
      'Rating' => new RDBOneToManyRelationDescription(
        'app.src.model.Location', 'Location', 'app.src.model.Rating', 'Rating',
        '1', '1', '0', 'unbounded', 'none', 'composite', 'true', 'true', 'child', 'id', 'fk_location_id'
      ),
      'Image' => new RDBOneToManyRelationDescription(
        'app.src.model.Location', 'Location', 'app.src.model.Image', 'Image',
        '1', '1', '0', 'unbounded', 'none', 'composite', 'true', 'true', 'child', 'id', 'fk_location_id'
      ),
      'Category' => new RDBManyToOneRelationDescription(
        'app.src.model.Location', 'Location', 'app.src.model.Category', 'Category',
        '0', 'unbounded', '1', '1', 'composite', 'none', 'true', 'true', 'parent', 'id', 'category'
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
      'id' => new RDBAttributeDescription('id', 'Integer', ['DATATYPE_IGNORE'], null, '', '', false, 'text', 'text', 'Location', 'id'),
     /**
      *
      */
      'category' => new RDBAttributeDescription('category', 'Integer', ['DATATYPE_IGNORE'], null, '', '', false, 'text', 'text', 'Location', 'category'),
     /**
      *
      */
      'name' => new RDBAttributeDescription('name', 'String', ['DATATYPE_ATTRIBUTE'], null, '', '', true, 'text', 'text', 'Location', 'name'),
     /**
      *
      */
      'user' => new RDBAttributeDescription('user', 'String', ['DATATYPE_ATTRIBUTE'], null, '', '', true, 'select:{"list":{"type":"node","types":["User"],"emptyItem":""}}', 'text', 'Location', 'user'),
     /**
      *
      */
      'address' => new RDBAttributeDescription('address', 'String', ['DATATYPE_ATTRIBUTE'], null, '', '', true, 'textarea', 'text', 'Location', 'address'),
     /**
      *
      */
      'website' => new RDBAttributeDescription('website', 'String', ['DATATYPE_ATTRIBUTE'], null, '', '', true, 'text', 'text', 'Location', 'website'),
     /**
      *
      */
      'notes' => new RDBAttributeDescription('notes', 'String', ['DATATYPE_ATTRIBUTE'], null, '', '', true, 'ckeditor:{"toolbarSet":"wcmf"}', 'text', 'Location', 'notes'),
     /**
      *
      */
      'archived' => new RDBAttributeDescription('archived', 'Integer', ['DATATYPE_ATTRIBUTE'], null, '', '', true, 'binarycheckbox', 'check', 'Location', 'archived'),
     /**
      *
      */
      'rating' => new TransientAttributeDescription('rating', 'Integer'),
     /**
      *
      */
      'created' => new RDBAttributeDescription('created', 'Date', ['DATATYPE_ATTRIBUTE', 'GROUP_INTERNAL'], null, '', '', false, 'text', 'text', 'Location', 'created'),
     /**
      *
      */
      'creator' => new RDBAttributeDescription('creator', 'String', ['DATATYPE_ATTRIBUTE', 'GROUP_INTERNAL'], null, '', '', false, 'text', 'text', 'Location', 'creator'),
     /**
      *
      */
      'modified' => new RDBAttributeDescription('modified', 'Date', ['DATATYPE_ATTRIBUTE', 'GROUP_INTERNAL'], null, '', '', false, 'text', 'text', 'Location', 'modified'),
     /**
      *
      */
      'last_editor' => new RDBAttributeDescription('last_editor', 'String', ['DATATYPE_ATTRIBUTE', 'GROUP_INTERNAL'], null, '', '', false, 'text', 'text', 'Location', 'last_editor'),
    ];
  }

  /**
   * @see RDBMapper::createObject()
   */
  protected function createObject(ObjectId $oid=null, array $initialData=null) {
    return new Location($oid, $initialData);
  }

  /**
   * @see NodeUnifiedRDBMapper::getTableName()
   */
  protected function getTableName() {
    return 'Location';
  }
}

/**
 * Additional names to be included by l10n tools ([Pl.]: plural forms)
 * - $message->getText("Location [Pl.]")
 * - $message->getText("Category")
 * - $message->getText("Category [Pl.]")
 * - $message->getText("Rating")
 * - $message->getText("Rating [Pl.]")
 * - $message->getText("Image")
 * - $message->getText("Image [Pl.]")
 * Restrictions descriptions to be included by l10n tools
 */
