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
//use Doctrine\Common\DataFixtures\AbstractFixture;
//use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
//use Doctrine\Common\Persistence\ObjectManager;
//
//class LoadUserRole extends AbstractFixture implements OrderedFixtureInterface
//{
//
//    /**
//     * Load data fixtures with the passed EntityManager
//     *
//     * @param ObjectManager $manager
//     */
//    public function load(ObjectManager $manager)
//    {
//
//        $roleEntity = new Role();
//        $consts = $roleEntity::getAllConstants();
//
//        foreach ($consts as $const){
//            $role = new Role();
//            $role->setCode($const);
//
//            switch ($const){
//                case $roleEntity::ROLE_ROOT:
//                    $role->setRole("ROOT");
//                    break;
//                case $roleEntity::ROLE_SUPER_ADMIN:
//                    $role->setRole("SUPER ADMIN");
//                    break;
//                case $roleEntity::ROLE_ADMIN:
//                    $role->setRole("ADMIN");
//                    break;
//                case $roleEntity::ROLE_STUDENT:
//                    $role->setRole("Etudiant");
//                    break;
//                case $roleEntity::ROLE_TEACHER:
//                    $role->setRole("Enseignant");
//            };
//            $manager->persist($role);
//        }
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
//        return 3;
//    }
//}