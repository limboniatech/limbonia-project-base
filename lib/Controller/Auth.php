<?php
namespace Limbonia\Controller;

/**
 * Limbonia Auth Controller class
 *
 * Admin controller for handling user authentication
 *
 * @author Lonnie Blansett <lonnie@limbonia.tech>
 * @package Limbonia
 */
class Auth extends \Limbonia\Controller
{
  /**
   * Do whatever setup is needed to make this controller work...
   *
   * @throws Exception on failure
   */
  public function setup()
  {
    $this->oApp->getDB()->createTable('UserAuth', "UserID INTEGER UNSIGNED NOT NULL,
AuthToken VARCHAR(255) NOT NULL,
LastUseTime TIMESTAMP NOT NULL,
INDEX Unique_UserAuth(UserID, AuthToken)");
  }

  /**
   * Deactivate this controller then return a list of types that were deactivated
   *
   * @param array $hActiveController - the active controller list
   * @return array
   * @throws Exception on failure
   */
  public function deactivate(array $hActiveController)
  {
    //check if an other auth controller is active and if so then allow deactivation
    //otherwise throw an exception
    throw new \Limbonia\Exception("The system requires an auth controller so this can *not* be deactivated");
  }

  /**
   * Should the specified component type be allowed to be used by the current user of this controller?
   *
   * @param string $sComponent
   * @return boolean
   */
  public function allow($sComponent)
  {
    if ($this->oRouter->method == 'post')
    {
      return true;
    }

    return parent::allow($sComponent);
  }
}