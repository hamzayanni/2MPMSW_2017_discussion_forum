<?php

namespace Api\ApiBundle\Controller;

use Api\ApiBundle\Service\JsonRenderService;
use Core\CoreBundle\Constants\WSGroupsConstant;
use Core\CoreBundle\Entity\Groups;
use Core\CoreBundle\Entity\Role;
use Core\CoreBundle\Entity\Space;
use Core\CoreBundle\Entity\Student;
use Core\CoreBundle\Entity\Teacher;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class SignInController extends Controller
{

    /**
     * sign-in Action
     *
     * @Route("/sign-in")
     * @method({"POST"})
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function signInAction(Request $request)
    {

        /** @var JsonRenderService $jsonResponse */
        $jsonResponse = $this->get('api.json.render.service');

        $manager = $this->getDoctrine()->getManager();

        $data = $request->query->all();

        if (isset($data)) {

            $user = $manager->getRepository('CoreBundle:User')->findOneBy(['username' => $data['pseudo']]);

            if ($user) {
                if ($user instanceof Student) {
                    if ($user->getDecryptedPassword($data['password'])){
                        return $jsonResponse->success($user, WSGroupsConstant::STUDENT, Response::HTTP_OK, "Success");
                    }
                    else {
                        return $jsonResponse->wrap(403, "error", "Vérifiér les données");
                    }
                }
                if ($user instanceof Teacher) {
                    if ($user->getDecryptedPassword($data['password'])){
                        return $jsonResponse->success($user, WSGroupsConstant::TEACHER, Response::HTTP_OK, "Success");
                    }
                    else {
                        return $jsonResponse->wrap(403, "error", "Vérifiér les données");
                    }


                }
            }
        }

        return $jsonResponse->wrap(403, "error", "Vérifiér les données");

    }
}
