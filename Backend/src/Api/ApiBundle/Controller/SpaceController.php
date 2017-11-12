<?php

namespace Api\ApiBundle\Controller;

use Api\ApiBundle\Service\JsonRenderService;
use Core\CoreBundle\Entity\Groups;
use Core\CoreBundle\Entity\Space;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class SpaceController extends Controller
{
    /**
     * @Route("/space")
     */
    public function indexAction()
    {
        $spaces = $this->getDoctrine()->getRepository('CoreBundle:Space')->findAll();

        $result = null;

        /** @var JsonRenderService $jsonResponse */
        $jsonResponse = $this->get('api.json.render.service');

        if ($spaces) {
            foreach ($spaces as $space) {
                $result[] = $space;
            }
            return $jsonResponse->success($result, ['Space'], Response::HTTP_OK, "Success");
        }

        return $jsonResponse->error(Response::HTTP_NOT_FOUND, "error");
    }

    /**
     * @Route("/space/{space}")
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
}
