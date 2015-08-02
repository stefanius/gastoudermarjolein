<?php

namespace Stef\GastouderMarjoleinBundle\Controller;

use Stef\SimpleCmsBundle\Entity\Page;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ContactController extends Controller
{
    public function contactAction()
    {
        $page = new Page();
        $page->setDescription('Voor meer informatie over de opvang bij Marjolein van Deventer kunt u altijd vrijblijvend contact opnemen. Ik stuur altijd een berichtje terug.');
        $page->setTitle('Contact');

        $page->setBody('
            <h2>Direct contact via website</h2>
            <p>Op dit moment is het nog niet mogelijk om direct via de website contact op te nemen. Dit gaat uiteraard spoedig veranderen zodat u meteen via de website al uw vragen bij mij kwijt kunt.</p>
            <h2>Via Facebook</h2>
            <p>U kunt mij bereiken via de facebookpagina <a href="https://www.facebook.com/pages/Gastouder-Marjolein/1520167084916978">Gastouder Marjolein</a>. Houd er rekening mee dat als u een berichtje plaatst op die pagina, dit voor iedereen leesbaar is. Als u uw vraag liever in een priveberichtje bespreekt, geeft u dat dan aan en ik neem zo snel mogelijk contact met u op.</p>
            <h2>Adres</h2>
            <p>De opvang is nog niet geopend. Om u echter een idee te geven in welke omgeving u uw kind misschien wel langsbrengt geef ik hieronder toch alvast het adres.</p>
            <p>
                <strong>Marjolein van Deventer</strong></br>
                Haringvlietstraat</br>
                3313 EB Dordrecht</br>
            </p>
        ');

        return $this->render('StefGastouderMarjoleinBundle:Default:page.html.twig', [
            'page' => $page
        ]);
    }
}