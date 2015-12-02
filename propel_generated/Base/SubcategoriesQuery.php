<?php

namespace Base;

use \Subcategories as ChildSubcategories;
use \SubcategoriesQuery as ChildSubcategoriesQuery;
use \Exception;
use \PDO;
use Map\SubcategoriesTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'SubCategories' table.
 *
 *
 *
 * @method     ChildSubcategoriesQuery orderBySubcategoryId($order = Criteria::ASC) Order by the SubCategory_ID column
 * @method     ChildSubcategoriesQuery orderByCategoryId($order = Criteria::ASC) Order by the Category_ID column
 * @method     ChildSubcategoriesQuery orderBySubcategoryName($order = Criteria::ASC) Order by the SubCategory_Name column
 *
 * @method     ChildSubcategoriesQuery groupBySubcategoryId() Group by the SubCategory_ID column
 * @method     ChildSubcategoriesQuery groupByCategoryId() Group by the Category_ID column
 * @method     ChildSubcategoriesQuery groupBySubcategoryName() Group by the SubCategory_Name column
 *
 * @method     ChildSubcategoriesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSubcategoriesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSubcategoriesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSubcategoriesQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildSubcategoriesQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildSubcategoriesQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildSubcategoriesQuery leftJoinCategories($relationAlias = null) Adds a LEFT JOIN clause to the query using the Categories relation
 * @method     ChildSubcategoriesQuery rightJoinCategories($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Categories relation
 * @method     ChildSubcategoriesQuery innerJoinCategories($relationAlias = null) Adds a INNER JOIN clause to the query using the Categories relation
 *
 * @method     ChildSubcategoriesQuery joinWithCategories($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Categories relation
 *
 * @method     ChildSubcategoriesQuery leftJoinWithCategories() Adds a LEFT JOIN clause and with to the query using the Categories relation
 * @method     ChildSubcategoriesQuery rightJoinWithCategories() Adds a RIGHT JOIN clause and with to the query using the Categories relation
 * @method     ChildSubcategoriesQuery innerJoinWithCategories() Adds a INNER JOIN clause and with to the query using the Categories relation
 *
 * @method     ChildSubcategoriesQuery leftJoinItems($relationAlias = null) Adds a LEFT JOIN clause to the query using the Items relation
 * @method     ChildSubcategoriesQuery rightJoinItems($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Items relation
 * @method     ChildSubcategoriesQuery innerJoinItems($relationAlias = null) Adds a INNER JOIN clause to the query using the Items relation
 *
 * @method     ChildSubcategoriesQuery joinWithItems($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Items relation
 *
 * @method     ChildSubcategoriesQuery leftJoinWithItems() Adds a LEFT JOIN clause and with to the query using the Items relation
 * @method     ChildSubcategoriesQuery rightJoinWithItems() Adds a RIGHT JOIN clause and with to the query using the Items relation
 * @method     ChildSubcategoriesQuery innerJoinWithItems() Adds a INNER JOIN clause and with to the query using the Items relation
 *
 * @method     \CategoriesQuery|\ItemsQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildSubcategories findOne(ConnectionInterface $con = null) Return the first ChildSubcategories matching the query
 * @method     ChildSubcategories findOneOrCreate(ConnectionInterface $con = null) Return the first ChildSubcategories matching the query, or a new ChildSubcategories object populated from the query conditions when no match is found
 *
 * @method     ChildSubcategories findOneBySubcategoryId(int $SubCategory_ID) Return the first ChildSubcategories filtered by the SubCategory_ID column
 * @method     ChildSubcategories findOneByCategoryId(int $Category_ID) Return the first ChildSubcategories filtered by the Category_ID column
 * @method     ChildSubcategories findOneBySubcategoryName(string $SubCategory_Name) Return the first ChildSubcategories filtered by the SubCategory_Name column *

 * @method     ChildSubcategories requirePk($key, ConnectionInterface $con = null) Return the ChildSubcategories by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSubcategories requireOne(ConnectionInterface $con = null) Return the first ChildSubcategories matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSubcategories requireOneBySubcategoryId(int $SubCategory_ID) Return the first ChildSubcategories filtered by the SubCategory_ID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSubcategories requireOneByCategoryId(int $Category_ID) Return the first ChildSubcategories filtered by the Category_ID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSubcategories requireOneBySubcategoryName(string $SubCategory_Name) Return the first ChildSubcategories filtered by the SubCategory_Name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSubcategories[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildSubcategories objects based on current ModelCriteria
 * @method     ChildSubcategories[]|ObjectCollection findBySubcategoryId(int $SubCategory_ID) Return ChildSubcategories objects filtered by the SubCategory_ID column
 * @method     ChildSubcategories[]|ObjectCollection findByCategoryId(int $Category_ID) Return ChildSubcategories objects filtered by the Category_ID column
 * @method     ChildSubcategories[]|ObjectCollection findBySubcategoryName(string $SubCategory_Name) Return ChildSubcategories objects filtered by the SubCategory_Name column
 * @method     ChildSubcategories[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class SubcategoriesQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\SubcategoriesQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Subcategories', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSubcategoriesQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSubcategoriesQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildSubcategoriesQuery) {
            return $criteria;
        }
        $query = new ChildSubcategoriesQuery();
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
     * @return ChildSubcategories|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SubcategoriesTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SubcategoriesTableMap::DATABASE_NAME);
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
     * @return ChildSubcategories A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT SubCategory_ID, Category_ID, SubCategory_Name FROM SubCategories WHERE SubCategory_ID = :p0';
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
            /** @var ChildSubcategories $obj */
            $obj = new ChildSubcategories();
            $obj->hydrate($row);
            SubcategoriesTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildSubcategories|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildSubcategoriesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SubcategoriesTableMap::COL_SUBCATEGORY_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildSubcategoriesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SubcategoriesTableMap::COL_SUBCATEGORY_ID, $keys, Criteria::IN);
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
     * @param     mixed $subcategoryId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSubcategoriesQuery The current query, for fluid interface
     */
    public function filterBySubcategoryId($subcategoryId = null, $comparison = null)
    {
        if (is_array($subcategoryId)) {
            $useMinMax = false;
            if (isset($subcategoryId['min'])) {
                $this->addUsingAlias(SubcategoriesTableMap::COL_SUBCATEGORY_ID, $subcategoryId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($subcategoryId['max'])) {
                $this->addUsingAlias(SubcategoriesTableMap::COL_SUBCATEGORY_ID, $subcategoryId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SubcategoriesTableMap::COL_SUBCATEGORY_ID, $subcategoryId, $comparison);
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
     * @return $this|ChildSubcategoriesQuery The current query, for fluid interface
     */
    public function filterByCategoryId($categoryId = null, $comparison = null)
    {
        if (is_array($categoryId)) {
            $useMinMax = false;
            if (isset($categoryId['min'])) {
                $this->addUsingAlias(SubcategoriesTableMap::COL_CATEGORY_ID, $categoryId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($categoryId['max'])) {
                $this->addUsingAlias(SubcategoriesTableMap::COL_CATEGORY_ID, $categoryId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SubcategoriesTableMap::COL_CATEGORY_ID, $categoryId, $comparison);
    }

    /**
     * Filter the query on the SubCategory_Name column
     *
     * Example usage:
     * <code>
     * $query->filterBySubcategoryName('fooValue');   // WHERE SubCategory_Name = 'fooValue'
     * $query->filterBySubcategoryName('%fooValue%'); // WHERE SubCategory_Name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $subcategoryName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildSubcategoriesQuery The current query, for fluid interface
     */
    public function filterBySubcategoryName($subcategoryName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($subcategoryName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $subcategoryName)) {
                $subcategoryName = str_replace('*', '%', $subcategoryName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SubcategoriesTableMap::COL_SUBCATEGORY_NAME, $subcategoryName, $comparison);
    }

    /**
     * Filter the query by a related \Categories object
     *
     * @param \Categories|ObjectCollection $categories The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildSubcategoriesQuery The current query, for fluid interface
     */
    public function filterByCategories($categories, $comparison = null)
    {
        if ($categories instanceof \Categories) {
            return $this
                ->addUsingAlias(SubcategoriesTableMap::COL_CATEGORY_ID, $categories->getCategoryId(), $comparison);
        } elseif ($categories instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SubcategoriesTableMap::COL_CATEGORY_ID, $categories->toKeyValue('PrimaryKey', 'CategoryId'), $comparison);
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
     * @return $this|ChildSubcategoriesQuery The current query, for fluid interface
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
     * Filter the query by a related \Items object
     *
     * @param \Items|ObjectCollection $items the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildSubcategoriesQuery The current query, for fluid interface
     */
    public function filterByItems($items, $comparison = null)
    {
        if ($items instanceof \Items) {
            return $this
                ->addUsingAlias(SubcategoriesTableMap::COL_SUBCATEGORY_ID, $items->getSubcategoryId(), $comparison);
        } elseif ($items instanceof ObjectCollection) {
            return $this
                ->useItemsQuery()
                ->filterByPrimaryKeys($items->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByItems() only accepts arguments of type \Items or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Items relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildSubcategoriesQuery The current query, for fluid interface
     */
    public function joinItems($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Items');

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
            $this->addJoinObject($join, 'Items');
        }

        return $this;
    }

    /**
     * Use the Items relation Items object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ItemsQuery A secondary query class using the current class as primary query
     */
    public function useItemsQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinItems($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Items', '\ItemsQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildSubcategories $subcategories Object to remove from the list of results
     *
     * @return $this|ChildSubcategoriesQuery The current query, for fluid interface
     */
    public function prune($subcategories = null)
    {
        if ($subcategories) {
            $this->addUsingAlias(SubcategoriesTableMap::COL_SUBCATEGORY_ID, $subcategories->getSubcategoryId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the SubCategories table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SubcategoriesTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SubcategoriesTableMap::clearInstancePool();
            SubcategoriesTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SubcategoriesTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SubcategoriesTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SubcategoriesTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SubcategoriesTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // SubcategoriesQuery
