<?php

namespace App\Controller;


use App\Entity\User;
use App\Provider\SmtpProvider;
use App\Provider\mailerProvider;
use App\Form\UserType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/user")
 */
class UserController extends AbstractController
{
    /**
     * @Route("/{Id}", name="user_show", methods={"GET"})
     */
//    
//    public function index(UserRepository $userRepository): Response
//    {
//        $user = new User();
//        //$idUser = $user.getId();
//        
//        return print $user->toString();
////        return $this->render('user/index.html.twig', [
////            'users' => $userRepository->findAll(),
////        ]);
//    }
    
    
    public function show(): Response
    {
        $user = new User();
        $message = 'Esto es el texto mensaje del email';
        $proveedor = new SmtpProvider(); 
        $result = $proveedor->send($user->getEmail(),$message);
        return $this->render('user/show.html.twig', [
            'user' => $user,
            'message' => $message,
            'result' => $result,
            
            
      ]);
    }
//
//    /**
//     * @Route("/new", name="user_new", methods={"GET","POST"})
//     */
//    public function new(Request $request): Response
//    {
//        $user = new User();
//        $form = $this->createForm(UserType::class, $user);
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
//            $entityManager = $this->getDoctrine()->getManager();
//            $entityManager->persist($user);
//            $entityManager->flush();
//
//            return $this->redirectToRoute('user_index');
//        }
//
//        return $this->render('user/new.html.twig', [
//            'user' => $user,
//            'form' => $form->createView(),
//        ]);
//    }
//
//    /**
//     * @Route("/{Id}", name="user_show", methods={"GET"})
//     */
//    public function show(User $user): Response
//    {
//        return $this->render('user/show.html.twig', [
//            'user' => $user,
//        ]);
//    }
//
//    /**
//     * @Route("/{Id}/edit", name="user_edit", methods={"GET","POST"})
//     */
//    public function edit(Request $request, User $user): Response
//    {
//        $form = $this->createForm(UserType::class, $user);
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
//            $this->getDoctrine()->getManager()->flush();
//
//            return $this->redirectToRoute('user_index');
//        }
//
//        return $this->render('user/edit.html.twig', [
//            'user' => $user,
//            'form' => $form->createView(),
//        ]);
//    }
//
//    /**
//     * @Route("/{Id}", name="user_delete", methods={"DELETE"})
//     */
//    public function delete(Request $request, User $user): Response
//    {
//        if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token'))) {
//            $entityManager = $this->getDoctrine()->getManager();
//            $entityManager->remove($user);
//            $entityManager->flush();
//        }
//
//        return $this->redirectToRoute('user_index');
//    }
}
