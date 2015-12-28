<?php
use JoeFallon\PhpTime\MySqlDateTime;

/**
 * @Entity
 * @Table(name="products")
 * @HasLifecycleCallbacks
 */
class Product extends AbstractEntity
{
    /**
     * @Column(name="name", type="string", length=255)
     * @var string
     */
    protected $_name;

    public function __construct()
    {
        parent::__construct();
        $this->_id      = 0;
        $this->_name    = '';
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->_name = (string)$name;
    }
}
