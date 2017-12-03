<?php

namespace Api\ApiBundle\Controller;

use Api\ApiBundle\Service\JsonRenderService;
use Core\CoreBundle\Constants\WSGroupsConstant;
use Core\CoreBundle\Entity\Groups;
use Core\CoreBundle\Entity\GroupsTeacher;
use Core\CoreBundle\Entity\Role;
use Core\CoreBundle\Entity\Space;
use Core\CoreBundle\Entity\Student;
use Core\CoreBundle\Entity\Teacher;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class TeacherController extends Controller
{
    /**
     * @Route("/teacher")
     */
    public function indexAction()
    {
        $teachers = $this->getDoctrine()->getRepository('CoreBundle:Teacher')->findAll();

        $result = null;

        /** @var JsonRenderService $jsonResponse */
        $jsonResponse = $this->get('api.json.render.service');

        if ($teachers) {
            foreach ($teachers as $teacher) {
                $result[] = $teacher;
            }
            return $jsonResponse->success($result, ['Teacher'], Response::HTTP_OK, "Success");
        }

        return $jsonResponse->error(Response::HTTP_NOT_FOUND, "error");
    }

    /**
         * Add new Teacher
         *
         * @Route("/teacher/add")
         * @method({"POST"})
         * @param Request $request
         * @return \Symfony\Component\HttpFoundation\JsonResponse
         */
        public function addTeacherAction(Request $request)
    {

        /** @var JsonRenderService $jsonResponse */
        $jsonResponse = $this->get('api.json.render.service');

        $manager = $this->getDoctrine()->getManager();

        $data = $request->query->all();

        if (isset($data)) {
            /** @var Role $role */
            $role = $manager->getRepository('CoreBundle:Role')->findOneBy(['code' => Role::ROLE_TEACHER]);

            $teacher = new Teacher();
            $teacher->setFirstName($data['nom']);
            $teacher->setLastName($data['prenom']);
            $teacher->setSexe($data['sexe']);
            $teacher->setEmail($data['email']);
            $teacher->setCIN($data['cin']);
            $teacher->setUsername($data['pseudo']);
            $teacher->setGrad($data['grad']);
            $teacher->setValidRegistration(false);
            $teacher->setScore(0);
            $teacher->setPassword(password_hash($data['password'], PASSWORD_DEFAULT));
            $teacher->setRole($role);
            $manager->persist($teacher);

            $groups = $data['groups'];

            if (is_array($groups)) {
                foreach ($groups as $value) {
                    /** @var Groups $group */
                    $group = $manager->getRepository('CoreBundle:Groups')->find($value);
                    $groupTeacher = new GroupsTeacher();
                    $groupTeacher->setGroups($group);
                    $groupTeacher->setTeachers($teacher);
                    $manager->persist($groupTeacher);
                }
            }

            $manager->flush();

            return $jsonResponse->wrap(200, "success", "Teacher ajouté avec succés");
        }

        return $jsonResponse->wrap(403, "error", "Vérifiér les données");

    }

    /**
     * @Route("/teacher/invalid")
     */
    public function findInvalidRegistrationTeacherAction()
    {
        $teachers = $this->getDoctrine()->getRepository('CoreBundle:Teacher')->findBy([
            'validRegistration' => false
        ]);

        $result = null;

        /** @var JsonRenderService $jsonResponse */
        $jsonResponse = $this->get('api.json.render.service');

        if ($teachers) {
            foreach ($teachers as $teacher) {
                $result[] = $teacher;
            }
            return $jsonResponse->success($result, WSGroupsConstant::TEACHER, Response::HTTP_OK, "Success");
        }

        return $jsonResponse->error(Response::HTTP_NOT_FOUND, "error");
    }


}
