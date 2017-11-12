<?php
//
///**
// * Created by PhpStorm.
// * User: HAMZA
// * Date: 22/10/2017
// * Time: 16:41
// */
//
//namespace Core\CoreBundle\DataFixtures\ORM;
//
//use Core\CoreBundle\Entity\Groups;
//use Core\CoreBundle\Entity\Role;
//use Core\CoreBundle\Entity\Student;
//use Doctrine\Common\DataFixtures\AbstractFixture;
//use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
//use Doctrine\Common\Persistence\ObjectManager;
//
//class LoadGroups extends AbstractFixture implements OrderedFixtureInterface
//{
//
//    /**
//     * Load data fixtures with the passed EntityManager
//     *
//     * @param ObjectManager $manager
//     */
//    public function load(ObjectManager $manager)
//    {
//        $group1 = new Groups();
//        $group1->setTitle("2MPMSW");
//        $manager->persist($group1);
//
//        $group2 = new Groups();
//        $group2->setTitle("3LM3");
//        $manager->persist($group2);
//
//        $group3 = new Groups();
//        $group3->setTitle("1DNI");
//        $manager->persist($group3);
//
//        $group4 = new Groups();
//        $group4->setTitle("2DNI");
//        $manager->persist($group4);
//
//        $group5 = new Groups();
//        $group5->setTitle("2LR3");
//        $manager->persist($group5);
//
//        $group6 = new Groups();
//        $group6->setTitle("3LT1");
//        $manager->persist($group6);
//
//        $group7 = new Groups();
//        $group7->setTitle("3DNI");
//        $manager->persist($group7);
//
//        $group8 = new Groups();
//        $group8->setTitle("1MPMSW");
//        $manager->persist($group8);
//
//
//        $manager->flush();
//    }
//
//    /**
//     * Get the order of this fixture
//     *
//     * @return integer
//     */
//    public function getOrder()
//    {
//        return 1;
//    }
//}