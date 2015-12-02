<?php

namespace Map;

use \Items;
use \ItemsQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'Items' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class ItemsTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = '.Map.ItemsTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'Items';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Items';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Items';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 10;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 10;

    /**
     * the column name for the Item_ID field
     */
    const COL_ITEM_ID = 'Items.Item_ID';

    /**
     * the column name for the Category_ID field
     */
    const COL_CATEGORY_ID = 'Items.Category_ID';

    /**
     * the column name for the User_ID field
     */
    const COL_USER_ID = 'Items.User_ID';

    /**
     * the column name for the Item_Name field
     */
    const COL_ITEM_NAME = 'Items.Item_Name';

    /**
     * the column name for the Price field
     */
    const COL_PRICE = 'Items.Price';

    /**
     * the column name for the Description field
     */
    const COL_DESCRIPTION = 'Items.Description';

    /**
     * the column name for the Date_Added field
     */
    const COL_DATE_ADDED = 'Items.Date_Added';

    /**
     * the column name for the Date_Sold field
     */
    const COL_DATE_SOLD = 'Items.Date_Sold';

    /**
     * the column name for the SubCategory_ID field
     */
    const COL_SUBCATEGORY_ID = 'Items.SubCategory_ID';

    /**
     * the column name for the Image_Url field
     */
    const COL_IMAGE_URL = 'Items.Image_Url';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('ItemId', 'CategoryId', 'UserId', 'ItemName', 'Price', 'Description', 'DateAdded', 'DateSold', 'SubcategoryId', 'ImageUrl', ),
        self::TYPE_CAMELNAME     => array('itemId', 'categoryId', 'userId', 'itemName', 'price', 'description', 'dateAdded', 'dateSold', 'subcategoryId', 'imageUrl', ),
        self::TYPE_COLNAME       => array(ItemsTableMap::COL_ITEM_ID, ItemsTableMap::COL_CATEGORY_ID, ItemsTableMap::COL_USER_ID, ItemsTableMap::COL_ITEM_NAME, ItemsTableMap::COL_PRICE, ItemsTableMap::COL_DESCRIPTION, ItemsTableMap::COL_DATE_ADDED, ItemsTableMap::COL_DATE_SOLD, ItemsTableMap::COL_SUBCATEGORY_ID, ItemsTableMap::COL_IMAGE_URL, ),
        self::TYPE_FIELDNAME     => array('Item_ID', 'Category_ID', 'User_ID', 'Item_Name', 'Price', 'Description', 'Date_Added', 'Date_Sold', 'SubCategory_ID', 'Image_Url', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('ItemId' => 0, 'CategoryId' => 1, 'UserId' => 2, 'ItemName' => 3, 'Price' => 4, 'Description' => 5, 'DateAdded' => 6, 'DateSold' => 7, 'SubcategoryId' => 8, 'ImageUrl' => 9, ),
        self::TYPE_CAMELNAME     => array('itemId' => 0, 'categoryId' => 1, 'userId' => 2, 'itemName' => 3, 'price' => 4, 'description' => 5, 'dateAdded' => 6, 'dateSold' => 7, 'subcategoryId' => 8, 'imageUrl' => 9, ),
        self::TYPE_COLNAME       => array(ItemsTableMap::COL_ITEM_ID => 0, ItemsTableMap::COL_CATEGORY_ID => 1, ItemsTableMap::COL_USER_ID => 2, ItemsTableMap::COL_ITEM_NAME => 3, ItemsTableMap::COL_PRICE => 4, ItemsTableMap::COL_DESCRIPTION => 5, ItemsTableMap::COL_DATE_ADDED => 6, ItemsTableMap::COL_DATE_SOLD => 7, ItemsTableMap::COL_SUBCATEGORY_ID => 8, ItemsTableMap::COL_IMAGE_URL => 9, ),
        self::TYPE_FIELDNAME     => array('Item_ID' => 0, 'Category_ID' => 1, 'User_ID' => 2, 'Item_Name' => 3, 'Price' => 4, 'Description' => 5, 'Date_Added' => 6, 'Date_Sold' => 7, 'SubCategory_ID' => 8, 'Image_Url' => 9, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('Items');
        $this->setPhpName('Items');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Items');
        $this->setPackage('');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('Item_ID', 'ItemId', 'INTEGER', true, null, null);
        $this->addForeignKey('Category_ID', 'CategoryId', 'INTEGER', 'Categories', 'Category_ID', true, null, null);
        $this->addForeignKey('User_ID', 'UserId', 'INTEGER', 'User', 'User_ID', true, null, null);
        $this->addColumn('Item_Name', 'ItemName', 'VARCHAR', true, 120, null);
        $this->addColumn('Price', 'Price', 'FLOAT', true, null, null);
        $this->addColumn('Description', 'Description', 'VARCHAR', false, 600, null);
        $this->addColumn('Date_Added', 'DateAdded', 'TIMESTAMP', true, null, 'CURRENT_TIMESTAMP');
        $this->addColumn('Date_Sold', 'DateSold', 'TIMESTAMP', false, null, null);
        $this->addForeignKey('SubCategory_ID', 'SubcategoryId', 'INTEGER', 'SubCategories', 'SubCategory_ID', false, null, null);
        $this->addColumn('Image_Url', 'ImageUrl', 'VARCHAR', false, 600, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Categories', '\\Categories', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':Category_ID',
    1 => ':Category_ID',
  ),
), null, null, null, false);
        $this->addRelation('Subcategories', '\\Subcategories', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':SubCategory_ID',
    1 => ':SubCategory_ID',
  ),
), null, null, null, false);
        $this->addRelation('User', '\\User', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':User_ID',
    1 => ':User_ID',
  ),
), null, null, null, false);
    } // buildRelations()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ItemId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ItemId', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('ItemId', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? ItemsTableMap::CLASS_DEFAULT : ItemsTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (Items object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = ItemsTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = ItemsTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + ItemsTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ItemsTableMap::OM_CLASS;
            /** @var Items $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            ItemsTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = ItemsTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = ItemsTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Items $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ItemsTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(ItemsTableMap::COL_ITEM_ID);
            $criteria->addSelectColumn(ItemsTableMap::COL_CATEGORY_ID);
            $criteria->addSelectColumn(ItemsTableMap::COL_USER_ID);
            $criteria->addSelectColumn(ItemsTableMap::COL_ITEM_NAME);
            $criteria->addSelectColumn(ItemsTableMap::COL_PRICE);
            $criteria->addSelectColumn(ItemsTableMap::COL_DESCRIPTION);
            $criteria->addSelectColumn(ItemsTableMap::COL_DATE_ADDED);
            $criteria->addSelectColumn(ItemsTableMap::COL_DATE_SOLD);
            $criteria->addSelectColumn(ItemsTableMap::COL_SUBCATEGORY_ID);
            $criteria->addSelectColumn(ItemsTableMap::COL_IMAGE_URL);
        } else {
            $criteria->addSelectColumn($alias . '.Item_ID');
            $criteria->addSelectColumn($alias . '.Category_ID');
            $criteria->addSelectColumn($alias . '.User_ID');
            $criteria->addSelectColumn($alias . '.Item_Name');
            $criteria->addSelectColumn($alias . '.Price');
            $criteria->addSelectColumn($alias . '.Description');
            $criteria->addSelectColumn($alias . '.Date_Added');
            $criteria->addSelectColumn($alias . '.Date_Sold');
            $criteria->addSelectColumn($alias . '.SubCategory_ID');
            $criteria->addSelectColumn($alias . '.Image_Url');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(ItemsTableMap::DATABASE_NAME)->getTable(ItemsTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(ItemsTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(ItemsTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new ItemsTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Items or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Items object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ItemsTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Items) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ItemsTableMap::DATABASE_NAME);
            $criteria->add(ItemsTableMap::COL_ITEM_ID, (array) $values, Criteria::IN);
        }

        $query = ItemsQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            ItemsTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                ItemsTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the Items table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return ItemsQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Items or Criteria object.
     *
     * @param mixed               $criteria Criteria or Items object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ItemsTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Items object
        }

        if ($criteria->containsKey(ItemsTableMap::COL_ITEM_ID) && $criteria->keyContainsValue(ItemsTableMap::COL_ITEM_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.ItemsTableMap::COL_ITEM_ID.')');
        }


        // Set the correct dbName
        $query = ItemsQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // ItemsTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
ItemsTableMap::buildTableMap();
