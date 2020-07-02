<?php
namespace Limbonia\Model;

/**
 * Limbonia User Model Class
 *
 * Model based wrapper around the User table
 *
 * @author Lonnie Blansett <lonnie@limbonia.tech>
 * @package Limbonia
 */
class User extends \Limbonia\Model\Base\User
{
  use \Limbonia\Traits\Model\UserCanBeContact;
  use \Limbonia\Traits\Model\UserHasRoles;
  use \Limbonia\Traits\Model\UserHasTickets;

  /**
   * The database schema for creating this model's table in the database
   *
   * @var string
   */
  protected static $sSchema = "UserID INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
Type ENUM('internal','contact','system') NOT NULL DEFAULT 'internal',
Email VARCHAR(255) NOT NULL,
FirstName VARCHAR(50) NULL,
LastName VARCHAR(50) NULL,
Position VARCHAR(100) NULL,
Notes mediumtext,
StreetAddress VARCHAR(255) NULL,
ShippingAddress VARCHAR(255) NULL,
City VARCHAR(50) NULL,
State VARCHAR(2) NULL,
Zip VARCHAR(9) NOT NULL DEFAULT '000000000',
Country VARCHAR(50) NULL,
WorkPhone VARCHAR(25) NULL,
HomePhone VARCHAR(25) NULL,
CellPhone VARCHAR(25) NULL,
Active TINYINT(1) NOT NULL DEFAULT 1,
Visible TINYINT(1) NOT NULL DEFAULT 1,
Password VARCHAR(255) BINARY NOT NULL DEFAULT '',
PRIMARY KEY (UserID),
UNIQUE INDEX Unique_Email (Email)";

  /**
   * The columns for this model's tables
   *
   * @var array
   */
  protected static $hColumns =
  [
    'UserID' =>
    [
      'Type' => 'int(10) unsigned',
      'Key' => 'Primary',
      'Default' => null,
      'Extra' => 'auto_increment',
    ],
    'Type' =>
    [
      'Type' => "enum('internal','contact','system')",
      'Default' => 'internal',
    ],
    'Email' =>
    [
      'Type' => 'varchar(255)',
      'Key' => 'UNI',
      'Default' => null
    ],
    'FirstName' =>
    [
      'Type' => 'varchar(50)',
      'Default' => null
    ],
    'LastName' =>
    [
      'Type' => 'varchar(50)',
      'Default' => null
    ],
    'Position' =>
    [
        'Type' => 'varchar(100)',
        'Default' => null
    ],
    'Notes' =>
    [
      'Type' => 'mediumtext',
      'Default' => ''
    ],

    'StreetAddress' =>
    [
      'Type' => 'varchar(255)',
      'Default' => null
    ],
    'ShippingAddress' =>
    [
      'Type' => 'varchar(255)',
      'Default' => null
    ],
    'City' =>
    [
      'Type' => 'varchar(50)',
      'Default' => null
    ],
    'State' =>
    [
      'Type' => 'varchar(2)',
      'Default' => null
    ],
    'Zip' =>
    [
      'Type' => 'varchar(9)',
      'Default' => '000000000'
    ],
    'Country' =>
    [
      'Type' => 'varchar(50)',
      'Default' => null
    ],
    'WorkPhone' =>
    [
      'Type' => 'varchar(25)',
      'Default' => null
    ],
    'HomePhone' =>
    [
      'Type' => 'varchar(25)',
      'Default' => null
    ],
    'CellPhone' =>
    [
      'Type' => 'varchar(25)',
      'Default' => null
    ],
    'Active' =>
    [
      'Type' => 'tinyint(1)',
      'Default' => 1
    ],
    'Visible' =>
    [
      'Type' => 'tinyint(1)',
      'Default' => 1
    ],
    'Password' =>
    [
      'Type' => 'varchar(255)',
      'Default' => ''
    ]
  ];

  /**
   * The aliases for this model's columns
   *
   * @var array
   */
  protected static $hColumnAlias =
  [
    'id' => 'UserID',
    'userid' => 'UserID',
    'type' => 'Type',
    'email' => 'Email',
    'firstname' => 'FirstName',
    'lastname' => 'LastName',
    'position' => 'Position',
    'notes' => 'Notes',
    'streetaddress' => 'StreetAddress',
    'shippingaddress' => 'ShippingAddress',
    'city' => 'City',
    'state' => 'State',
    'zip' => 'Zip',
    'country' => 'Country',
    'workphone' => 'WorkPhone',
    'homephone' => 'HomePhone',
    'cellphone' => 'CellPhone',
    'active' => 'Active',
    'visible' => 'Visible',
    'password' => 'Password'
  ];

  /**
   * The default data used for "blank" or "empty" models
   *
   * @var array
   */
  protected static $hDefaultData =
  [
    'UserID' => '',
    'Type' => 'internal',
    'Email' => '',
    'FirstName' => '',
    'LastName' => '',
    'Position' => '',
    'Notes' => '',
    'StreetAddress' => '',
    'ShippingAddress' => '',
    'City' => '',
    'State' => '',
    'Zip' => '000000000',
    'Country' => '',
    'WorkPhone' => '',
    'HomePhone' => '',
    'CellPhone' => '',
    'Active' => 1,
    'Visible' => 1,
    'Password' => ''
  ];

  /**
   * This object's data
   *
   * @var array
   */
  protected $hData =
  [
    'UserID' => '',
    'Type' => 'internal',
    'Email' => '',
    'FirstName' => '',
    'LastName' => '',
    'Position' => '',
    'Notes' => '',
    'StreetAddress' => '',
    'ShippingAddress' => '',
    'City' => '',
    'State' => '',
    'Zip' => '000000000',
    'Country' => '',
    'WorkPhone' => '',
    'HomePhone' => '',
    'CellPhone' => '',
    'Active' => 1,
    'Visible' => 1,
    'Password' => ''
  ];
}