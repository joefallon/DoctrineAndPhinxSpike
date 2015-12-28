<?php
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 * @Table(name="bugs")
 * @HasLifecycleCallbacks
 */
class Bug extends AbstractEntity
{
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
    /**
     * @var ArrayCollection
     */
    protected $_products;
    /**
     * @ManyToOne(targetEntity="User", inversedBy="_assignedBugs")
     * @JoinColumn(name="assignedEngineer_id", referencedColumnName="id")
     * @var User
     */
    protected $_assignedEngineer;
    /**
     * @ManyToOne(targetEntity="User", inversedBy="_reportedBugs")
     * @JoinColumn(name="reporter_id", referencedColumnName="id")
     * @var User
     */
    protected $_reporter;


    public function __construct()
    {
        parent::__construct();
        $this->_description = '';
        $this->_status      = '';
        $this->_products    = new ArrayCollection();
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

    /**
     * @return User
     */
    public function getAssignedEngineer()
    {
        return $this->_assignedEngineer;
    }

    /**
     * @param User $user
     */
    public function setAssignedEngineer(User $user)
    {
        $user->assignedToBug($this);
        $this->_assignedEngineer = $user;
    }

    /**
     * @return User
     */
    public function getReporter()
    {
        return $this->_reporter;
    }

    /**
     * @param User $user
     */
    public function setReporter(User $user)
    {
        $user->addReportedBug($this);
        $this->_reporter = $user;
    }
}
