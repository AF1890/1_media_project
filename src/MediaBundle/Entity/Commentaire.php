<?php

namespace MediaBundle\Entity;

/**
 * Commentaire
 */
class Commentaire
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $utilisateur;

    /**
     * @var string
     */
    private $commentaire;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set utilisateur
     *
     * @param string $utilisateur
     *
     * @return Commentaire
     */
    public function setUtilisateur($utilisateur)
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    /**
     * Get utilisateur
     *
     * @return string
     */
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }

    /**
     * Set commentaire
     *
     * @param string $commentaire
     *
     * @return Commentaire
     */
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * Get commentaire
     *
     * @return string
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->album = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add album
     *
     * @param \MediaBundle\Entity\Commentaire $album
     *
     * @return Commentaire
     */
    public function addAlbum(\MediaBundle\Entity\Commentaire $album)
    {
        $this->album[] = $album;

        return $this;
    }

    /**
     * Remove album
     *
     * @param \MediaBundle\Entity\Commentaire $album
     */
    public function removeAlbum(\MediaBundle\Entity\Commentaire $album)
    {
        $this->album->removeElement($album);
    }
    /**
     * @var \MediaBundle\Entity\album
     */
    private $albums;


    /**
     * Set albums
     *
     * @param \MediaBundle\Entity\album $albums
     *
     * @return Commentaire
     */
    public function setAlbums(\MediaBundle\Entity\album $albums = null)
    {
        $this->albums = $albums;

        return $this;
    }

    /**
     * Get albums
     *
     * @return \MediaBundle\Entity\album
     */
    public function getAlbums()
    {
        return $this->albums;
    }
}
