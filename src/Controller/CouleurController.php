<?php

namespace App\Controller;

use App\Entity\Couleur;
use App\Form\CouleurType;
use App\Repository\CouleurRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/couleur')]
class CouleurController extends AbstractController
{
    #[Route('/', name: 'app_couleur_index', methods: ['GET'])]
    public function index(CouleurRepository $couleurRepository): Response
    {
        return $this->render('couleur/index.html.twig', [
            'couleurs' => $couleurRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_couleur_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $couleur = new Couleur();
        $form = $this->createForm(CouleurType::class, $couleur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // ici coder les exeptions
            try {
                $entityManager->persist($couleur);
                $entityManager->flush();
                $this->addFlash('success', 'La couleur a été ajoutée avec succès.');
            } catch (\Exception $e) {
                $this->addFlash('danger', 'La couleur n\'a pas été ajoutée.');
                // dd($e); Aide as trouver le code erreur UNIQ_......
                if (($e->getCode() == 1062)) {
                    if (strpos($e->getMessage(), "UNIQ_3C0D87E5C9828C2D")) {
                        $this->addFlash('danger', 'Le nom doit êtres unique.');
                    }
                }
            }

            return $this->redirectToRoute('app_couleur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('couleur/new.html.twig', [
            'couleur' => $couleur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_couleur_show', methods: ['GET'])]
    public function show(Couleur $couleur): Response
    {
        return $this->render('couleur/show.html.twig', [
            'couleur' => $couleur,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_couleur_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Couleur $couleur, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CouleurType::class, $couleur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_couleur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('couleur/edit.html.twig', [
            'couleur' => $couleur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_couleur_delete', methods: ['POST'])]
    public function delete(Request $request, Couleur $couleur, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $couleur->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($couleur);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_couleur_index', [], Response::HTTP_SEE_OTHER);
    }
}
