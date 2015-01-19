<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 12/12/2014
 * Time: 14:43
 */

namespace Sise\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
use Sise\Bundle\CoreBundle\Entity\EffectifeleveNouveauhuitiemetechnique;
use Sise\Bundle\CoreBundle\Form\search\SearchType;

/**
 * EffectifeleveNouveauhuitiemetechnique controller.
 *
 */
class EffectifeleveNouveauhuitiemetechniqueController extends Controller
{

    /**
     * Displays a form to edit an existing NomenclatureQuestionnaire entity.
     *
     */
    public function editAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $session = $request->getSession();
        $user= $this->get('security.context')->getToken()->getUser();
        $search = $this->container->get('form.factory')->createBuilder(new SearchType($session, $em, $user))->getForm();
        if ($request->isMethod('POST')) {
            $params = $request->request->get($search->getName());
            $session->set("codeetab", $params['NomenclatureEtablissement']);
            $session->set("codetypeetab", $params['NomenclatureTypeetablissement']);
            $session->set("features", $params);
            $search = $this->container->get('form.factory')->createBuilder(new SearchType($session, $em, $user))->getForm();
        }
        $annescol = $session->get('AnneScol');
        $coderece = $session->get('CodeRece');
        $codeetab = ($session->has('codeetab')) ? $session->get('codeetab') : false;
        $codetypeetab = ($session->has('codetypeetab')) ? $session->get('codetypeetab') : false;
        $url = $this->generateUrl('effectifelevenouveauhuitiemetechnique_edit');
        $pathUpdate = $this->generateUrl('effectifelevenouveauhuitiemetechnique_update', array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab));

        if ($codeetab && $codetypeetab) {
            $params = $request->request->get($search->getName());
            $session->set("features", $params);
            $entities = $em->getRepository('SiseCoreBundle:EffectifeleveNouveauhuitiemetechnique')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece));
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('effectifeleve_nouveauhuitiemetechnique');

        return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:edit.effectifeleve_nouveauhuitiemetechnique.html.twig', array(
            'entities' => @$entities,
            'search' => $search->createView(),
            'pathfilter' => $url,
            'pathUpdate' => @$pathUpdate,
            'nameclass' => $nameclass
        ));
    }


    /**
     * Edits an existing NomenclatureQuestionnaire entity.
     *
     */
    public function updateAction(Request $request, $codeetab, $codetypeetab)
    {
        $em = $this->getDoctrine()->getManager();
        $session = $request->getSession();
        $user= $this->get('security.context')->getToken()->getUser();
        $search = $this->container->get('form.factory')->createBuilder(new SearchType($session, $em, $user))->getForm();
        $annescol = $session->get('AnneScol');
        $coderece = $session->get('CodeRece');
        $url = $this->generateUrl('effectifelevenouveauhuitiemetechnique_edit');
        $pathUpdate = $this->generateUrl('effectifelevenouveauhuitiemetechnique_update', array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab));
        $entities = $em->getRepository('SiseCoreBundle:EffectifeleveNouveauhuitiemetechnique')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece));
        if ($codeetab && $codetypeetab && $request->isMethod('POST')) {
            for ($i = 0; $i < count($entities); $i++) {
                $items = array_combine(explode("|", $request->request->get('key_' . $i)), explode("|", $request->request->get('val_' . $i)));
                $nombelevmascvenasept = $request->request->get('nombelevmascvenasept' . $i);
                $nombelevfemivenasept = $request->request->get('nombelevfemivenasept' . $i);
                $nombtotaelevvenasept = $nombelevmascvenasept + $nombelevfemivenasept;

                $nombelevmascvenahuit = $request->request->get('nombelevmascvenahuit' . $i);
                $nombelevfemivenahuit = $request->request->get('nombelevfemivenahuit' . $i);
                $nombtotaelevvenahuit = $nombelevfemivenahuit + $nombelevmascvenahuit;

                $item = $em->getRepository('SiseCoreBundle:EffectifeleveNouveauhuitiemetechnique')->findOneBy($items);


                $item->setNombelevmascvenasept($nombelevmascvenasept);
                $item->setNombelevfemivenasept($nombelevfemivenasept);
                $item->setNombtotaelevvenasept($nombtotaelevvenasept);

                $item->setNombelevmascvenahuit($nombelevmascvenahuit);
                $item->setNombelevfemivenahuit($nombelevfemivenahuit);
                $item->setNombtotaelevvenahuit($nombtotaelevvenahuit);
                $em->persist($item);
                $em->flush();
            }
            return $this->redirect($this->generateUrl('effectifelevenouveauhuitiemetechnique_edit'));
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('effectifeleve_nouveauhuitiemetechnique');
        return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:edit.effectifeleve_nouveauhuitiemetechnique.html.twig', array(
            'entities' => @$entities,
            'search' => $search->createView(),
            'pathfilter' => $url,
            'pathUpdate' => @$pathUpdate,
            'nameclass' => $nameclass
        ));
    }

    /**
     * Displays a form to edit an existing NomenclatureQuestionnaire entity.
     *
     */
    public function listAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $url = $this->generateUrl('effectifelevenouveauhuitiemetechnique_list');
        $session = $request->getSession();
        $user= $this->get('security.context')->getToken()->getUser();
        $search = $this->container->get('form.factory')->createBuilder(new SearchType($session, $em, $user))->getForm();
        if ($request->isMethod('POST')) {
            $params = $request->request->get($search->getName());
            $session->set("codeetab", $params['NomenclatureEtablissement']);
            $session->set("codetypeetab", $params['NomenclatureTypeetablissement']);
            $session->set("features", $params);
            $search = $this->container->get('form.factory')->createBuilder(new SearchType($session, $em, $user))->getForm();
        }
        $annescol = $session->get('AnneScol');
        $coderece = $session->get('CodeRece');
        $codeetab = ($session->has('codeetab')) ? $session->get('codeetab') : false;
        $codetypeetab = ($session->has('codetypeetab')) ? $session->get('codetypeetab') : false;
        if ($codeetab && $codetypeetab) {
            $entities = $em->getRepository('SiseCoreBundle:EffectifeleveNouveauhuitiemetechnique')->findBy(array('codeetab' => $codeetab, 'codetypeetab' => $codetypeetab, 'annescol' => $annescol, 'coderece' => $coderece));
        }
        $nameclass = $em->getRepository('SiseCoreBundle:NomenclatureQuestionnaire')->findOneByNameclass('effectifeleve_nouveauhuitiemetechnique');
        return $this->render('SiseCoreBundle:NomenclatureQuestionnaire:list.effectifeleve_nouveauhuitiemetechnique.html.twig', array(
            'entities' => @$entities,
            'search' => $search->createView(),
            'pathfilter' => $url,
            'nameclass' => $nameclass
        ));
    }

} 