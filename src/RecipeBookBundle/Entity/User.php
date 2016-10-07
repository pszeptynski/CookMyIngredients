<?php

namespace RecipeBookBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="Recipe", mappedBy="user")
     */
    private $recipes;

    public function __construct() {
        parent::__construct();
        $this->recipes = new ArrayCollection();
    }


    /**
     * Add recipes
     *
     * @param \RecipeBookBundle\Entity\Recipe $recipes
     * @return User
     */
    public function addRecipe(\RecipeBookBundle\Entity\Recipe $recipes)
    {
        $this->recipes[] = $recipes;

        return $this;
    }

    /**
     * Remove recipes
     *
     * @param \RecipeBookBundle\Entity\Recipe $recipes
     */
    public function removeRecipe(\RecipeBookBundle\Entity\Recipe $recipes)
    {
        $this->recipes->removeElement($recipes);
    }

    /**
     * Get recipes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRecipes()
    {
        return $this->recipes;
    }
}
