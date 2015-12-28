<?php
use JoeFallon\PhpTime\MySqlDateTime;

/**
 * @Entity
 * @Table(name="bugs")
 * @HasLifecycleCallbacks
 */
class Bug extends AbstractEntity
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(name="id", type="integer")
     * @var int
     */
    protected $_id;
    /**
     * @Column(name="description", type="text")
     * @var string
     */
    protected $_description;
    /**
     * @Column(name="status", type="string", length=20)
     * @var string
     */
    protected $_status;

    public function __construct()
    {
        parent::__construct();
        $this->_description = '';
        $this->_status      = '';
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->_description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->_description = (string)$description;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->_status;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->_status = (string)$status;
    }
}
