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
//use Core\CoreBundle\Entity\Response;
//use Doctrine\Common\DataFixtures\AbstractFixture;
//use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
//use Doctrine\Common\Persistence\ObjectManager;
//
//class LoadResponse extends AbstractFixture implements OrderedFixtureInterface
//{
//
//    /**
//     * Load data fixtures with the passed EntityManager
//     *
//     * @param ObjectManager $manager
//     */
//    public function load(ObjectManager $manager)
//    {
//        $question1 = $manager->getRepository('CoreBundle:Question')->findOneBy([
//            'title' => "How would I access this with JavaScript?"
//        ]);
//
//        $question2 = $manager->getRepository('CoreBundle:Question')->findOneBy([
//            'title' => "How would I access this with JavaScript?"
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
//        $response1 = new Response();
//        $response1->setDescription("reponse1 reponse1 reponse1 reponse1");
//        $response1->setUser($user1);
//        $response1->setQuestion($question1);
//        $response1->setVote(3);
//        $manager->persist($response1);
//
//        $response2 = new Response();
//        $response2->setDescription("reponse2 reponse2 reponse2 reponse2 reponse2");
//        $response2->setUser($user2);
//        $response2->setQuestion($question1);
//        $response2->setVote(0);
//        $manager->persist($response2);
//
//
//        $response3 = new Response();
//        $response3->setDescription("reponse3 reponse3 reponse3 reponse3 reponse3");
//        $response3->setUser($user2);
//        $response3->setQuestion($question2);
//        $response3->setVote(0);
//        $manager->persist($response3);
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
//        return 7;
//    }
//}