<?php

namespace Base;

use \User as ChildUser;
use \UserQuery as ChildUserQuery;
use \Exception;
use \PDO;
use Map\UserTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'User' table.
 *
 *
 *
 * @method     ChildUserQuery orderByUserId($order = Criteria::ASC) Order by the User_ID column
 * @method     ChildUserQuery orderByFirstName($order = Criteria::ASC) Order by the First_Name column
 * @method     ChildUserQuery orderByLastName($order = Criteria::ASC) Order by the Last_Name column
 * @method     ChildUserQuery orderByEmail($order = Criteria::ASC) Order by the Email column
 * @method     ChildUserQuery orderByPassword($order = Criteria::ASC) Order by the Password column
 * @method     ChildUserQuery orderByAddress1($order = Criteria::ASC) Order by the Address1 column
 * @method     ChildUserQuery orderByAddress2($order = Criteria::ASC) Order by the Address2 column
 * @method     ChildUserQuery orderByZipcode($order = Criteria::ASC) Order by the Zipcode column
 * @method     ChildUserQuery orderByPhoneNo($order = Criteria::ASC) Order by the Phone_no column
 *
 * @method     ChildUserQuery groupByUserId() Group by the User_ID column
 * @method     ChildUserQuery groupByFirstName() Group by the First_Name column
 * @method     ChildUserQuery groupByLastName() Group by the Last_Name column
 * @method     ChildUserQuery groupByEmail() Group by the Email column
 * @method     ChildUserQuery groupByPassword() Group by the Password column
 * @method     ChildUserQuery groupByAddress1() Group by the Address1 column
 * @method     ChildUserQuery groupByAddress2() Group by the Address2 column
 * @method     ChildUserQuery groupByZipcode() Group by the Zipcode column
 * @method     ChildUserQuery groupByPhoneNo() Group by the Phone_no column
 *
 * @method     ChildUserQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildUserQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildUserQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildUserQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildUserQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildUserQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildUserQuery leftJoinItems($relationAlias = null) Adds a LEFT JOIN clause to the query using the Items relation
 * @method     ChildUserQuery rightJoinItems($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Items relation
 * @method     ChildUserQuery innerJoinItems($relationAlias = null) Adds a INNER JOIN clause to the query using the Items relation
 *
 * @method     ChildUserQuery joinWithItems($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Items relation
 *
 * @method     ChildUserQuery leftJoinWithItems() Adds a LEFT JOIN clause and with to the query using the Items relation
 * @method     ChildUserQuery rightJoinWithItems() Adds a RIGHT JOIN clause and with to the query using the Items relation
 * @method     ChildUserQuery innerJoinWithItems() Adds a INNER JOIN clause and with to the query using the Items relation
 *
 * @method     \ItemsQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildUser findOne(ConnectionInterface $con = null) Return the first ChildUser matching the query
 * @method     ChildUser findOneOrCreate(ConnectionInterface $con = null) Return the first ChildUser matching the query, or a new ChildUser object populated from the query conditions when no match is found
 *
 * @method     ChildUser findOneByUserId(int $User_ID) Return the first ChildUser filtered by the User_ID column
 * @method     ChildUser findOneByFirstName(string $First_Name) Return the first ChildUser filtered by the First_Name column
 * @method     ChildUser findOneByLastName(string $Last_Name) Return the first ChildUser filtered by the Last_Name column
 * @method     ChildUser findOneByEmail(string $Email) Return the first ChildUser filtered by the Email column
 * @method     ChildUser findOneByPassword(string $Password) Return the first ChildUser filtered by the Password column
 * @method     ChildUser findOneByAddress1(string $Address1) Return the first ChildUser filtered by the Address1 column
 * @method     ChildUser findOneByAddress2(string $Address2) Return the first ChildUser filtered by the Address2 column
 * @method     ChildUser findOneByZipcode(string $Zipcode) Return the first ChildUser filtered by the Zipcode column
 * @method     ChildUser findOneByPhoneNo(int $Phone_no) Return the first ChildUser filtered by the Phone_no column *

 * @method     ChildUser requirePk($key, ConnectionInterface $con = null) Return the ChildUser by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUser requireOne(ConnectionInterface $con = null) Return the first ChildUser matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildUser requireOneByUserId(int $User_ID) Return the first ChildUser filtered by the User_ID column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUser requireOneByFirstName(string $First_Name) Return the first ChildUser filtered by the First_Name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUser requireOneByLastName(string $Last_Name) Return the first ChildUser filtered by the Last_Name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUser requireOneByEmail(string $Email) Return the first ChildUser filtered by the Email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUser requireOneByPassword(string $Password) Return the first ChildUser filtered by the Password column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUser requireOneByAddress1(string $Address1) Return the first ChildUser filtered by the Address1 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUser requireOneByAddress2(string $Address2) Return the first ChildUser filtered by the Address2 column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUser requireOneByZipcode(string $Zipcode) Return the first ChildUser filtered by the Zipcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUser requireOneByPhoneNo(int $Phone_no) Return the first ChildUser filtered by the Phone_no column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildUser[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildUser objects based on current ModelCriteria
 * @method     ChildUser[]|ObjectCollection findByUserId(int $User_ID) Return ChildUser objects filtered by the User_ID column
 * @method     ChildUser[]|ObjectCollection findByFirstName(string $First_Name) Return ChildUser objects filtered by the First_Name column
 * @method     ChildUser[]|ObjectCollection findByLastName(string $Last_Name) Return ChildUser objects filtered by the Last_Name column
 * @method     ChildUser[]|ObjectCollection findByEmail(string $Email) Return ChildUser objects filtered by the Email column
 * @method     ChildUser[]|ObjectCollection findByPassword(string $Password) Return ChildUser objects filtered by the Password column
 * @method     ChildUser[]|ObjectCollection findByAddress1(string $Address1) Return ChildUser objects filtered by the Address1 column
 * @method     ChildUser[]|ObjectCollection findByAddress2(string $Address2) Return ChildUser objects filtered by the Address2 column
 * @method     ChildUser[]|ObjectCollection findByZipcode(string $Zipcode) Return ChildUser objects filtered by the Zipcode column
 * @method     ChildUser[]|ObjectCollection findByPhoneNo(int $Phone_no) Return ChildUser objects filtered by the Phone_no column
 * @method     ChildUser[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class UserQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\UserQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\User', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildUserQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildUserQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildUserQuery) {
            return $criteria;
        }
        $query = new ChildUserQuery();
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
     * @return ChildUser|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = UserTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(UserTableMap::DATABASE_NAME);
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
     * @return ChildUser A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT User_ID, First_Name, Last_Name, Email, Password, Address1, Address2, Zipcode, Phone_no FROM User WHERE User_ID = :p0';
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
            /** @var ChildUser $obj */
            $obj = new ChildUser();
            $obj->hydrate($row);
            UserTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildUser|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildUserQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(UserTableMap::COL_USER_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildUserQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(UserTableMap::COL_USER_ID, $keys, Criteria::IN);
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
     * @param     mixed $userId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUserQuery The current query, for fluid interface
     */
    public function filterByUserId($userId = null, $comparison = null)
    {
        if (is_array($userId)) {
            $useMinMax = false;
            if (isset($userId['min'])) {
                $this->addUsingAlias(UserTableMap::COL_USER_ID, $userId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($userId['max'])) {
                $this->addUsingAlias(UserTableMap::COL_USER_ID, $userId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserTableMap::COL_USER_ID, $userId, $comparison);
    }

    /**
     * Filter the query on the First_Name column
     *
     * Example usage:
     * <code>
     * $query->filterByFirstName('fooValue');   // WHERE First_Name = 'fooValue'
     * $query->filterByFirstName('%fooValue%'); // WHERE First_Name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $firstName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUserQuery The current query, for fluid interface
     */
    public function filterByFirstName($firstName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($firstName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $firstName)) {
                $firstName = str_replace('*', '%', $firstName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UserTableMap::COL_FIRST_NAME, $firstName, $comparison);
    }

    /**
     * Filter the query on the Last_Name column
     *
     * Example usage:
     * <code>
     * $query->filterByLastName('fooValue');   // WHERE Last_Name = 'fooValue'
     * $query->filterByLastName('%fooValue%'); // WHERE Last_Name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $lastName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUserQuery The current query, for fluid interface
     */
    public function filterByLastName($lastName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lastName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $lastName)) {
                $lastName = str_replace('*', '%', $lastName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UserTableMap::COL_LAST_NAME, $lastName, $comparison);
    }

    /**
     * Filter the query on the Email column
     *
     * Example usage:
     * <code>
     * $query->filterByEmail('fooValue');   // WHERE Email = 'fooValue'
     * $query->filterByEmail('%fooValue%'); // WHERE Email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $email The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUserQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $email)) {
                $email = str_replace('*', '%', $email);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UserTableMap::COL_EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the Password column
     *
     * Example usage:
     * <code>
     * $query->filterByPassword('fooValue');   // WHERE Password = 'fooValue'
     * $query->filterByPassword('%fooValue%'); // WHERE Password LIKE '%fooValue%'
     * </code>
     *
     * @param     string $password The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUserQuery The current query, for fluid interface
     */
    public function filterByPassword($password = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($password)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $password)) {
                $password = str_replace('*', '%', $password);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UserTableMap::COL_PASSWORD, $password, $comparison);
    }

    /**
     * Filter the query on the Address1 column
     *
     * Example usage:
     * <code>
     * $query->filterByAddress1('fooValue');   // WHERE Address1 = 'fooValue'
     * $query->filterByAddress1('%fooValue%'); // WHERE Address1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $address1 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUserQuery The current query, for fluid interface
     */
    public function filterByAddress1($address1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($address1)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $address1)) {
                $address1 = str_replace('*', '%', $address1);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UserTableMap::COL_ADDRESS1, $address1, $comparison);
    }

    /**
     * Filter the query on the Address2 column
     *
     * Example usage:
     * <code>
     * $query->filterByAddress2('fooValue');   // WHERE Address2 = 'fooValue'
     * $query->filterByAddress2('%fooValue%'); // WHERE Address2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $address2 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUserQuery The current query, for fluid interface
     */
    public function filterByAddress2($address2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($address2)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $address2)) {
                $address2 = str_replace('*', '%', $address2);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UserTableMap::COL_ADDRESS2, $address2, $comparison);
    }

    /**
     * Filter the query on the Zipcode column
     *
     * Example usage:
     * <code>
     * $query->filterByZipcode('fooValue');   // WHERE Zipcode = 'fooValue'
     * $query->filterByZipcode('%fooValue%'); // WHERE Zipcode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $zipcode The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUserQuery The current query, for fluid interface
     */
    public function filterByZipcode($zipcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($zipcode)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $zipcode)) {
                $zipcode = str_replace('*', '%', $zipcode);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UserTableMap::COL_ZIPCODE, $zipcode, $comparison);
    }

    /**
     * Filter the query on the Phone_no column
     *
     * Example usage:
     * <code>
     * $query->filterByPhoneNo(1234); // WHERE Phone_no = 1234
     * $query->filterByPhoneNo(array(12, 34)); // WHERE Phone_no IN (12, 34)
     * $query->filterByPhoneNo(array('min' => 12)); // WHERE Phone_no > 12
     * </code>
     *
     * @param     mixed $phoneNo The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUserQuery The current query, for fluid interface
     */
    public function filterByPhoneNo($phoneNo = null, $comparison = null)
    {
        if (is_array($phoneNo)) {
            $useMinMax = false;
            if (isset($phoneNo['min'])) {
                $this->addUsingAlias(UserTableMap::COL_PHONE_NO, $phoneNo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($phoneNo['max'])) {
                $this->addUsingAlias(UserTableMap::COL_PHONE_NO, $phoneNo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserTableMap::COL_PHONE_NO, $phoneNo, $comparison);
    }

    /**
     * Filter the query by a related \Items object
     *
     * @param \Items|ObjectCollection $items the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildUserQuery The current query, for fluid interface
     */
    public function filterByItems($items, $comparison = null)
    {
        if ($items instanceof \Items) {
            return $this
                ->addUsingAlias(UserTableMap::COL_USER_ID, $items->getUserId(), $comparison);
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
     * @return $this|ChildUserQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   ChildUser $user Object to remove from the list of results
     *
     * @return $this|ChildUserQuery The current query, for fluid interface
     */
    public function prune($user = null)
    {
        if ($user) {
            $this->addUsingAlias(UserTableMap::COL_USER_ID, $user->getUserId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the User table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(UserTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            UserTableMap::clearInstancePool();
            UserTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(UserTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(UserTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            UserTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            UserTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // UserQuery
