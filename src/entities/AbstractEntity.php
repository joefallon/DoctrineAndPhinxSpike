<?php

use JoeFallon\PhpTime\MySqlDateTime;

abstract class AbstractEntity
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(name="id", type="integer")
     * @var int
     */
    protected $_id;
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
        $this->_id          = 0;
        $this->_created     = '';
        $this->_updated     = '';
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
     * @PreUpdate
     */
    public function updateTimestamps()
    {
        $this->_updated = MySqlDateTime::nowTimestamp();

        if($this->_created == '')
        {
            $this->_created = MySqlDateTime::nowTimestamp();
        }
    }
}
