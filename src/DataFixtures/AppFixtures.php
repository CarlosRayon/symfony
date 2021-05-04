<?php

namespace App\DataFixtures;

use App\Entity\Product;
use App\Entity\ProductCharacteristics;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        foreach (DataProvider::PRODUCT_DATA as $product) {
            $newProduct = new Product();
            $newProduct->setName($product['name']);
            $newProduct->setDescription($product['description']);
            $newProduct->setPrice($product['price']);
            $newProduct->setStatus($product['status']);
            $manager->persist($newProduct);

            foreach ($product['characteristics'] as $characteristics) {

                $ProductCharacteristics = new ProductCharacteristics();
                $ProductCharacteristics->setName($characteristics['name']);
                $ProductCharacteristics->setDescription($characteristics['description']);
                $ProductCharacteristics->setPrice($characteristics['price']);
                $ProductCharacteristics->setStatus($characteristics['status']);
                $ProductCharacteristics->setProduct($newProduct);
                $manager->persist($ProductCharacteristics);
            }
        }

        $manager->flush();
    }
}
