<?php
namespace Limbonia\Controller\Base;

/**
 * Limbonia User Controller class
 *
 * Admin controller for handling users
 *
 * @author Lonnie Blansett <lonnie@limbonia.tech>
 * @package Limbonia
 */
class User extends \Limbonia\Controller\Base
{
  use \Limbonia\Traits\Controller\BaseModel;

  /**
   * List of controllers this controller depends on to function correctly
   *
   * @var array
   */
  protected static $aControllerDependencies =
  [
    'resourcekey',
    'resourcelock',
    'role'
  ];

  /**
   * Lists of columns to ignore when filling view data
   *
   * @var array
   */
  protected $aIgnore =
  [
    'edit' =>
    [
      'Password'
    ],
    'create' => [],
    'search' =>
    [
      'Password',
      'ShippingAddress',
      'Country',
      'Notes',
      'StreetAddress',
      'City',
      'State',
      'Zip',
      'HomePhone',
      'CellPhone',
      'Active',
      'Visible'
    ],
    'view' =>
    [
      'Password'
    ]
  ];
}