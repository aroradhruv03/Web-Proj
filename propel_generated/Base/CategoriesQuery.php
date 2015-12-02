<?php

namespace Base;

use \Categories as ChildCategories;
use \CategoriesQuery as ChildCategoriesQuery;
use \Exception;
use \PDO;
use Map\CategoriesTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'Categories' table.
 *
 *
 *
 * @method     ChildCategoriesQuery orderByCategoryId($order = Criteria::ASC) Order by the Category_ID column
 * @method     ChildCategoriesQuery orderByCategoryName($order = Criteria::ASC) Order by the Category_name column
 *
 * @method     ChildCategoriesQuery groupByCategoryId() Group by the Category_ID column
 * @method     ChildCategoriesQuery groupByCategoryName() Group by the Category_name column
 *
 * @method     ChildCategoriesQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildCategoriesQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildCategoriesQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildCategoriesQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildCategoriesQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildCategoriesQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildCategoriesQuery leftJoinItems($relationAlias = null) Adds a LEFT JOIN clause to the query using the Items relation
 * @method     ChildCategoriesQuery rightJoinItems($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Items relation
 * @method     ChildCategoriesQuery innerJoinItems($relationAlias = null) Adds a INNER JOIN clause to the query using the Items relation
 *
 * @method     ChildCategoriesQuery joinWithItems($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Items relation
 *
 * @method     ChildCategoriesQuery leftJoinWithItems() Adds a LEFT JOIN clause and with to the query using the Items relation
 * @method     ChildCategoriesQuery rightJoinWithItems() Adds a RIGHT JOIN clause and with to the query using the Items relation
 * @method     ChildCategoriesQuery innerJoinWithItems() Adds a INNER JOIN clause and with to the query using the Items relation
 *
 * @method     ChildCategoriesQuery leftJoinSubcategories($relationAlias = null) Adds a LEFT JOIN clause to the query using the Subcategories relation
 * @method     ChildCategoriesQuery rightJoinSubcategories($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Subcategories relation
 * @method     ChildCategoriesQuery innerJoinSubcategories($relationAlias = null) Adds a INNER JOIN clause to the query using the Subcategories relation
 *
 * @method     ChildCategoriesQuery joinWithSubcategories($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Subcategories relation
 *
 * @method     ChildCategoriesQuery leftJoinWithSubcategories() Adds a LEFT JOIN clause and with to the query using the Subcategories relation
 * @method     ChildCategoriesQuery rightJoinWithSubcategories() Adds a RIGHT JOIN clause and with to the query using the Subcategories relation
 * @method     ChildCategoriesQuery innerJoinWithSubcategories() Adds a INNER JOIN clause and with to the query using the Subcategories relation
 *
 * @method     \ItemsQuery|\SubcategoriesQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildCategories findOne(ConnectionInterface $con = null) Return the first ChildCategories matching the query
 * @method     ChildCategories findOneOrCreate(ConnectionInterface $con = null) Return the first ChildCategories matching the query, or a new ChildCategories object populated from the query conditions when no match is found
 *
 * @method     ChildCategories findOneByCategoryId(int $Category_ID) Return the first ChildCategories filtered by the Category_ID column
 * @method     ChildCategories findOneByCategoryName(string $Category_name) Return the first ChildCategories filtered by the Category_name column *

 * @method     ChildCategories requirePk($key, ConnectionInterface $con = null) Return the ChildCategories by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCategories requireOne(ConnectionInterface $con = null) Return the first ChildCategories matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCategories requireOneByCategoryId(int $Category_ID) Return the first ChildCategories filtered by the Category_ID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildCategories requireOneByCategoryName(string $Category_name) Return the first ChildCategories filtered by the Category_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildCategories[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildCategories objects based on current ModelCriteria
 * @method     ChildCategories[]|ObjectCollection findByCategoryId(int $Category_ID) Return ChildCategories objects filtered by the Category_ID column
 * @method     ChildCategories[]|ObjectCollection findByCategoryName(string $Category_name) Return ChildCategories objects filtered by the Category_name column
 * @method     ChildCategories[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class CategoriesQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\CategoriesQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Categories', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildCategoriesQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildCategoriesQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildCategoriesQuery) {
            return $criteria;
        }
        $query = new ChildCategoriesQuery();
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
     * @return ChildCategories|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = CategoriesTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(CategoriesTableMap::DATABASE_NAME);
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
     * @return ChildCategories A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT Category_ID, Category_name FROM Categories WHERE Category_ID = :p0';
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
            /** @var ChildCategories $obj */
            $obj = new ChildCategories();
            $obj->hydrate($row);
            CategoriesTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildCategories|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildCategoriesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(CategoriesTableMap::COL_CATEGORY_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildCategoriesQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(CategoriesTableMap::COL_CATEGORY_ID, $keys, Criteria::IN);
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
     * @param     mixed $categoryId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCategoriesQuery The current query, for fluid interface
     */
    public function filterByCategoryId($categoryId = null, $comparison = null)
    {
        if (is_array($categoryId)) {
            $useMinMax = false;
            if (isset($categoryId['min'])) {
                $this->addUsingAlias(CategoriesTableMap::COL_CATEGORY_ID, $categoryId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($categoryId['max'])) {
                $this->addUsingAlias(CategoriesTableMap::COL_CATEGORY_ID, $categoryId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(CategoriesTableMap::COL_CATEGORY_ID, $categoryId, $comparison);
    }

    /**
     * Filter the query on the Category_name column
     *
     * Example usage:
     * <code>
     * $query->filterByCategoryName('fooValue');   // WHERE Category_name = 'fooValue'
     * $query->filterByCategoryName('%fooValue%'); // WHERE Category_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $categoryName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildCategoriesQuery The current query, for fluid interface
     */
    public function filterByCategoryName($categoryName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($categoryName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $categoryName)) {
                $categoryName = str_replace('*', '%', $categoryName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(CategoriesTableMap::COL_CATEGORY_NAME, $categoryName, $comparison);
    }

    /**
     * Filter the query by a related \Items object
     *
     * @param \Items|ObjectCollection $items the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCategoriesQuery The current query, for fluid interface
     */
    public function filterByItems($items, $comparison = null)
    {
        if ($items instanceof \Items) {
            return $this
                ->addUsingAlias(CategoriesTableMap::COL_CATEGORY_ID, $items->getCategoryId(), $comparison);
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
     * @return $this|ChildCategoriesQuery The current query, for fluid interface
     */
    public function joinItems($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function useItemsQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinItems($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Items', '\ItemsQuery');
    }

    /**
     * Filter the query by a related \Subcategories object
     *
     * @param \Subcategories|ObjectCollection $subcategories the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildCategoriesQuery The current query, for fluid interface
     */
    public function filterBySubcategories($subcategories, $comparison = null)
    {
        if ($subcategories instanceof \Subcategories) {
            return $this
                ->addUsingAlias(CategoriesTableMap::COL_CATEGORY_ID, $subcategories->getCategoryId(), $comparison);
        } elseif ($subcategories instanceof ObjectCollection) {
            return $this
                ->useSubcategoriesQuery()
                ->filterByPrimaryKeys($subcategories->getPrimaryKeys())
                ->endUse();
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
     * @return $this|ChildCategoriesQuery The current query, for fluid interface
     */
    public function joinSubcategories($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function useSubcategoriesQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSubcategories($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Subcategories', '\SubcategoriesQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildCategories $categories Object to remove from the list of results
     *
     * @return $this|ChildCategoriesQuery The current query, for fluid interface
     */
    public function prune($categories = null)
    {
        if ($categories) {
            $this->addUsingAlias(CategoriesTableMap::COL_CATEGORY_ID, $categories->getCategoryId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the Categories table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(CategoriesTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            CategoriesTableMap::clearInstancePool();
            CategoriesTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(CategoriesTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(CategoriesTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            CategoriesTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            CategoriesTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // CategoriesQuery
