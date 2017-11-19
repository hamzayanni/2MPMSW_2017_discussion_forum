<?php

namespace Api\ApiBundle\Controller;

use Api\ApiBundle\Service\JsonRenderService;
use Core\CoreBundle\Entity\Groups;
use Core\CoreBundle\Entity\Space;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class SpaceController extends Controller
{
    /**
     * Get all Spaces
     *
     * @Route("/space")
     */
    public function indexAction()
    {
        $spaces = $this->getDoctrine()->getRepository('CoreBundle:Space')->findAll();
        $questionRepository = $this->getDoctrine()->getRepository('CoreBundle:Question');

        $result = null;

        /** @var JsonRenderService $jsonResponse */
        $jsonResponse = $this->get('api.json.render.service');

        if ($spaces) {
            /** @var Space $space */
            foreach ($spaces as $space) {
                $questions = $questionRepository->findCountQuestionBySpace($space->getId());
                $space->setNbQuestions(count($questions));
                $result[] = $space;
            }

            return $jsonResponse->success($result, ['Space'], Response::HTTP_OK, "Success");
        }

        return $jsonResponse->error(Response::HTTP_NOT_FOUND, "error");
    }

    /**
     * Get Space by ID
     *
     * @Route("/space/find/{space}")
     * @method("GET")
     * @param Space $space
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function findSpaceByIdAction(Space $space)
    {
        $space = $this->getDoctrine()->getRepository('CoreBundle:Space')->find($space->getId());

        /** @var JsonRenderService $jsonResponse */
        $jsonResponse = $this->get('api.json.render.service');

        if ($space) {
            return $jsonResponse->success($space, ['Space'], Response::HTTP_OK, "Success");
        }

        return $jsonResponse->error(Response::HTTP_NOT_FOUND, "error");
    }


    /**
     * Add new space
     *
     * @Route("/space/add")
     * @method({"POST"})
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function addSpace(Request $request)
    {

        /** @var JsonRenderService $jsonResponse */
        $jsonResponse = $this->get('api.json.render.service');

        $manager = $this->getDoctrine()->getManager();

        $data = $request->query->all();

        if (isset($data) && key_exists('title', $data)) {
            $space = new Space();
            $space->setTitle($data['title']);
            $manager->persist($space);
            $manager->flush();

            return $jsonResponse->wrap(200, "success", "Thème ajouté avec succés");
        }

        return $jsonResponse->wrap(403, "error", "Vérifiér les données");

    }
}
