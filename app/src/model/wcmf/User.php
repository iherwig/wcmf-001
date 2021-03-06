<?php
/**
 * This file was generated by ChronosGenerator wcmf-1.0.18.0001 from model.uml.
 * Manual modifications should be placed inside the protected regions.
 */
namespace app\src\model\wcmf;

use app\src\model\wcmf\_base\UserBase;
// PROTECTED REGION ID(app/src/model/wcmf/User.php/Import) ENABLED START
// PROTECTED REGION END

/**
 * User
 *
 * @var id
 * @var login (String)
 * @var password (String)
 * @var name (String)
 * @var firstname (String)
 * @var active (Integer, default: 1)
 * @var super_user (Integer, default: 0)
 * @var config (String)
 * @rel UserConfig (app.src.model.wcmf.UserConfig, 1:n)
 * @rel Role (app.src.model.wcmf.Role, n:m)
 */
class User extends UserBase {
// PROTECTED REGION ID(app/src/model/wcmf/User.php/Body) ENABLED START
// PROTECTED REGION END
}
