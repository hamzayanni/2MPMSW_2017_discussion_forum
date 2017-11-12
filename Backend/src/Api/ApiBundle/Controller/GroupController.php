<?php

namespace Api\ApiBundle\Controller;

use Api\ApiBundle\Service\JsonRenderService;
use Core\CoreBundle\Entity\Groups;
use Core\CoreBundle\Entity\Teacher;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class GroupController extends Controller
{
    /**
     * @Route("/group")
     */
    public function indexAction()
    {
        $groups   = $this->getDoctrine()->getRepository('CoreBundle:Groups')->findAll();

        $result = null;

        /** @var JsonRenderService $jsonResponse */
        $jsonResponse = $this->get('api.json.render.service');

        if ($groups) {
            foreach ($groups as $group) {
                $result[] = $group;
            }
            return $jsonResponse->success($result, ['Group'], Response::HTTP_OK, "Success");
        }

        return $jsonResponse->error(Response::HTTP_NOT_FOUND, "error");
    }

    /**
     * @Route("/group/{group}")
     * @method("GET")
     * @param Groups $group
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function findGroupByIdAction(Groups $group)
    {
        $group = $this->getDoctrine()->getRepository('CoreBundle:Groups')->find($group->getId());

        /** @var JsonRenderService $jsonResponse */
        $jsonResponse = $this->get('api.json.render.service');

        if ($group) {
            return $jsonResponse->success($group, ['Group'], Response::HTTP_OK, "Success");
        }

        return $jsonResponse->error(Response::HTTP_NOT_FOUND, "error");
    }

    /**
     * @Route("/group-teacher/{teacher}")
     * @method("GET")
     * @param Teacher $teacher
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function findGroupByTeacherAction(Teacher $teacher)
    {
        $groups = $this->getDoctrine()->getRepository('CoreBundle:GroupsTeacher')->findBy([
            'teachers' => $teacher->getId()
        ]);

        $result = null;

        /** @var JsonRenderService $jsonResponse */
        $jsonResponse = $this->get('api.json.render.service');

        if ($groups) {
            foreach ($groups as $group) {
                $result[] = $group;
            }
            return $jsonResponse->success($result, ['GroupTeacher'], Response::HTTP_OK, "Success");
        }

        return $jsonResponse->error(Response::HTTP_NOT_FOUND, "error");
    }
}
