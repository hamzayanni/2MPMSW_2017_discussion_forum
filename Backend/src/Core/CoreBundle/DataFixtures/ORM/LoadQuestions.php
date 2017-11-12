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
//use Core\CoreBundle\Entity\Question;
//use Doctrine\Common\DataFixtures\AbstractFixture;
//use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
//use Doctrine\Common\Persistence\ObjectManager;
//
//class LoadQuestions extends AbstractFixture implements OrderedFixtureInterface
//{
//
//    /**
//     * Load data fixtures with the passed EntityManager
//     *
//     * @param ObjectManager $manager
//     */
//    public function load(ObjectManager $manager)
//    {
//        $space1 = $manager->getRepository('CoreBundle:Space')->findOneBy([
//            'title' => "java"
//        ]);
//
//        $space2 = $manager->getRepository('CoreBundle:Space')->findOneBy([
//            'title' => "java"
//        ]);
//
//        $user1 = $manager->getRepository('CoreBundle:Student')->findOneBy([
//            'email' => "selmihamza@gmail.com"
//        ]);
//
//        $user2 = $manager->getRepository('CoreBundle:Student')->findOneBy([
//            'email' => "ben.aicha@gmail.com"
//        ]);
//
//        $question1 = new Question();
//        $question1->setTitle("How would I access this with JavaScript?");
//        $question1->setDescription("JAVA SCRIPT Questions");
//        $question1->setHasResponse(false);
//        $question1->setResolved(false);
//        $question1->setUser($user1);
//        $question1->setSpace($space1);
//        $manager->persist($question1);
//
//        $question2 = new Question();
//        $question2->setTitle("How would I access this with JavaScript?");
//        $question2->setDescription("JAVA SCRIPT Questions");
//        $question2->setHasResponse(true);
//        $question2->setResolved(false);
//        $question2->setUser($user2);
//        $question2->setSpace($space2);
//        $manager->persist($question2);
//
//        $question3 = new Question();
//        $question3->setTitle("How the concept of “reference” is working in the following code snippet taken from the PHP manual?");
//        $question3->setDescription("I'm trying to understand the important concept of References from the PHP manual. I come across the following code snippet in PHP manual :");
//        $question3->setHasResponse(true);
//        $question3->setResolved(true);
//        $question3->setUser($user1);
//        $question3->setSpace($space1);
//        $manager->persist($question3);
//
//        $manager->flush();
//
//    }
//
//    /**
//     * Get the order of this fixture
//     *
//     * @return integer
//     */
//    public function getOrder()
//    {
//        return 6;
//    }
//}