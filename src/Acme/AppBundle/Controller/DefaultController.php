<?php

namespace Acme\AppBundle\Controller;

use Acme\AppBundle\Calculator\Calculator;
use Acme\AppBundle\Entity\Category;
use Guzzle\Service\Client;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\AppBundle\Entity\Product;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AcmeAppBundle:Default:index.html.twig', array('name' => $name));
    }

    public function calcAction()
    {

        $options = array('increment', 'decrement');
        $calculator = new Calculator($options);

        $result = $calculator->minus(10)->add(4)->minus(6)->add(2)->getResult();
//        var_dump($result);

        return $this->render('@AcmeApp/Default/index.html.twig', array(
            'result' => $result
        ));

    }

    public function resultAction()
    {
        var_dump($this->getRequest()->get('result'));exit;
    }


//    public function dbaseAction()
//    {
//        $product = new Product();
//        $product->setName('A Foo Bar');
//        $product->setPrice('19.99');
//        $product->setDescription('Lorem ipsum dolor');
//
//        $em = $this->getDoctrine()->getManager();
//        $em->persist($product);
//        $em->flush();
//
//        return new Response('Created product id '.$product->getId());
//    }

    public function productAction()
    {

        $client = new Client('http://stroyka.by');

        $request = $client->get('/');

        $request->send();

        $resault = $request->getResponse()->getBody(true);

        $crawler = new Crawler;
//        $crawler->addHTMLContent($resault);
//        $res = $request->getResponse()->getH;

//        var_dump($res);exit();
//        $text = utf8_decode($resault);
        $crawler = new Crawler($resault);
        $resault = $crawler->filter('ul.b-categories')->html();
//
//
//        $crowler2 = new Crawler($resault);
//
//        $resault = $crowler2->filter('span.b-categories__name');
//
//        $nodeValues = $crawler->filter('span.b-categories__name')->each(function (Crawler $node, $i) {
//            return utf8_decode($node->text());
//        });

//        var_dump(mb_detect_encoding($nodeValues[0]));exit();
//        foreach($nodeValues as $nv) {
//            $category = new Category();
//            $category->setName($nv);
//            $this->getDoctrine()->getManager()->persist($category);
//        }

//        $this->getDoctrine()->getManager()->flush();

//        var_dump($nodeValues);

//        var_dump($resault);
//        exit;

        return $this->render('AcmeAppBundle:Default:product.html.twig', array(
            'result' => $resault
        ));

    }

    public function handleAction()
    {
        $counter = 0;
        while($counter <= 10)
        {
            $product = new Product();
            $product->setName($this->getRequest()->get('prodname'));
            $product->setDescription($this->getRequest()->get('proddescription'));
            $product->setColour($this->getRequest()->get('prodcolour'));
            $product->setPrice(rand(0,20));


            if ($product->getPrice() >= 14) {
                $add = $this->getDoctrine()->getManager();
                $add->persist($product);
                $add->flush();
            }

            $counter++;
        }
        $a='well done!';
        echo($a);
        exit;

    }




}
