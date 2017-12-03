<?php

namespace Api\ApiBundle\Controller;

use Api\ApiBundle\Service\JsonRenderService;
use Core\CoreBundle\Constants\WSGroupsConstant;
use Core\CoreBundle\Entity\Groups;
use Core\CoreBundle\Entity\Media;
use Core\CoreBundle\Entity\Role;
use Core\CoreBundle\Entity\Space;
use Core\CoreBundle\Entity\Student;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class StudentController extends Controller
{
    /**
     * @Route("/student")
     */
    public function indexAction()
    {
        $students = $this->getDoctrine()->getRepository('CoreBundle:Student')->findAll();

        $result = null;

        /** @var JsonRenderService $jsonResponse */
        $jsonResponse = $this->get('api.json.render.service');

        if ($students) {
            foreach ($students as $student) {
                $result[] = $student;
            }
            return $jsonResponse->success($result, ['Student'], Response::HTTP_OK, "Success");
        }

        return $jsonResponse->error(Response::HTTP_NOT_FOUND, "error");
    }

    /**
     * @Route("/student/find/{student}")
     * @method("GET")
     * @param Student $student
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function findStudentByIdAction(Student $student)
    {
        $student = $this->getDoctrine()->getRepository('CoreBundle:Student')->find($student->getId());

        /** @var JsonRenderService $jsonResponse */
        $jsonResponse = $this->get('api.json.render.service');

        if ($student) {
            return $jsonResponse->success($student, ['Student'], Response::HTTP_OK, "Success");
        }

        return $jsonResponse->error(Response::HTTP_NOT_FOUND, "error");
    }

    /**
     * Add new Student
     *
     * @Route("/student/add")
     * @method({"POST"})
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function addStudentAction(Request $request)
    {

        /** @var JsonRenderService $jsonResponse */
        $jsonResponse = $this->get('api.json.render.service');

        $manager = $this->getDoctrine()->getManager();

        $data = $request->query->all();

        if (isset($data)) {
            $group = $manager->getRepository('CoreBundle:Groups')->find($data['group']);
            $role = $manager->getRepository('CoreBundle:Role')->findOneBy(['code' => Role::ROLE_STUDENT]);

            $student = new Student();
            $student->setFirstName($data['nom']);
            $student->setLastName($data['prenom']);
            $student->setSexe($data['sexe']);
            $student->setEmail($data['email']);
            $student->setCIN($data['cin']);
            $student->setUsername($data['pseudo']);
            $student->setPassword(password_hash($data['password'], PASSWORD_DEFAULT));
            $student->setGroup($group);
            $student->setRole($role);

            $manager->persist($student);
            $manager->flush();

            return $jsonResponse->wrap(200, "success", "Thème ajouté avec succés");
        }

        return $jsonResponse->wrap(403, "error", "Vérifiér les données");

    }

    /**
     * @Route("/student/invalid")
     */
    public function findInvalidRegistrationStudentAction()
    {
        $students = $this->getDoctrine()->getRepository('CoreBundle:Student')->findBy([
            'validRegistration' => false
        ]);

        $result = null;

        /** @var JsonRenderService $jsonResponse */
        $jsonResponse = $this->get('api.json.render.service');

        if ($students) {
            foreach ($students as $student) {
                $result[] = $student;
            }
            return $jsonResponse->success($result, WSGroupsConstant::STUDENT, Response::HTTP_OK, "Success");
        }

        return $jsonResponse->error(Response::HTTP_NOT_FOUND, "error");
    }

    /**
     * Add new Student
     *
     * @Route("/student/update/{student}", name="uploads_avatar")
     * @method({"POST", "GET"})
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function updateStudentAction(Request $request, Student $student)
    {

        /** @var JsonRenderService $jsonResponse */
        $jsonResponse = $this->get('api.json.render.service');

        $manager = $this->getDoctrine()->getManager();

        $data = $request->query->all();

        if (isset($data)) {

            if ($request->files) {

                foreach ($request->files as $file) {
                    $media = new Media();
                    $media->setFile($file);

                    $manager->persist($media);

                    $student->setMedia($media);
                    $manager->persist($student);

                }

                $manager->flush();
                return $jsonResponse->wrap(200, "success", "dddddd ajouté avec succés");
            }
        }

        return $jsonResponse->wrap(403, "error", "Vérifiér les données");

    }
}
