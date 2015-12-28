<?php
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 * @Table(name="users")
 * @HasLifecycleCallbacks
 */
class User extends AbstractEntity
{
    /**
     * @Column(name="name", type="string", length=255)
     * @var string
     */
    protected $_name;
    /**
     * @OneToMany(targetEntity="Bug", mappedBy="_reporter")
     * @var ArrayCollection
     */
    protected $_reportedBugs;
    /**
     * @OneToMany(targetEntity="Bug", mappedBy="_assignedEngineer")
     * @var ArrayCollection
     */
    protected $_assignedBugs;

    public function __construct()
    {
        parent::__construct();
        $this->_name = '';
        $this->_reportedBugs = new ArrayCollection();
        $this->_assignedBugs = new ArrayCollection();
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
        $this->_name = $name;
    }

    public function assignedToBug(Bug $bug)
    {
        $this->_assignedBugs[] = $bug;
    }

    public function addReportedBug(Bug $bug)
    {
        $this->_reportedBugs[] = $bug;
    }
}
