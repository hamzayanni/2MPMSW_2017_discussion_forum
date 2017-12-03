<?php

namespace Api\ApiBundle\Controller;

use Api\ApiBundle\Service\JsonRenderService;
use Core\CoreBundle\Constants\WSGroupsConstant;
use Core\CoreBundle\Entity\Groups;
use Core\CoreBundle\Entity\Space;
use Core\CoreBundle\Entity\Student;
use Core\CoreBundle\Repository\QuestionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class QuestionController extends Controller
{
    /**
     * @Route("/question")
     */
    public function findQuestionByEmptyResponseAction()
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
    public function findQuestionBySpaceAction(Space $space)
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

            return $jsonResponse->success($result, WSGroupsConstant::QUESTION, Response::HTTP_OK, "Success");
        }

        return $jsonResponse->error(Response::HTTP_NOT_FOUND, "error");
    }

    /**
     * @Route("/question/search/")
     * @method("POST")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function findQuestionByKeySearchAction(Request $request)
    {
        $key = $request->query->get('key');

        $result = null;
        /** @var JsonRenderService $jsonResponse */
        $jsonResponse = $this->get('api.json.render.service');

        /** @var QuestionRepository $questions */
        $questions = $this->getDoctrine()->getRepository('CoreBundle:Question')->searchQuestion($key);

        if ($questions) {
            foreach ($questions as $question) {
                $result[] = $question;
            }

            return $jsonResponse->success($result, WSGroupsConstant::QUESTION, Response::HTTP_OK, "Success");
        }

        return $jsonResponse->error(Response::HTTP_NOT_FOUND, "error");
    }

}
