<?php
namespace Limbonia\Controller;

/**
 * Limbonia Profile Controller class
 *
 * Admin controller for handling the profile of the logged in user
 *
 * @author Lonnie Blansett <lonnie@limbonia.tech>
 * @package Limbonia
 */
class Profile extends \Limbonia\Controller
{
  use \Limbonia\Traits\Controller\HasModel;

  /**
   * List of components that this controller contains along with their descriptions
   *
   * @var array
   */
  protected static $hComponent =
  [
    'search' => 'This is the ability to search and display data.',
    'edit' => 'The ability to edit existing data.'
  ];

  /**
   * List of controllers this controller depends on to function correctly
   *
   * @var array
   */
  protected static $aControllerDependencies = ['user'];

  /**
   * The type of controller this is
   *
   * @var string
   */
  protected $sType = 'Profile';

  /**
   * Lists of columns to ignore when filling view data
   *
   * @var array
   */
  protected $aIgnore =
  [
    'edit' =>
    [
      'UserID',
      'Password',
      'Type',
      'Position',
      'Notes',
      'Active',
      'Visible'
    ],
    'create' => [],
    'search' =>
    [
      'Password',
      'ShippingAddress',
      'StreetAddress',
      'Notes'
    ],
    'view' =>
    [
      'Password',
      'Type',
      'Notes',
      'Active',
      'Visible'
    ],
    'boolean' =>
    [
      'Active',
      'Visible'
    ]
  ];

  /**
   * Generate and set this controller's model, if there is one
   */
  protected function init()
  {
    $this->oModel = $this->oApp->user();
  }
}