<?php

namespace Base;

use \Items as ChildItems;
use \ItemsQuery as ChildItemsQuery;
use \Exception;
use \PDO;
use Map\ItemsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'Items' table.
 *
 *
 *
 * @method     ChildItemsQuery orderByItemId($order = Criteria::ASC) Order by the Item_ID column
 * @method     ChildItemsQuery orderByCategoryId($order = Criteria::ASC) Order by the Category_ID column
 * @method     ChildItemsQuery orderByUserId($order = Criteria::ASC) Order by the User_ID column
 * @method     ChildItemsQuery orderByItemName($order = Criteria::ASC) Order by the Item_Name column
 * @method     ChildItemsQuery orderByPrice($order = Criteria::ASC) Order by the Price column
 * @method     ChildItemsQuery orderByDescription($order = Criteria::ASC) Order by the Description column
 * @method     ChildItemsQuery orderByDateAdded($order = Criteria::ASC) Order by the Date_Added column
 * @method     ChildItemsQuery orderByDateSold($order = Criteria::ASC) Order by the Date_Sold column
 * @method     ChildItemsQuery orderBySubcategoryId($order = Criteria::ASC) Order by the SubCategory_ID column
 * @method     ChildItemsQuery orderByImageUrl($order = Criteria::ASC) Order by the Image_Url column
 *
 * @method     ChildItemsQuery groupByItemId() Group by the Item_ID column
 * @method     ChildItemsQuery groupByCategoryId() Group by the Category_ID column
 * @method     ChildItemsQuery groupByUserId() Group by the User_ID column
 * @method     ChildItemsQuery groupByItemName() Group by the Item_Name column
 * @method     ChildItemsQuery groupByPrice() Group by the Price column
 * @method     ChildItemsQuery groupByDescription() Group by the Description column
 * @method     ChildItemsQuery groupByDateAdded() Group by the Date_Added column
 * @method     ChildItemsQuery groupByDateSold() Group by the Date_Sold column
 * @method     ChildItemsQuery groupBySubcategoryId() Group by the SubCategory_ID column
 * @method     ChildItemsQuery groupByImageUrl() Group by the Image_Url column
 *
 * @method     ChildItemsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildItemsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildItemsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildItemsQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildItemsQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildItemsQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildItemsQuery leftJoinCategories($relationAlias = null) Adds a LEFT JOIN clause to the query using the Categories relation
 * @method     ChildItemsQuery rightJoinCategories($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Categories relation
 * @method     ChildItemsQuery innerJoinCategories($relationAlias = null) Adds a INNER JOIN clause to the query using the Categories relation
 *
 * @method     ChildItemsQuery joinWithCategories($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Categories relation
 *
 * @method     ChildItemsQuery leftJoinWithCategories() Adds a LEFT JOIN clause and with to the query using the Categories relation
 * @method     ChildItemsQuery rightJoinWithCategories() Adds a RIGHT JOIN clause and with to the query using the Categories relation
 * @method     ChildItemsQuery innerJoinWithCategories() Adds a INNER JOIN clause and with to the query using the Categories relation
 *
 * @method     ChildItemsQuery leftJoinSubcategories($relationAlias = null) Adds a LEFT JOIN clause to the query using the Subcategories relation
 * @method     ChildItemsQuery rightJoinSubcategories($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Subcategories relation
 * @method     ChildItemsQuery innerJoinSubcategories($relationAlias = null) Adds a INNER JOIN clause to the query using the Subcategories relation
 *
 * @method     ChildItemsQuery joinWithSubcategories($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Subcategories relation
 *
 * @method     ChildItemsQuery leftJoinWithSubcategories() Adds a LEFT JOIN clause and with to the query using the Subcategories relation
 * @method     ChildItemsQuery rightJoinWithSubcategories() Adds a RIGHT JOIN clause and with to the query using the Subcategories relation
 * @method     ChildItemsQuery innerJoinWithSubcategories() Adds a INNER JOIN clause and with to the query using the Subcategories relation
 *
 * @method     ChildItemsQuery leftJoinUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the User relation
 * @method     ChildItemsQuery rightJoinUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the User relation
 * @method     ChildItemsQuery innerJoinUser($relationAlias = null) Adds a INNER JOIN clause to the query using the User relation
 *
 * @method     ChildItemsQuery joinWithUser($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the User relation
 *
 * @method     ChildItemsQuery leftJoinWithUser() Adds a LEFT JOIN clause and with to the query using the User relation
 * @method     ChildItemsQuery rightJoinWithUser() Adds a RIGHT JOIN clause and with to the query using the User relation
 * @method     ChildItemsQuery innerJoinWithUser() Adds a INNER JOIN clause and with to the query using the User relation
 *
 * @method     \CategoriesQuery|\SubcategoriesQuery|\UserQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildItems findOne(ConnectionInterface $con = null) Return the first ChildItems matching the query
 * @method     ChildItems findOneOrCreate(ConnectionInterface $con = null) Return the first ChildItems matching the query, or a new ChildItems object populated from the query conditions when no match is found
 *
 * @method     ChildItems findOneByItemId(int $Item_ID) Return the first ChildItems filtered by the Item_ID column
 * @method     ChildItems findOneByCategoryId(int $Category_ID) Return the first ChildItems filtered by the Category_ID column
 * @method     ChildItems findOneByUserId(int $User_ID) Return the first ChildItems filtered by the User_ID column
 * @method     ChildItems findOneByItemName(string $Item_Name) Return the first ChildItems filtered by the Item_Name column
 * @method     ChildItems findOneByPrice(double $Price) Return the first ChildItems filtered by the Price column
 * @method     ChildItems findOneByDescription(string $Description) Return the first ChildItems filtered by the Description column
 * @method     ChildItems findOneByDateAdded(string $Date_Added) Return the first ChildItems filtered by the Date_Added column
 * @method     ChildItems findOneByDateSold(string $Date_Sold) Return the first ChildItems filtered by the Date_Sold column
 * @method     ChildItems findOneBySubcategoryId(int $SubCategory_ID) Return the first ChildItems filtered by the SubCategory_ID column
 * @method     ChildItems findOneByImageUrl(string $Image_Url) Return the first ChildItems filtered by the Image_Url column *

 * @method     ChildItems requirePk($key, ConnectionInterface $con = null) Return the ChildItems by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildItems requireOne(ConnectionInterface $con = null) Return the first ChildItems matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildItems requireOneByItemId(int $Item_ID) Return the first ChildItems filtered by the Item_ID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildItems requireOneByCategoryId(int $Category_ID) Return the first ChildItems filtered by the Category_ID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildItems requireOneByUserId(int $User_ID) Return the first ChildItems filtered by the User_ID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildItems requireOneByItemName(string $Item_Name) Return the first ChildItems filtered by the Item_Name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildItems requireOneByPrice(double $Price) Return the first ChildItems filtered by the Price column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildItems requireOneByDescription(string $Description) Return the first ChildItems filtered by the Description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildItems requireOneByDateAdded(string $Date_Added) Return the first ChildItems filtered by the Date_Added column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildItems requireOneByDateSold(string $Date_Sold) Return the first ChildItems filtered by the Date_Sold column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildItems requireOneBySubcategoryId(int $SubCategory_ID) Return the first ChildItems filtered by the SubCategory_ID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildItems requireOneByImageUrl(string $Image_Url) Return the first ChildItems filtered by the Image_Url column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildItems[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildItems objects based on current ModelCriteria
 * @method     ChildItems[]|ObjectCollection findByItemId(int $Item_ID) Return ChildItems objects filtered by the Item_ID column
 * @method     ChildItems[]|ObjectCollection findByCategoryId(int $Category_ID) Return ChildItems objects filtered by the Category_ID column
 * @method     ChildItems[]|ObjectCollection findByUserId(int $User_ID) Return ChildItems objects filtered by the User_ID column
 * @method     ChildItems[]|ObjectCollection findByItemName(string $Item_Name) Return ChildItems objects filtered by the Item_Name column
 * @method     ChildItems[]|ObjectCollection findByPrice(double $Price) Return ChildItems objects filtered by the Price column
 * @method     ChildItems[]|ObjectCollection findByDescription(string $Description) Return ChildItems objects filtered by the Description column
 * @method     ChildItems[]|ObjectCollection findByDateAdded(string $Date_Added) Return ChildItems objects filtered by the Date_Added column
 * @method     ChildItems[]|ObjectCollection findByDateSold(string $Date_Sold) Return ChildItems objects filtered by the Date_Sold column
 * @method     ChildItems[]|ObjectCollection findBySubcategoryId(int $SubCategory_ID) Return ChildItems objects filtered by the SubCategory_ID column
 * @method     ChildItems[]|ObjectCollection findByImageUrl(string $Image_Url) Return ChildItems objects filtered by the Image_Url column
 * @method     ChildItems[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ItemsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ItemsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Items', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildItemsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildItemsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildItemsQuery) {
            return $criteria;
        }
        $query = new ChildItemsQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildItems|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = ItemsTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ItemsTableMap::DATABASE_NAME);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildItems A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT Item_ID, Category_ID, User_ID, Item_Name, Price, Description, Date_Added, Date_Sold, SubCategory_ID, Image_Url FROM Items WHERE Item_ID = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildItems $obj */
            $obj = new ChildItems();
            $obj->hydrate($row);
            ItemsTableMap::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildItems|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildItemsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ItemsTableMap::COL_ITEM_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildItemsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ItemsTableMap::COL_ITEM_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the Item_ID column
     *
     * Example usage:
     * <code>
     * $query->filterByItemId(1234); // WHERE Item_ID = 1234
     * $query->filterByItemId(array(12, 34)); // WHERE Item_ID IN (12, 34)
     * $query->filterByItemId(array('min' => 12)); // WHERE Item_ID > 12
     * </code>
     *
     * @param     mixed $itemId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildItemsQuery The current query, for fluid interface
     */
    public function filterByItemId($itemId = null, $comparison = null)
    {
        if (is_array($itemId)) {
            $useMinMax = false;
            if (isset($itemId['min'])) {
                $this->addUsingAlias(ItemsTableMap::COL_ITEM_ID, $itemId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($itemId['max'])) {
                $this->addUsingAlias(ItemsTableMap::COL_ITEM_ID, $itemId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ItemsTableMap::COL_ITEM_ID, $itemId, $comparison);
    }

    /**
     * Filter the query on the Category_ID column
     *
     * Example usage:
     * <code>
     * $query->filterByCategoryId(1234); // WHERE Category_ID = 1234
     * $query->filterByCategoryId(array(12, 34)); // WHERE Category_ID IN (12, 34)
     * $query->filterByCategoryId(array('min' => 12)); // WHERE Category_ID > 12
     * </code>
     *
     * @see       filterByCategories()
     *
     * @param     mixed $categoryId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildItemsQuery The current query, for fluid interface
     */
    public function filterByCategoryId($categoryId = null, $comparison = null)
    {
        if (is_array($categoryId)) {
            $useMinMax = false;
            if (isset($categoryId['min'])) {
                $this->addUsingAlias(ItemsTableMap::COL_CATEGORY_ID, $categoryId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($categoryId['max'])) {
                $this->addUsingAlias(ItemsTableMap::COL_CATEGORY_ID, $categoryId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ItemsTableMap::COL_CATEGORY_ID, $categoryId, $comparison);
    }

    /**
     * Filter the query on the User_ID column
     *
     * Example usage:
     * <code>
     * $query->filterByUserId(1234); // WHERE User_ID = 1234
     * $query->filterByUserId(array(12, 34)); // WHERE User_ID IN (12, 34)
     * $query->filterByUserId(array('min' => 12)); // WHERE User_ID > 12
     * </code>
     *
     * @see       filterByUser()
     *
     * @param     mixed $userId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildItemsQuery The current query, for fluid interface
     */
    public function filterByUserId($userId = null, $comparison = null)
    {
        if (is_array($userId)) {
            $useMinMax = false;
            if (isset($userId['min'])) {
                $this->addUsingAlias(ItemsTableMap::COL_USER_ID, $userId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($userId['max'])) {
                $this->addUsingAlias(ItemsTableMap::COL_USER_ID, $userId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ItemsTableMap::COL_USER_ID, $userId, $comparison);
    }

    /**
     * Filter the query on the Item_Name column
     *
     * Example usage:
     * <code>
     * $query->filterByItemName('fooValue');   // WHERE Item_Name = 'fooValue'
     * $query->filterByItemName('%fooValue%'); // WHERE Item_Name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $itemName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildItemsQuery The current query, for fluid interface
     */
    public function filterByItemName($itemName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($itemName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $itemName)) {
                $itemName = str_replace('*', '%', $itemName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ItemsTableMap::COL_ITEM_NAME, $itemName, $comparison);
    }

    /**
     * Filter the query on the Price column
     *
     * Example usage:
     * <code>
     * $query->filterByPrice(1234); // WHERE Price = 1234
     * $query->filterByPrice(array(12, 34)); // WHERE Price IN (12, 34)
     * $query->filterByPrice(array('min' => 12)); // WHERE Price > 12
     * </code>
     *
     * @param     mixed $price The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildItemsQuery The current query, for fluid interface
     */
    public function filterByPrice($price = null, $comparison = null)
    {
        if (is_array($price)) {
            $useMinMax = false;
            if (isset($price['min'])) {
                $this->addUsingAlias(ItemsTableMap::COL_PRICE, $price['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($price['max'])) {
                $this->addUsingAlias(ItemsTableMap::COL_PRICE, $price['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ItemsTableMap::COL_PRICE, $price, $comparison);
    }

    /**
     * Filter the query on the Description column
     *
     * Example usage:
     * <code>
     * $query->filterByDescription('fooValue');   // WHERE Description = 'fooValue'
     * $query->filterByDescription('%fooValue%'); // WHERE Description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $description The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildItemsQuery The current query, for fluid interface
     */
    public function filterByDescription($description = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($description)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $description)) {
                $description = str_replace('*', '%', $description);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ItemsTableMap::COL_DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query on the Date_Added column
     *
     * Example usage:
     * <code>
     * $query->filterByDateAdded('2011-03-14'); // WHERE Date_Added = '2011-03-14'
     * $query->filterByDateAdded('now'); // WHERE Date_Added = '2011-03-14'
     * $query->filterByDateAdded(array('max' => 'yesterday')); // WHERE Date_Added > '2011-03-13'
     * </code>
     *
     * @param     mixed $dateAdded The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildItemsQuery The current query, for fluid interface
     */
    public function filterByDateAdded($dateAdded = null, $comparison = null)
    {
        if (is_array($dateAdded)) {
            $useMinMax = false;
            if (isset($dateAdded['min'])) {
                $this->addUsingAlias(ItemsTableMap::COL_DATE_ADDED, $dateAdded['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateAdded['max'])) {
                $this->addUsingAlias(ItemsTableMap::COL_DATE_ADDED, $dateAdded['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ItemsTableMap::COL_DATE_ADDED, $dateAdded, $comparison);
    }

    /**
     * Filter the query on the Date_Sold column
     *
     * Example usage:
     * <code>
     * $query->filterByDateSold('2011-03-14'); // WHERE Date_Sold = '2011-03-14'
     * $query->filterByDateSold('now'); // WHERE Date_Sold = '2011-03-14'
     * $query->filterByDateSold(array('max' => 'yesterday')); // WHERE Date_Sold > '2011-03-13'
     * </code>
     *
     * @param     mixed $dateSold The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildItemsQuery The current query, for fluid interface
     */
    public function filterByDateSold($dateSold = null, $comparison = null)
    {
        if (is_array($dateSold)) {
            $useMinMax = false;
            if (isset($dateSold['min'])) {
                $this->addUsingAlias(ItemsTableMap::COL_DATE_SOLD, $dateSold['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateSold['max'])) {
                $this->addUsingAlias(ItemsTableMap::COL_DATE_SOLD, $dateSold['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ItemsTableMap::COL_DATE_SOLD, $dateSold, $comparison);
    }

    /**
     * Filter the query on the SubCategory_ID column
     *
     * Example usage:
     * <code>
     * $query->filterBySubcategoryId(1234); // WHERE SubCategory_ID = 1234
     * $query->filterBySubcategoryId(array(12, 34)); // WHERE SubCategory_ID IN (12, 34)
     * $query->filterBySubcategoryId(array('min' => 12)); // WHERE SubCategory_ID > 12
     * </code>
     *
     * @see       filterBySubcategories()
     *
     * @param     mixed $subcategoryId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildItemsQuery The current query, for fluid interface
     */
    public function filterBySubcategoryId($subcategoryId = null, $comparison = null)
    {
        if (is_array($subcategoryId)) {
            $useMinMax = false;
            if (isset($subcategoryId['min'])) {
                $this->addUsingAlias(ItemsTableMap::COL_SUBCATEGORY_ID, $subcategoryId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($subcategoryId['max'])) {
                $this->addUsingAlias(ItemsTableMap::COL_SUBCATEGORY_ID, $subcategoryId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ItemsTableMap::COL_SUBCATEGORY_ID, $subcategoryId, $comparison);
    }

    /**
     * Filter the query on the Image_Url column
     *
     * Example usage:
     * <code>
     * $query->filterByImageUrl('fooValue');   // WHERE Image_Url = 'fooValue'
     * $query->filterByImageUrl('%fooValue%'); // WHERE Image_Url LIKE '%fooValue%'
     * </code>
     *
     * @param     string $imageUrl The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildItemsQuery The current query, for fluid interface
     */
    public function filterByImageUrl($imageUrl = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($imageUrl)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $imageUrl)) {
                $imageUrl = str_replace('*', '%', $imageUrl);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(ItemsTableMap::COL_IMAGE_URL, $imageUrl, $comparison);
    }

    /**
     * Filter the query by a related \Categories object
     *
     * @param \Categories|ObjectCollection $categories The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildItemsQuery The current query, for fluid interface
     */
    public function filterByCategories($categories, $comparison = null)
    {
        if ($categories instanceof \Categories) {
            return $this
                ->addUsingAlias(ItemsTableMap::COL_CATEGORY_ID, $categories->getCategoryId(), $comparison);
        } elseif ($categories instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ItemsTableMap::COL_CATEGORY_ID, $categories->toKeyValue('PrimaryKey', 'CategoryId'), $comparison);
        } else {
            throw new PropelException('filterByCategories() only accepts arguments of type \Categories or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Categories relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildItemsQuery The current query, for fluid interface
     */
    public function joinCategories($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Categories');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Categories');
        }

        return $this;
    }

    /**
     * Use the Categories relation Categories object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \CategoriesQuery A secondary query class using the current class as primary query
     */
    public function useCategoriesQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCategories($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Categories', '\CategoriesQuery');
    }

    /**
     * Filter the query by a related \Subcategories object
     *
     * @param \Subcategories|ObjectCollection $subcategories The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildItemsQuery The current query, for fluid interface
     */
    public function filterBySubcategories($subcategories, $comparison = null)
    {
        if ($subcategories instanceof \Subcategories) {
            return $this
                ->addUsingAlias(ItemsTableMap::COL_SUBCATEGORY_ID, $subcategories->getSubcategoryId(), $comparison);
        } elseif ($subcategories instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ItemsTableMap::COL_SUBCATEGORY_ID, $subcategories->toKeyValue('PrimaryKey', 'SubcategoryId'), $comparison);
        } else {
            throw new PropelException('filterBySubcategories() only accepts arguments of type \Subcategories or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Subcategories relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildItemsQuery The current query, for fluid interface
     */
    public function joinSubcategories($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Subcategories');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Subcategories');
        }

        return $this;
    }

    /**
     * Use the Subcategories relation Subcategories object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \SubcategoriesQuery A secondary query class using the current class as primary query
     */
    public function useSubcategoriesQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSubcategories($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Subcategories', '\SubcategoriesQuery');
    }

    /**
     * Filter the query by a related \User object
     *
     * @param \User|ObjectCollection $user The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildItemsQuery The current query, for fluid interface
     */
    public function filterByUser($user, $comparison = null)
    {
        if ($user instanceof \User) {
            return $this
                ->addUsingAlias(ItemsTableMap::COL_USER_ID, $user->getUserId(), $comparison);
        } elseif ($user instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ItemsTableMap::COL_USER_ID, $user->toKeyValue('PrimaryKey', 'UserId'), $comparison);
        } else {
            throw new PropelException('filterByUser() only accepts arguments of type \User or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the User relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildItemsQuery The current query, for fluid interface
     */
    public function joinUser($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('User');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'User');
        }

        return $this;
    }

    /**
     * Use the User relation User object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \UserQuery A secondary query class using the current class as primary query
     */
    public function useUserQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinUser($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'User', '\UserQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildItems $items Object to remove from the list of results
     *
     * @return $this|ChildItemsQuery The current query, for fluid interface
     */
    public function prune($items = null)
    {
        if ($items) {
            $this->addUsingAlias(ItemsTableMap::COL_ITEM_ID, $items->getItemId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the Items table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ItemsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ItemsTableMap::clearInstancePool();
            ItemsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ItemsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ItemsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ItemsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ItemsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ItemsQuery
