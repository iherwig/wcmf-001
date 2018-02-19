<?php
/**
 * This file was generated by ChronosGenerator wcmf-1.0.18.0001 from model.uml.
 * Manual modifications should be placed inside the protected regions.
 */
namespace app\src\model;

use app\src\model\_base\RatingBase;
// PROTECTED REGION ID(app/src/model/Rating.php/Import) ENABLED START
use wcmf\lib\core\ObjectFactory;
use wcmf\lib\persistence\BuildDepth;
use wcmf\lib\persistence\Criteria;
use wcmf\lib\validation\ValidationException;
// PROTECTED REGION END

/**
 * Rating
 *
 * @var id
 * @var fk_location_id
 * @var value (String)
 * @var created (Date)
 * @var creator (String)
 * @var modified (Date)
 * @var last_editor (String)
 * @rel Location (app.src.model.Location, n:1)
 */
class Rating extends RatingBase {
// PROTECTED REGION ID(app/src/model/Rating.php/Body) ENABLED START
  /**
   * @see PersistentObject::beforeUpdate()
   */
  public function beforeUpdate() {
    parent::beforeUpdate();

    $message = ObjectFactory::getInstance('message');

    // check if the user rated the same location already
    $session = ObjectFactory::getInstance('session');
    $authUserLogin = $session->getAuthUser();
    $location = $this->getValue('Location');
    if ($location) {
      $userRating = ObjectFactory::getInstance('persistenceFacade')->loadFirstObject(
          'Rating', BuildDepth::SINGLE, [
              new Criteria('Rating', 'id', '!=', $this->getValue('id')),
              new Criteria('Rating', 'creator', '=', $authUserLogin),
              new Criteria('Rating', 'fk_location_id', '=', $location->getValue('id'))
          ]
      );
      if ($userRating) {
        throw new ValidationException($message->getText('value'), $this->getValue('value'),
                $message->getText('A location can be rated only once per user')
        );
      }
    }
  }
// PROTECTED REGION END
}
