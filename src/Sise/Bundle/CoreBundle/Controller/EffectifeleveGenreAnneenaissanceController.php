<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 12/12/2014
 * Time: 12:22
 */

namespace Sise\Bundle\CoreBundle\Controller;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use Sise\Bundle\CoreBundle\Entity\EffectifeleveGenreAnneenaissance;
use Sise\Bundle\CoreBundle\Form\search\SearchType;

/**
 * EffectifeleveGenreAnneenaissance controller.
 *
 */

class EffectifeleveGenreAnneenaissanceController extends Controller {

    /**
     * Displays a form to edit an existing NomenclatureQuestionnaire entity.
     *
     */
    public function editAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $search = $this->container->get('form.factory')->createBuilder(new SearchType())->getForm();
        $session = $request->getSession();
        if ($session->has('features')) {
            $features = $session->get('features');
        }
        if ($request->isMethod('POST')) {
            $params = $request->request->get($search->getName());
            $session->set("codeetab", $params['NomenclatureEtablissement']);
            $session->set("features", $params);
            $session->set("codetypeetab", $params['NomenclatureTypeetablissement']);
        }
        $annescol = $session->get('AnneScol');
        $coderece = $session->get('CodeRece');
        $codeetab = ($session->has('codeetab')) ? $session->get('codeetab') : false;
        $codetypeetab = ($session->has('codetypeetab')) ? $session->get('codetypeetab') : false;
        $url = $this->generateUrl('effectifelevegenreanneenaissance_edit');
        $pathUpdate = $this->generateUrl('effectifelevegenreanneenaissance_update', array( 'codeetab' => $codeetab, 'codetypeetab' => $codetypeetab));

        if ($codeetab && $codetypeetab) {
            $params = $request->request->get($search->getName());
            $session->set("features", $params);
            $entities = $em->getRepository('SiseCoreBundle:EffectifeleveGenreAnneenaissance')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol'=>$annescol, 'coderece'=>$coderece));
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('effectifeleve_genre_anneenaissance');

        return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:edit.effectifeleve_genre_anneenaissance.html.twig', array(
            'entities' => @$entities,
            'search' => $search->createView(),
            'pathfilter' => $url,
            'pathUpdate' => @$pathUpdate,
            'nameclass'=>$nameclass
        ));
    }


    /**
     * Edits an existing NomenclatureQuestionnaire entity.
     *
     */
    public function updateAction(Request $request, $codeetab, $codetypeetab)
    {
        $em = $this->getDoctrine()->getManager();
        $search = $this->container->get('form.factory')->createBuilder(new SearchType())->getForm();
        $session = $request->getSession();
        if ($session->has('features')) {
            $features = $session->get('features');
        }
        $annescol = $session->get('AnneScol');
        $coderece = $session->get('CodeRece');
        $url = $this->generateUrl('effectifelevegenreanneenaissance_edit');
        $pathUpdate = $this->generateUrl('effectifelevegenreanneenaissance_update', array( 'codeetab' => $codeetab, 'codetypeetab' => $codetypeetab));
        $entities = $em->getRepository('SiseCoreBundle:EffectifeleveGenreAnneenaissance')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol'=>$annescol, 'coderece'=>$coderece));
        if ($codeetab && $codetypeetab && $request->isMethod('POST')) {
            for ($i = 0; $i < count($entities); $i++) {
                $items = array_combine(explode("|", $request->request->get('key_' . $i)), explode("|", $request->request->get('val_' . $i)));
                $item = $em->getRepository('SiseCoreBundle:EffectifeleveGenreAnneenaissance')->findOneBy($items);
                $item->setNombelevmasc($request->request->get('nombelevmasc' . $i));
                $item->setNombelevfemi($request->request->get('nombelevfemi' . $i));
                $item->setNombtotaelev($request->request->get('nombtotaelev' . $i));
                $em->persist($item);
                $em->flush();
            }
            return $this->redirect($this->generateUrl('effectifelevegenreanneenaissance_edit'));
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('effectifeleve_genre_anneenaissance');
        return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:edit.effectifeleve_genre_anneenaissance.html.twig', array(
            'entities' => @$entities,
            'search' => $search->createView(),
            'pathfilter' => $url,
            'pathUpdate' => @$pathUpdate,
            'nameclass'=>$nameclass
        ));
    }

    /**
     * Displays a form to edit an existing NomenclatureQuestionnaire entity.
     *
     */
    public function listAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $url = $this->generateUrl('effectifelevegenreanneenaissance_list');
        $search = $this->container->get('form.factory')->createBuilder(new SearchType())->getForm();
        $session = $request->getSession();
        if ($request->isMethod('POST')) {
            $params = $request->request->get($search->getName());
            $session->set("codeetab", $params['NomenclatureEtablissement']);
            $session->set("codetypeetab", $params['NomenclatureTypeetablissement']);
        }
        $annescol = $session->get('AnneScol');
        $coderece = $session->get('CodeRece');
        $codeetab = ($session->has('codeetab')) ? $session->get('codeetab') : false;
        $codetypeetab = ($session->has('codetypeetab')) ? $session->get('codetypeetab') : false;
        if ($codeetab && $codetypeetab) {
            // $entities = $em->getRepository('SiseCoreBundle:EffectiveeleveEleveeablissementprivee')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab));
            $query = $em->createQuery(
                '      	 SELECT P ,  F2
		   FROM SiseCoreBundle:EffectifEleveGenreAnneeNaissance P
		   INNER JOIN SiseCoreBundle:NomenclatureAnneeNaissance F2 WITH P.codeannenais = F2.codeannenais
		   WHERE
				P.codeetab= :CodeEtab
				and P.codetypeetab= :CodeTypeEtab
				and P.annescol= :AnneScol and P.coderece= :CodeRece
		   GROUP BY P.codeannenais
                    '
            )
                ->setParameter('CodeEtab', $codeetab)
                ->setParameter('CodeTypeEtab', $codetypeetab)
                ->setParameter('AnneScol', $annescol)
                ->setParameter('CodeRece', $coderece);

            $items = $query->getResult();
            $genreAnneenaissance = array();
            $anneenaissance = array();
            foreach ($items as $key => $item) {
                if (is_a($item, 'Sise\Bundle\CoreBundle\Entity\EffectifeleveGenreAnneenaissance')) {
                    $genreAnneenaissance[$key] = $item;
                }

                if (is_a($item, 'Sise\Bundle\CoreBundle\Entity\NomenclatureAnneenaissance')) {
                    $anneenaissance[$key-1]= $item;
                }

            }
        }


        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('effectifeleve_genre_anneenaissance');
        return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:list.effectifeleve_genre_anneenaissance.html.twig', array(
            'genreAnneenaissance' => @$genreAnneenaissance,
            'anneenaissance' => @$anneenaissance,
            'search' => $search->createView(),
            'pathfilter' => $url,
            'nameclass'=>$nameclass
        ));
    }

} 