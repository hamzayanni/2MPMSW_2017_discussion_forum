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
//use Core\CoreBundle\Entity\Teacher;
//use Doctrine\Common\DataFixtures\AbstractFixture;
//use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
//use Doctrine\Common\Persistence\ObjectManager;
//
//class LoadTeacher extends AbstractFixture implements OrderedFixtureInterface
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
//            'code' => Role::ROLE_TEACHER
//        ]);
//
//
//        $teacher1 = new Teacher();
//
//        $teacher1->setFirstName("amen");
//        $teacher1->setLastName("ajroud");
//        $teacher1->setEmail("amenajroud@gmail.com");
//        $teacher1->setCIN('01654095');
//        $teacher1->setUsername("amenajroud");
//        $teacher1->setPassword("amen123");
//        $teacher1->setSexe("Mr");
//        $teacher1->setGrad("Proffesseur");
//        $teacher1->setValidRegistration(true);
//        $teacher1->setScore(15);
//        $teacher1->setRole($role);
//        $manager->persist($teacher1);
//
//        $teacher2 = new Teacher();
//
//        $teacher2->setFirstName("haythem");
//        $teacher2->setLastName("saoudi");
//        $teacher2->setEmail("s.haythem@yahoo.com");
//        $teacher2->setCIN('05987456');
//        $teacher2->setUsername("s_haythem");
//        $teacher2->setPassword("sh777");
//        $teacher2->setSexe("Mr");
//        $teacher2->setGrad("Maître assistant");
//        $teacher2->setValidRegistration(true);
//        $teacher2->setScore(20);
//        $teacher2->setRole($role);
//        $manager->persist($teacher2);
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
//        return 5;
//    }
//}