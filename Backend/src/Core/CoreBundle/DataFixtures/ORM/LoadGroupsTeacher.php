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
//use Core\CoreBundle\Entity\GroupsTeacher;
//use Core\CoreBundle\Entity\Role;
//use Core\CoreBundle\Entity\Student;
//use Doctrine\Common\DataFixtures\AbstractFixture;
//use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
//use Doctrine\Common\Persistence\ObjectManager;
//
//class LoadGroupsTeacher extends AbstractFixture implements OrderedFixtureInterface
//{
//
//    /**
//     * Load data fixtures with the passed EntityManager
//     *
//     * @param ObjectManager $manager
//     */
//    public function load(ObjectManager $manager)
//    {
//        $group1 = $manager->getRepository('CoreBundle:Groups')->findOneBy([
//            'title' => "2MPMSW"
//        ]);
//
//        $group2 = $manager->getRepository('CoreBundle:Groups')->findOneBy([
//            'title' => "3LM3"
//        ]);
//
//        $group3 = $manager->getRepository('CoreBundle:Groups')->findOneBy([
//            'title' => "1MPMSW"
//        ]);
//
//        $group4 = $manager->getRepository('CoreBundle:Groups')->findOneBy([
//            'title' => "2DNI"
//        ]);
//
//        $teacher1 = $manager->getRepository('CoreBundle:Teacher')->findOneBy([
//            'grad' => "Proffesseur"
//        ]);
//
//        $teacher2 = $manager->getRepository('CoreBundle:Teacher')->findOneBy([
//            'grad' => "Maître assistant"
//        ]);
//
//
//        $groupTeacher1 = new GroupsTeacher();
//
//        $groupTeacher1->setTeachers($teacher1);
//        $groupTeacher1->setGroups($group1);
//        $manager->persist($groupTeacher1);
//
//        $groupTeacher2 = new GroupsTeacher();
//
//        $groupTeacher2->setTeachers($teacher1);
//        $groupTeacher2->setGroups($group2);
//        $manager->persist($groupTeacher2);
//
//        $groupTeacher3 = new GroupsTeacher();
//
//        $groupTeacher3->setTeachers($teacher1);
//        $groupTeacher3->setGroups($group3);
//        $manager->persist($groupTeacher3);
//
//        $groupTeacher4 = new GroupsTeacher();
//
//        $groupTeacher4->setTeachers($teacher2);
//        $groupTeacher4->setGroups($group4);
//        $manager->persist($groupTeacher4);
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
//        return 8;
//    }
//}