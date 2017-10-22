<?php

namespace Api\ApiBundle\Controller;

use JMS\Serializer\SerializationContext;
use JMS\Serializer\Serializer;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class GroupController extends Controller
{
    /**
     * @Route("/groups")
     */
    public function indexAction()
    {
        $groups   = $this->getDoctrine()->getRepository('CoreBundle:Groups')->findAll();
        $students = $this->getDoctrine()->getRepository('CoreBundle:Student')->findAll();

        if ($groups && $students){
            $groupsResult   = [];

            foreach ($groups as $group) {
                $groupsResult['Groups'][] = $group;

            }
            foreach ($students as $student) {
                $groupsResult['Student'][] = $student;

            }

            return $this->success($groupsResult, ['Group'], 200, "Success");
        }

        return new Response('null');
    }

    /**
     * @param null $data
     * @param array $group
     * @param int $code
     * @param null $message
     * @return JsonResponse
     */
    protected function success($data = null, $group = [], $code = 0, $message = null)
    {
        if (null === $data) {
            return $this->wrap(0, null, null);
        }

        /* @var Serializer $serializer */
        $serializer = $this->get('jms_serializer');

        $serializationContext = null;

        if (count($group)) {
        $serializationContext = SerializationContext::create()->setGroups($group);
        }

        $json = $serializer->serialize($data, 'json', $serializationContext);
        $result = json_decode($json, false);

        return $this->wrap($code, $message, $result);

    }

    /**
     * @param  integer $code
     * @param  string $message
     * @param  array|null $result
     * @return JsonResponse
     */
        private function wrap($code = 0, $message = null, $result = null)
    {
        $data = array(
            'code' => $code,
            'message' => $message,
            'result' => $result
        );

        $json = json_encode($data, JSON_BIGINT_AS_STRING);

        return new JsonResponse($json, Response::HTTP_OK, [], true);
    }
}
