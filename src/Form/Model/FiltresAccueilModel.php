<?php

namespace App\Form\Model;



class FiltresAccueilModel

/*
 * Création d'un model permettant de déclarer des variables n'appartenant pas à la même entité
 *
 */
{
    private $campus;
    private $motCles;
    private $dateHeureDebut;
    private $dateLimiteInscription;
    private $estOrganisateur;
    private $inscrit;
    private $pasInscrit;

    /**
     * @return mixed
     */
    public function getCampus()
    {
        return $this->campus;
    }

    /**
     * @param mixed $campus
     */
    public function setCampus($campus): void
    {
        $this->campus = $campus;
    }

    /**
     * @return mixed
     */
    public function getMotCles()
    {
        return $this->motCles;
    }

    /**
     * @param mixed $motCles
     */
    public function setMotCles($motCles): void
    {
        $this->motCles = $motCles;
    }

    /**
     * @return mixed
     */
    public function getDateHeureDebut()
    {
        return $this->dateHeureDebut;
    }

    /**
     * @param mixed $dateHeureDebut
     */
    public function setDateHeureDebut($dateHeureDebut): void
    {
        $this->dateHeureDebut = $dateHeureDebut;
    }

    /**
     * @return mixed
     */
    public function getDateLimiteInscription()
    {
        return $this->dateLimiteInscription;
    }

    /**
     * @param mixed $dateLimiteInscription
     */
    public function setDateLimiteInscription($dateLimiteInscription): void
    {
        $this->dateLimiteInscription = $dateLimiteInscription;
    }

    /**
     * @return mixed
     */
    public function getEstOrganisateur()
    {
        return $this->estOrganisateur;
    }

    /**
     * @param mixed $estOrganisateur
     */
    public function setEstOrganisateur($estOrganisateur): void
    {
        $this->estOrganisateur = $estOrganisateur;
    }

    /**
     * @return mixed
     */
    public function getInscrit()
    {
        return $this->inscrit;
    }

    /**
     * @param mixed $inscrit
     */
    public function setInscrit($inscrit): void
    {
        $this->inscrit = $inscrit;
    }

    /**
     * @return mixed
     */
    public function getPasInscrit()
    {
        return $this->pasInscrit;
    }

    /**
     * @param mixed $pasInscrit
     */
    public function setPasInscrit($pasInscrit): void
    {
        $this->pasInscrit = $pasInscrit;
    }




}