<?php

namespace Api\ApiBundle\Controller;

use Api\ApiBundle\Service\JsonRenderService;
use Core\CoreBundle\Entity\Groups;
use Core\CoreBundle\Entity\Space;
use Core\CoreBundle\Entity\Student;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class QuestionController extends Controller
{
    /**
     * @Route("/question")
     */
    public function findQuestionByEmptyResponse()
    {

        $result = null;
        /** @var JsonRenderService $jsonResponse */
        $jsonResponse = $this->get('api.json.render.service');

        $questions = $this->getDoctrine()->getRepository('CoreBundle:Question')->findBy([
            'hasResponse' => false
        ]);

        if ($questions) {
            foreach ($questions as $question) {
                $result[] = $question;
            }
            return $jsonResponse->success($result, ['Question'], Response::HTTP_OK, "Success");
        }

        return $jsonResponse->error(Response::HTTP_NOT_FOUND, "error");

    }

    /**
     * @Route("/question/{space}")
     * @method("GET")
     * @param Space $space
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function findQuestionBySpace(Space $space)
    {

        $result = null;
        /** @var JsonRenderService $jsonResponse */
        $jsonResponse = $this->get('api.json.render.service');

        $questions = $this->getDoctrine()->getRepository('CoreBundle:Question')->findBy([
            'space' => $space->getId()
        ]);


        if ($questions) {
            foreach ($questions as $question) {
                $result[] = $question;
            }

            return $jsonResponse->success($result, ['Question'], Response::HTTP_OK, "Success");
        }

        return $jsonResponse->error(Response::HTTP_NOT_FOUND, "error");
    }

}
