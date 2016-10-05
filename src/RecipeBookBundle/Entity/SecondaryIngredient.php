<?php

namespace RecipeBookBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SecondaryIngredient
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="RecipeBookBundle\Entity\SecondaryIngredientRepository")
 */
class SecondaryIngredient {

    /**
     *
     * @ORM\ManyToOne(targetEntity="Recipe", inversedBy="secondaryIngredients")
     * @ORM\JoinColumn(name="recipe_id", referencedColumnName="id")
     */
    private $recipe;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Dictionary")
     * @ORM\JoinColumn(name="dict_id", referencedColumnName="id")
     */
    private $dictionary;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantity", type="integer")
     */
    private $quantity;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set dictId
     *
     * @param integer $dictId
     * @return SecondaryIngredient
     */
    public function setDictId($dictId) {
        $this->dictId = $dictId;

        return $this;
    }

    /**
     * Get dictId
     *
     * @return integer 
     */
    public function getDictId() {
        return $this->dictId;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     * @return SecondaryIngredient
     */
    public function setQuantity($quantity) {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer 
     */
    public function getQuantity() {
        return $this->quantity;
    }

    /**
     * Set recipeId
     *
     * @param integer $recipeId
     * @return SecondaryIngredient
     */
    public function setRecipeId($recipeId) {
        $this->recipeId = $recipeId;

        return $this;
    }

    /**
     * Get recipeId
     *
     * @return integer 
     */
    public function getRecipeId() {
        return $this->recipeId;
    }

    /**
     * Set recipe
     *
     * @param \RecipeBookBundle\Entity\Recipe $recipe
     * @return SecondaryIngredient
     */
    public function setRecipe(\RecipeBookBundle\Entity\Recipe $recipe = null) {
        $this->recipe = $recipe;

        return $this;
    }

    /**
     * Get recipe
     *
     * @return \RecipeBookBundle\Entity\Recipe 
     */
    public function getRecipe() {
        return $this->recipe;
    }


    /**
     * Set dictionary
     *
     * @param \RecipeBookBundle\Entity\Dictionary $dictionary
     * @return SecondaryIngredient
     */
    public function setDictionary(\RecipeBookBundle\Entity\Dictionary $dictionary = null)
    {
        $this->dictionary = $dictionary;

        return $this;
    }

    /**
     * Get dictionary
     *
     * @return \RecipeBookBundle\Entity\Dictionary 
     */
    public function getDictionary()
    {
        return $this->dictionary;
    }
}
