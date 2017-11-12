<?php

namespace Api\ApiBundle\Controller;

use Api\ApiBundle\Service\JsonRenderService;
use Core\CoreBundle\Entity\Groups;
use Core\CoreBundle\Entity\Space;
use Core\CoreBundle\Entity\Student;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
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
}
