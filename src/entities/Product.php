<?php
use JoeFallon\PhpTime\MySqlDateTime;

/**
 * @Entity
 * @Table(name="products")
 * @HasLifecycleCallbacks
 */
class Product
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(name="id", type="integer")
     * @var int
     */
    protected $_id;
    /**
     * @Column(name="name", type="string", length=255)
     * @var string
     */
    protected $_name;
    /**
     * @Column(name="created", type="string", length=20)
     * @var string
     */
    protected $_created;
    /**
     * @Column(name="updated", type="string", length=20)
     * @var string
     */
    protected $_updated;


    public function __construct()
    {
        $this->_id      = 0;
        $this->_name    = '';
        $this->_created = '';
        $this->_updated = '';
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

    /**
     * @return string
     */
    public function getCreated()
    {
        return $this->_created;
    }

    /**
     * @return string
     */
    public function getUpdated()
    {
        return $this->_updated;
    }

    /**
     * @PrePersist
     */
    public function prePersist()
    {
        $this->_created = MySqlDateTime::nowTimestamp();
        $this->_updated = MySqlDateTime::nowTimestamp();
    }

    /**
     * @PreUpdate
     */
    public function preUpdate()
    {
        $this->_updated = MySqlDateTime::nowTimestamp();
    }
}
