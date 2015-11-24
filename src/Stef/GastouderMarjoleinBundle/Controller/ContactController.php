<?php

namespace Stef\GastouderMarjoleinBundle\Controller;

use Stef\GastouderMarjoleinBundle\Entity\Contact;
use Stef\GastouderMarjoleinBundle\Form\ContactType;
use Stef\SimpleCmsBundle\Entity\Page;
use Symfony\Component\HttpFoundation\Request;

class ContactController extends BaseController
{
    public function contactAction(Request $request)
    {
        $form = $this->createForm(new ContactType());

        if ($request->isMethod('POST')) {
            $form->bind($request);

            if ($form->isValid()) {
                $contact = new Contact();
                $contact->setEmail($form->get('email')->getData());
                $contact->setName($form->get('name')->getData());
                $contact->setReason($form->get('reason')->getData());
                $contact->setPhone($form->get('phone')->getData());
                $contact->setIp($request->getClientIp());
                $contact->setSummary($form->get('summary')->getData());
                $contact->setModified(new \DateTime());
                $contact->setCreated(new \DateTime());

                $manager = $this->getContactManager();
                $manager->persistAndFlush($contact);

                return $this->redirect($this->generateUrl('stef_gastouder_marjolein_page_contact'));
            }
        }

        return $this->render('StefGastouderMarjoleinBundle:Default:contact.html.twig', [
            'page' => $this->getContactPageData(),
            'form' => $form->createView(),
        ]);
    }

    public function getContactPageData()
    {
        $page = new Page();
        $page->setDescription('Voor meer informatie over de opvang bij Marjolein van Deventer kunt u altijd vrijblijvend contact opnemen. Ik stuur altijd een berichtje terug.');
        $page->setTitle('Contact');

        $page->setBody('
            <h2>Direct contact via website</h2>
            <p>Via onderstaand formulier kan je een bericht sturen of vraag stellen. Uiteraard zal ik na ontvangst zo snel mogelijk een reactie sturen.</p>
            <h2>Via Facebook</h2>
            <p>Ook ben ik te bereiken via de facebookpagina <a href="https://www.facebook.com/pages/Gastouder-Marjolein/1520167084916978">Gastouder Marjolein</a>.</p>
            <h2>Adres</h2>
            <p>De opvang is te vinden op onderstaand adres. Het bezoeken van de opvang bij voorkeur alleen op afspraak.</p>
            <p>
                <strong>Marjolein van Deventer</strong></br>
                Haringvlietstraat 97</br>
                3313 EB Dordrecht</br>
            </p>
        ');

        return $page;
    }
}