<?php

namespace Api\ApiBundle\Controller;

use Api\ApiBundle\Service\JsonRenderService;
use Core\CoreBundle\Entity\Groups;
use Core\CoreBundle\Entity\Space;
use Core\CoreBundle\Entity\Student;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
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
     * @Route("/student/{student}")
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
}
