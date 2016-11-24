<?php

namespace MediaProjectBundle\Controller;

use MediaProjectBundle\Entity\Album;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


/**
 * Album controller.
 *
 */
class AlbumController extends Controller
{
    /**
     * Lists all album entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $albums = $em->getRepository('MediaProjectBundle:Album')->findAll();

        return $this->render('@MediaProject/album/index.html.twig', array(
            'albums' => $albums,
        ));
    }

    /**
     * Creates a new album entity.
     *
     */
    public function newAction(Request $request)
    {
        $album = new Album();
        $form = $this->createForm('MediaProjectBundle\Form\AlbumType', $album);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($album);
            $em->flush($album);

            return $this->redirectToRoute('album_show', array('id' => $album->getId()));
        }




        return $this->render('@MediaProject/album/new.html.twig', array(
            'album' => $album,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a album entity.
     *
     */
    public function showAction(Album $album)
    {
        $deleteForm = $this->createDeleteForm($album);

        return $this->render('@MediaProject/album/show.html.twig', array(
            'album' => $album,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing album entity.
     *
     */
    public function editAction(Request $request, Album $album)
    {
        $deleteForm = $this->createDeleteForm($album);
        $editForm = $this->createForm('MediaProjectBundle\Form\AlbumType', $album);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('album_edit', array('id' => $album->getId()));
        }

        return $this->render('@MediaProject/album/edit.html.twig', array(
            'album' => $album,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a album entity.
     *
     */
//    public function deleteAction(Request $request, Album $album)
//    {
//        $form = $this->createDeleteForm($album);
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
//            $em = $this->getDoctrine()->getManager();
//            $em->remove($album);
//            $em->flush($album);
//        }
//
//        return $this->redirectToRoute('album_index');
//    }
//
//    /**
//     * Creates a form to delete a album entity.
//     *
//     * @param Album $album The album entity
//     *
//     * @return \Symfony\Component\Form\Form The form
//     */
//    private function createDeleteForm(Album $album)
//    {
//        return $this->createFormBuilder()
//            ->setAction($this->generateUrl('album_delete', array('id' => $album->getId())))
//            ->setMethod('DELETE')
//            ->getForm()
//        ;
//    }


    public function deleteAction($id)
    {
        if ($id) {
            $em = $this->getDoctrine()->getManager();
// Recherche LE MODELE à supprimer parmi LES MODELES
            $album = $em->getRepository('MediaProjectBundle:Album')->findOneById($id);
// Supprime LE MODELE et SON IMAGE associée
            $em->remove($album);
// Envoie la requête à la BDD
            $em->flush();

            return $this->redirectToRoute('album_index');
        } else
            return $this->redirectToRoute('album_index');

    }
}
