<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\HttpFoundation\JsonResponse;

class EmailController extends AbstractController
{

    

    /**
     * @Route("/email", name="email")
     */
    public function index(Request $request): Response
    {

        $data = json_decode($request->getContent(), true);

        $missatge = $data['missatge'];

        return $this->redirectToRoute('sendEmail', array('missatge' => $missatge));

    }

    /**
     * @Route("/sendEmail", name="sendEmail")
     */
    public function sendEmail(MailerInterface $mailer): JsonResponse
    {

        $email = (new Email())
            ->from('hello@example.com')
            ->to('a18jorgornei@inspedralbes.cat')
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject('Time for Symfony Mailer!')
            ->text('Prova desde vue');
//            ->html('<p>See Twig integration for better HTML integration!</p>');

        $mailer->send($email);

        return new JsonResponse(['data' => 'email enviat'], Response::HTTP_OK);
    }
}
