<?php

namespace App\Controller;

use App\Service\NotificationService;
use App\Entity\User;
use App\Provider\SmtpProvider;
use App\Provider\mailerProvider;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class NotificationController extends AbstractController
{
    /**
     * @Route("/notification", name="notification")
     */
    public function index()
    {
        return $this->render('notification/index.html.twig', [
            'controller_name' => 'NotificationController',
        ]);
    }
    /**
     * @Route("/users/send_notification/{Id}", name="send_notification")
     */
    public function sendNotification(NotificationService $notificationService)
    {
        $user = new User();
        $message = 'Este es el texto de un mensaje de notificación desde su uso por el proveedor de envío smtp, desde el controlador de notifiaciones';
        $proveedor = new SmtpProvider(); 
        $resultNotify = $notificationService->notify($user, $message, $proveedor);
        
        
        $response = new JsonResponse();
        return $response->setData(array(
            'id' => $user->getId(),
            'email' => $user->getEmail(),
            'message' => $message,
            'result' => $resultNotify
        ));
//        return $this->render('user/show.html.twig', [
//            'user' => $user,
//            'message' => $message,
//            'result' => $resultNotify,   
//      ]);
    }
}
