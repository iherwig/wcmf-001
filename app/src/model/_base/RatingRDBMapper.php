<?php
/**
 * This file was generated by ChronosGenerator wcmf-1.0.15.0001 from model.uml.
 * Manual modifications should be placed inside the protected regions.
 */
namespace app\src\model\_base;

use app\src\model\Rating;

use wcmf\lib\i18n\Message;
use wcmf\lib\model\mapper\NodeUnifiedRDBMapper;
use wcmf\lib\model\mapper\RDBAttributeDescription;
use wcmf\lib\model\mapper\RDBManyToManyRelationDescription;
use wcmf\lib\model\mapper\RDBManyToOneRelationDescription;
use wcmf\lib\model\mapper\RDBOneToManyRelationDescription;
use wcmf\lib\persistence\ReferenceDescription;
use wcmf\lib\persistence\ObjectId;

/**
 * RatingRDBMapper maps Rating Nodes to the database.
 */
class RatingRDBMapper extends NodeUnifiedRDBMapper {

  /**
   * @see RDBMapper::getType()
   */
  public function getType() {
    return 'app.src.model.Rating';
  }

  /**
   * @see PersistenceMapper::getTypeDisplayName()
   */
  public function getTypeDisplayName(Message $message) {
    return $message->getText("Rating");
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
      elseif ($name == 'fk_location_id') { $displayName = $message->getText("fk_location_id"); }
      elseif ($name == 'value') { $displayName = $message->getText("value"); }
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
      elseif ($name == 'fk_location_id') { $description = $message->getText(""); }
      elseif ($name == 'value') { $description = $message->getText(""); }
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
      'displayValues' => ['value'],
// PROTECTED REGION ID(app/src/model/_base/RatingRDBMapper.php/Properties) ENABLED START
// PROTECTED REGION END
    ];
  }

  /**
   * @see RDBMapper::getOwnDefaultOrder()
   */
  public function getOwnDefaultOrder($roleName=null) {
    $orderDefs = [];
    $orderDefs[] = ['sortFieldName' => 'value', 'sortDirection' => 'DESC', 'isSortkey' => false];
    return $orderDefs;
  }

  /**
   * @see RDBMapper::getRelationDescriptions()
   */
  protected function getRelationDescriptions() {
    return [
      'Location' => new RDBManyToOneRelationDescription(
        'app.src.model.Rating', 'Rating', 'app.src.model.Location', 'Location',
        '0', 'unbounded', '1', '1', 'composite', 'none', 'true', 'true', 'parent', 'id', 'fk_location_id'
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
      'id' => new RDBAttributeDescription('id', '', ['DATATYPE_IGNORE'], null, '', '', false, 'text', 'text', 'Rating', 'id'),
     /**
      *
      */
      'fk_location_id' => new RDBAttributeDescription('fk_location_id', '', ['DATATYPE_IGNORE'], null, '', '', false, 'text', 'text', 'Rating', 'fk_location_id'),
     /**
      *
      */
      'value' => new RDBAttributeDescription('value', 'String', ['DATATYPE_ATTRIBUTE'], null, '', '', true, 'select:{"list":{"type":"config","section":"rating"}}', 'text', 'Rating', 'file'),
     /**
      *
      */
      'created' => new RDBAttributeDescription('created', 'Date', ['DATATYPE_ATTRIBUTE', 'GROUP_INTERNAL'], null, '', '', false, 'text', 'text', 'Rating', 'created'),
     /**
      *
      */
      'creator' => new RDBAttributeDescription('creator', 'String', ['DATATYPE_ATTRIBUTE', 'GROUP_INTERNAL'], null, '', '', false, 'text', 'text', 'Rating', 'creator'),
     /**
      *
      */
      'modified' => new RDBAttributeDescription('modified', 'Date', ['DATATYPE_ATTRIBUTE', 'GROUP_INTERNAL'], null, '', '', false, 'text', 'text', 'Rating', 'modified'),
     /**
      *
      */
      'last_editor' => new RDBAttributeDescription('last_editor', 'String', ['DATATYPE_ATTRIBUTE', 'GROUP_INTERNAL'], null, '', '', false, 'text', 'text', 'Rating', 'last_editor'),
    ];
  }

  /**
   * @see RDBMapper::createObject()
   */
  protected function createObject(ObjectId $oid=null, array $initialData=null) {
    return new Rating($oid, $initialData);
  }

  /**
   * @see NodeUnifiedRDBMapper::getTableName()
   */
  protected function getTableName() {
    return 'Rating';
  }
}

/**
 * Additional names to be included by l10n tools ([Pl.]: plural forms)
 * - $message->getText("Rating [Pl.]")
 * - $message->getText("Location")
 * - $message->getText("Location [Pl.]")
 * Restrictions descriptions to be included by l10n tools
 */