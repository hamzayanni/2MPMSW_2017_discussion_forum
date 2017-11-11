<?php

/**
 * Created by PhpStorm.
 * User: HAMZA
 * Date: 22/10/2017
 * Time: 16:41
 */

namespace Core\CoreBundle\DataFixtures\ORM;

use Core\CoreBundle\Entity\Groups;
use Core\CoreBundle\Entity\Space;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadSpace extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {

        $space1 = new Space();
        $space1->setTitle("java");
        $manager->persist($space1);

        $space2 = new Space();
        $space2->setTitle("java");
        $manager->persist($space2);

        $space3 = new Space();
        $space3->setTitle("java");
        $manager->persist($space3);

        $space4 = new Space();
        $space4->setTitle("java");
        $manager->persist($space4);

        $space5 = new Space();
        $space5->setTitle("java");
        $manager->persist($space5);

        $manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 2;
    }
}