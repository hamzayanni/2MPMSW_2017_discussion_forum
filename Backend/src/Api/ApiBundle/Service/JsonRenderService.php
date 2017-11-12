<?php

namespace Api\ApiBundle\Service;

use JMS\Serializer\SerializationContext;
use JMS\Serializer\Serializer;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class JsonRenderService
{


    use ContainerAwareTrait;

    /**
     * @param null $data
     * @param array $group
     * @param int $code
     * @param null $message
     * @return JsonResponse
     */
    public function success($data = null, $group = [], $code = 0, $message = null)
    {
        /* @var Serializer $serializer */
        $serializer = $this->container->get('jms_serializer');

        $serializationContext = null;

        if (count($group)) {
            $serializationContext = SerializationContext::create()->setGroups($group);
        }

        $json = $serializer->serialize($data, 'json', $serializationContext);
        $result = json_decode($json, false);

        return $this->wrap($code, $message, $result);

    }

    /**
     * @param int $code
     * @param null $message
     * @return JsonResponse
     */
    public function error($code = 0, $message = null)
    {
        return $this->wrap(Response::HTTP_NOT_FOUND, null, null);
    }

    /**
     * @param  integer $code
     * @param  string $message
     * @param  array|null $result
     * @return JsonResponse
     */
    public function wrap($code = 0, $message = null, $result = null)
    {
        $data = array(
            'code' => $code,
            'message' => $message,
            'result' => $result
        );

        $json = json_encode($data, JSON_BIGINT_AS_STRING);

        return new JsonResponse($json, $code, [], true);
    }
}