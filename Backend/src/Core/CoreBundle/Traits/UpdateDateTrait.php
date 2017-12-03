<?php

namespace Core\CoreBundle\Traits;

use JMS\Serializer\Annotation as JMS;

Trait UpdateDateTrait
{

    /**
     * Returns updatedAt.
     * @return \DateTime
     * @JMS\VirtualProperty("updated-at")
     * @JMS\Groups({"Question", "Response"})
     */
    public function getUpdateDate()
    {
       return $this->updatedAt;
    }

}