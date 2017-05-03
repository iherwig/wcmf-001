<?php
/**
 * This file was generated by ChronosGenerator wcmf-1.0.15.0001 from model.uml.
 * Manual modifications should be placed inside the protected regions.
 */
namespace app\src\model\wcmf\_base;

use wcmf\lib\model\Node;
use wcmf\lib\persistence\ObjectId;

/**
 * Instances of this class are used to localize entity attributes. Each instance defines a translation of one attribute of one entity into one language.
 */
abstract class TranslationBase extends Node {

  /**
   * Constructor
   * @param oid ObjectId instance (optional)
   */
  public function __construct(ObjectId $oid=null, array $initialData=null) {
    if ($oid == null) {
      $oid = new ObjectId('app.src.model.wcmf.Translation');
    }
    parent::__construct($oid, $initialData);
  }
}
