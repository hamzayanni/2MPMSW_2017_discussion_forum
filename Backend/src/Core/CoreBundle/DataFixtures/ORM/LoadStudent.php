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
//use Core\CoreBundle\Entity\Role;
//use Core\CoreBundle\Entity\Student;
//use Doctrine\Common\DataFixtures\AbstractFixture;
//use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
//use Doctrine\Common\Persistence\ObjectManager;
//
//class LoadStudent extends AbstractFixture implements OrderedFixtureInterface
//{
//
//    /**
//     * Load data fixtures with the passed EntityManager
//     *
//     * @param ObjectManager $manager
//     */
//    public function load(ObjectManager $manager)
//    {
//        $role = $manager->getRepository('CoreBundle:Role')->findOneBy([
//            'code' => Role::ROLE_STUDENT
//        ]);
//
//        $group = $manager->getRepository('CoreBundle:Groups')->findOneBy([
//            'title' => "2MPMSW"
//        ]);
//
//        $student1 = new Student();
//
//        $student1->setFirstName("hamza");
//        $student1->setLastName("selmi");
//        $student1->setEmail("selmihamza@gmail.com");
//        $student1->setCIN('0165495');
//        $student1->setUsername("hamzaYanni");
//        $student1->setPassword("haa@123");
//        $student1->setSexe("Mr");
//        $student1->setValidRegistration(true);
//        $student1->setScore(10);
//        $student1->setRole($role);
//        $student1->setGroup($group);
//        $manager->persist($student1);
//
//        $student2 = new Student();
//
//        $student2->setFirstName("gadour");
//        $student2->setLastName("ben aicha");
//        $student2->setEmail("ben.aicha@gmail.com");
//        $student2->setCIN('0296374');
//        $student2->setUsername("bagadour");
//        $student2->setPassword("ba@123");
//        $student2->setSexe("Mr");
//        $student2->setScore(5);
//        $student2->setRole($role);
//        $student2->setGroup($group);
//        $manager->persist($student2);
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
//        return 4;
//    }
//}