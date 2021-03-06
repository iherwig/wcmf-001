<?php
/**
 * This file was generated by ChronosGenerator wcmf-1.0.18.0001 from model.uml.
 * Manual modifications should be placed inside the protected regions.
 */
namespace app\src\model\wcmf\_base;

use app\src\model\wcmf\Translation;

use wcmf\lib\i18n\Message;
use wcmf\lib\model\mapper\RDBAttributeDescription;
use wcmf\lib\model\mapper\RDBManyToManyRelationDescription;
use wcmf\lib\model\mapper\RDBManyToOneRelationDescription;
use wcmf\lib\model\mapper\RDBOneToManyRelationDescription;
use wcmf\lib\model\mapper\impl\NodeUnifiedRDBMapper;
use wcmf\lib\persistence\ReferenceDescription;
use wcmf\lib\persistence\TransientAttributeDescription;
use wcmf\lib\persistence\ObjectId;

/**
 * TranslationRDBMapper maps Translation Nodes to the database.
 * Instances of this class are used to localize entity attributes. Each instance defines a translation of one attribute of one entity into one language. */
class TranslationRDBMapper extends NodeUnifiedRDBMapper {

  /**
   * @see RDBMapper::getType()
   */
  public function getType() {
    return 'app.src.model.wcmf.Translation';
  }

  /**
   * @see PersistenceMapper::getTypeDisplayName()
   */
  public function getTypeDisplayName(Message $message) {
    return $message->getText("Translation");
  }

  /**
   * @see PersistenceMapper::getTypeDescription()
   */
  public function getTypeDescription(Message $message) {
    return $message->getText("Instances of this class are used to localize entity attributes. Each instance defines a translation of one attribute of one entity into one language.");
  }

  /**
   * @see PersistenceMapper::getAttributeDisplayName()
   */
  public function getAttributeDisplayName($name, Message $message) {
    $displayName = $name;
    if (false) {}
      elseif ($name == 'id') { $displayName = $message->getText("id"); }
      elseif ($name == 'objectid') { $displayName = $message->getText("objectid"); }
      elseif ($name == 'attribute') { $displayName = $message->getText("attribute"); }
      elseif ($name == 'translation') { $displayName = $message->getText("translation"); }
      elseif ($name == 'language') { $displayName = $message->getText("language"); }
    return $displayName;
  }

  /**
   * @see PersistenceMapper::getAttributeDescription()
   */
  public function getAttributeDescription($name, Message $message) {
    $description = $name;
    if (false) {}
      elseif ($name == 'id') { $description = $message->getText(""); }
      elseif ($name == 'objectid') { $description = $message->getText("The object id of the object to which the translation belongs"); }
      elseif ($name == 'attribute') { $description = $message->getText("The attribute of the object that is translated"); }
      elseif ($name == 'translation') { $description = $message->getText("The translation"); }
      elseif ($name == 'language') { $description = $message->getText("The language of the translation"); }
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
      'displayValues' => ['objectid', 'attribute', 'language'],
// PROTECTED REGION ID(app/src/model/wcmf/_base/TranslationRDBMapper.php/Properties) ENABLED START
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
      'id' => new RDBAttributeDescription('id', 'Integer', ['DATATYPE_IGNORE'], null, '', '', false, 'text', 'text', 'Translation', 'id'),
     /**
      * The object id of the object to which the translation belongs
      */
      'objectid' => new RDBAttributeDescription('objectid', 'String', ['DATATYPE_ATTRIBUTE'], null, '', '', false, 'text', 'text', 'Translation', 'objectid'),
     /**
      * The attribute of the object that is translated
      */
      'attribute' => new RDBAttributeDescription('attribute', 'String', ['DATATYPE_ATTRIBUTE'], null, '', '', false, 'text', 'text', 'Translation', 'attribute'),
     /**
      * The translation
      */
      'translation' => new RDBAttributeDescription('translation', 'String', ['DATATYPE_ATTRIBUTE'], null, '', '', false, 'textarea', 'text', 'Translation', 'translation'),
     /**
      * The language of the translation
      */
      'language' => new RDBAttributeDescription('language', 'String', ['DATATYPE_ATTRIBUTE'], null, '', '', false, 'text', 'text', 'Translation', 'language'),
    ];
  }

  /**
   * @see RDBMapper::createObject()
   */
  protected function createObject(ObjectId $oid=null, array $initialData=null) {
    return new Translation($oid, $initialData);
  }

  /**
   * @see NodeUnifiedRDBMapper::getTableName()
   */
  protected function getTableName() {
    return 'Translation';
  }
}

/**
 * Additional names to be included by l10n tools ([Pl.]: plural forms)
 * - $message->getText("Translation [Pl.]")
 * Restrictions descriptions to be included by l10n tools
 */
