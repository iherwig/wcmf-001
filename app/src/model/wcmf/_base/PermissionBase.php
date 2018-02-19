<?php
/**
 * This file was generated by ChronosGenerator wcmf-1.0.18.0001 from model.uml.
 * Manual modifications should be placed inside the protected regions.
 */
namespace app\src\model\wcmf\_base;

use wcmf\lib\model\Node;
use wcmf\lib\persistence\ObjectId;

/**
 * Permission
 */
abstract class PermissionBase extends Node {

  /**
   * Constructor
   * @param oid ObjectId instance (optional)
   */
  public function __construct(ObjectId $oid=null, array $initialData=null) {
    if ($oid == null) {
      $oid = new ObjectId('app.src.model.wcmf.Permission');
    }
    parent::__construct($oid, $initialData);
  }
}
