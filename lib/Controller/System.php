<?php
namespace Limbonia\Controller;

/**
 * Limbonia System Controller class
 *
 * Admin controller for handling all the basic system configuration and management
 *
 * @author Lonnie Blansett <lonnie@limbonia.tech>
 * @package Limbonia
 */
class System extends \Limbonia\Controller
{
  /**
   * Deactivate this controller then return a list of types that were deactivated
   *
   * @param array $hActiveController - the active controller list
   * @return array
   * @throws Exception on failure
   */
  public function deactivate(array $hActiveController)
  {
    throw new \Limbonia\Exception('The System controller can not be deactivated');
  }

  public function generateModelCode($sTable)
  {
    if (empty($sTable))
    {
      throw new \Limbonia\Exception("Table not specified");
    }

    $oDatabase = $this->oApp->getDB();

    if (!$oDatabase->hasTable($sTable))
    {
      throw new \Limbonia\Exception("Table not found: $sTable");
    }


    $hColumns = $oDatabase->getColumns($sTable);
    $sColumns = '';
    $sDefaultData = '';

    foreach ($hColumns as $sName => $hColumn)
    {
      $sDefault = 'null';

      if (isset($hColumn['Default']))
      {
        if (is_null($hColumn['Default']))
        {
          $sDefault = 'null';
        }
        elseif (\Limbonia\Database::columnIsString($hColumn))
        {
          $sDefault = "'" . addslashes($hColumn['Default']) . "'";
        }
        elseif (\Limbonia\Database::columnIsInteger($hColumn))
        {
          $sDefault = (integer)$hColumn['Default'];
        }
        elseif (\Limbonia\Database::columnIsFloat($hColumn))
        {
          $sDefault = (float)$hColumn['Default'];
        }
      }

      $sDefaultData .= "    '$sName' => $sDefault,\n";
      $sColumns .= "\n    '$sName' =>\n    [\n";

      foreach ($hColumn as $sSubName => $sValue)
      {
        if ($sSubName == 'Default')
        {
          if (is_null($sValue))
          {
            $sValue = 'null';
          }
          elseif (\Limbonia\Database::columnIsString($hColumn))
          {
            $sValue = "'$sValue'";
          }
          elseif (\Limbonia\Database::columnIsInteger($hColumn))
          {
            $sValue = (integer)$sValue;
          }
          elseif (\Limbonia\Database::columnIsFloat($hColumn))
          {
            $sValue = (float)$sValue;
          }
        }
        else
        {
          $sValue = "'$sValue'";
        }

        $sColumns .= "      '$sSubName' => $sValue,\n";
      }

      $sColumns = rtrim(rtrim($sColumns), ',') . "
    ],";
    }

    $sColumns = rtrim(rtrim($sColumns), ',');
    $hColumnAlias = \Limbonia\Database::aliasColumns($hColumns);
    $sColumnAlias = '';

    foreach ($hColumnAlias as $sAlias => $sColumn)
    {
      $sColumnAlias .= "    '$sAlias' => '$sColumn',\n";
    }

    $sColumnAlias = rtrim(rtrim($sColumnAlias), ',');
    $sDefaultData = rtrim(rtrim($sDefaultData), ',');
    $sIdColumn = isset($hColumnAlias['id']) ? "'{$hColumnAlias['id']}'" : 'false';

    return "<?php
namespace Limbonia\Model;

/**
 * Limbonia $sTable Model Class
 *
 * Model based wrapper around the User table
 *
 * @author Lonnie Blansett <lonnie@limbonia.tech>
 * @package Limbonia
 */
class $sTable extends \Limbonia\Model
{
  /**
   * The database schema for creating this model's table in the database
   *
   * @var string
   */
  protected static \$sSchema = \"" . $oDatabase->getSchema($sTable) . "\";

  /**
   * The columns for this model's tables
   *
   * @var array
   */
  protected static \$hColumns =
  [
$sColumns
  ];

  /**
   * The aliases for this model's columns
   *
   * @var array
   */
  protected static \$hColumnAlias =
  [
$sColumnAlias
  ];

  /**
   * The default data used for \"blank\" or \"empty\" models
   *
   * @var array
   */
  protected static \$hDefaultData =
  [
$sDefaultData
  ];

  /**
   * This object's data
   *
   * @var array
   */
  protected \$hData =
  [
$sDefaultData
  ];

  /**
   * List of columns that shouldn't be updated after the data has been created
   *
   * @var array
   */
  protected \$aNoUpdate = [$sIdColumn];

  /**
   * The table that this object is referencing
   *
   * @var string
   */
  protected \$sTable = '$sTable';

  /**
   * The name of the \"ID\" column associated with this object's table
   *
   * @var string
   */
  protected \$sIdColumn = $sIdColumn;
}";
  }
}