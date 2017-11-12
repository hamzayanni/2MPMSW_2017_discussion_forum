<?php

namespace Api\ApiBundle\Controller;

use Api\ApiBundle\Service\JsonRenderService;
use Core\CoreBundle\Entity\Groups;
use Core\CoreBundle\Entity\Question;
use Core\CoreBundle\Entity\Space;
use Core\CoreBundle\Entity\Student;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class ResponseController extends Controller
{
    /**
     * @Route("/response/{question}")
     * @param Question $question
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function findResponseByQuestion(Question $question)
    {

        $result = null;
        /** @var JsonRenderService $jsonResponse */
        $jsonResponse = $this->get('api.json.render.service');

        $responses = $this->getDoctrine()->getRepository('CoreBundle:Response')->findBy(
            ['question' => $question->getId()]
        );

        if ($responses) {
            foreach ($responses as $response) {
                $result[] = $response;
            }
            return $jsonResponse->success($result, ['Response'], Response::HTTP_OK, "Success");
        }

        return $jsonResponse->error(Response::HTTP_NOT_FOUND, "error");

    }
}
