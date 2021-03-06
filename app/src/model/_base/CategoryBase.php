<?php
/**
 * This file was generated by ChronosGenerator wcmf-1.0.18.0001 from model.uml.
 * Manual modifications should be placed inside the protected regions.
 */
namespace app\src\model\_base;

use app\src\model\EntityBase;
use wcmf\lib\persistence\ObjectId;

/**
 * Category
 */
abstract class CategoryBase extends EntityBase {

  /**
   * Constructor
   * @param oid ObjectId instance (optional)
   */
  public function __construct(ObjectId $oid=null, array $initialData=null) {
    if ($oid == null) {
      $oid = new ObjectId('app.src.model.Category');
    }
    parent::__construct($oid, $initialData);
  }

  /**
   * Get the Marker instances in the marker relation
   * @return Array of Marker instances
   */
  public function getMarkerList() {
    return $this->getValue('marker');
  }

  /**
   * Set the Marker instances in the marker relation
   * @param nodeList Array of Marker instances
   */
  public function setMarkerList(array $nodeList) {
    $this->setValue('marker', null);
    foreach ($nodeList as $node) {
      $this->addNode($node, 'marker');
    }
  }

  /**
   * Get the Location instances in the Location relation
   * @return Array of Location instances
   */
  public function getLocationList() {
    return $this->getValue('Location');
  }

  /**
   * Set the Location instances in the Location relation
   * @param nodeList Array of Location instances
   */
  public function setLocationList(array $nodeList) {
    $this->setValue('Location', null);
    foreach ($nodeList as $node) {
      $this->addNode($node, 'Location');
    }
  }
}
